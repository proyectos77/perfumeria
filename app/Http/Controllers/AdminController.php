<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Contacto;
use App\Models\PageVisit;
use App\Models\Testimonio;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        [$dateFrom, $dateTo] = $this->resolveDateRange($request);
        $rangeStart = $dateFrom->copy()->startOfDay();
        $rangeEnd = $dateTo->copy()->endOfDay();
        $today = Carbon::today();
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();

        $messageRangeQuery = Contacto::query()->whereBetween('created_at', [$rangeStart, $rangeEnd]);
        $messagesInRange = (clone $messageRangeQuery)->count();
        $messagesToday = Contacto::whereDate('created_at', $today)->count();
        $messagesThisWeek = Contacto::whereBetween('created_at', [$weekStart, $weekEnd])->count();
        $messagesThisMonth = Contacto::whereBetween('created_at', [$monthStart, $monthEnd])->count();
        $recentMessages = (clone $messageRangeQuery)->latest()->take(8)->get();

        $messageRangeItems = (clone $messageRangeQuery)->get(['created_at']);
        $messageDailySeries = $this->buildDailySeriesFromItems($messageRangeItems, 'created_at', $dateFrom, $dateTo);
        $messageWeeklySeries = $this->buildWeeklySeriesFromItems($messageRangeItems, 'created_at', $dateFrom, $dateTo);
        $messageMonthlySeries = $this->buildMonthlySeriesFromItems($messageRangeItems, 'created_at', $dateFrom, $dateTo);

        $visitsEnabled = Schema::hasTable('page_visits');
        $visitsInRange = 0;
        $visitsToday = 0;
        $visitsThisWeek = 0;
        $visitsThisMonth = 0;
        $uniqueVisitorsRange = 0;
        $uniqueVisitorsToday = 0;
        $visitDailySeries = ['labels' => [], 'values' => []];
        $visitWeeklySeries = ['labels' => [], 'values' => []];
        $visitMonthlySeries = ['labels' => [], 'values' => []];
        $topPaths = collect();
        $topReferrers = collect();
        $recentVisits = collect();

        if ($visitsEnabled) {
            $visitRangeQuery = PageVisit::query()->whereBetween('visited_at', [$rangeStart, $rangeEnd]);
            $visitsInRange = (clone $visitRangeQuery)->count();
            $visitsToday = PageVisit::whereDate('visited_at', $today)->count();
            $visitsThisWeek = PageVisit::whereBetween('visited_at', [$weekStart, $weekEnd])->count();
            $visitsThisMonth = PageVisit::whereBetween('visited_at', [$monthStart, $monthEnd])->count();
            $uniqueVisitorsRange = (clone $visitRangeQuery)->distinct('session_id')->count('session_id');
            $uniqueVisitorsToday = PageVisit::whereDate('visited_at', $today)->distinct('session_id')->count('session_id');

            $visitRangeItems = (clone $visitRangeQuery)->get(['path', 'referrer_host', 'visited_at', 'session_id']);
            $visitDailySeries = $this->buildDailySeriesFromItems($visitRangeItems, 'visited_at', $dateFrom, $dateTo);
            $visitWeeklySeries = $this->buildWeeklySeriesFromItems($visitRangeItems, 'visited_at', $dateFrom, $dateTo);
            $visitMonthlySeries = $this->buildMonthlySeriesFromItems($visitRangeItems, 'visited_at', $dateFrom, $dateTo);

            $topPaths = $visitRangeItems
                ->groupBy(fn (PageVisit $visit) => $this->mapPublicPathLabel($visit->path))
                ->map(fn (Collection $items, string $label) => [
                    'label' => $label,
                    'total' => $items->count(),
                ])
                ->sortByDesc('total')
                ->take(8)
                ->values();

            $topReferrers = $visitRangeItems
                ->groupBy(fn (PageVisit $visit) => $visit->referrer_host ?: 'Directo')
                ->map(fn (Collection $items, string $source) => [
                    'label' => $source,
                    'total' => $items->count(),
                ])
                ->sortByDesc('total')
                ->take(8)
                ->values();

            $recentVisits = PageVisit::whereBetween('visited_at', [$rangeStart, $rangeEnd])
                ->latest('visited_at')
                ->take(10)
                ->get();
        }

        $conversionRate = $visitsInRange > 0
            ? round(($messagesInRange / $visitsInRange) * 100, 2)
            : 0;

        $periodSummary = [
            'from' => $dateFrom->format('Y-m-d'),
            'to' => $dateTo->format('Y-m-d'),
            'label' => $dateFrom->equalTo($dateTo)
                ? $dateFrom->translatedFormat('d M Y')
                : $dateFrom->translatedFormat('d M Y') . ' - ' . $dateTo->translatedFormat('d M Y'),
        ];

        return view('admin.dashboard', compact(
            'periodSummary',
            'messagesInRange',
            'messagesToday',
            'messagesThisWeek',
            'messagesThisMonth',
            'messageDailySeries',
            'messageWeeklySeries',
            'messageMonthlySeries',
            'recentMessages',
            'visitsEnabled',
            'visitsInRange',
            'visitsToday',
            'visitsThisWeek',
            'visitsThisMonth',
            'uniqueVisitorsRange',
            'uniqueVisitorsToday',
            'visitDailySeries',
            'visitWeeklySeries',
            'visitMonthlySeries',
            'topPaths',
            'topReferrers',
            'recentVisits',
            'conversionRate'
        ));
    }

    public function listadoMensajes()
    {
        $mensajes = Contacto::latest()->paginate(10);

        return view('admin.contactos', compact('mensajes'));
    }

    public function testimonios()
    {
        $comentarios = Testimonio::latest()->paginate(10);
        $totalComentarios = Testimonio::count();
        $promedioCalificacion = round((float) Testimonio::avg('calificacion'), 1);
        $comentariosRecientes = Testimonio::whereDate('created_at', '>=', Carbon::now()->subDays(30))->count();

        return view('admin.testimonios', compact(
            'comentarios',
            'totalComentarios',
            'promedioCalificacion',
            'comentariosRecientes'
        ));
    }

    public function eliminar(int $id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

        return redirect()
            ->route('admin.contactos.listado')
            ->with('success', 'El mensaje fue eliminado correctamente.');
    }

    public function eliminarTestimonio(int $id)
    {
        $testimonio = Testimonio::findOrFail($id);
        $testimonio->delete();

        return redirect()
            ->route('admin.testimonios')
            ->with('success', 'El comentario fue eliminado correctamente.');
    }

    private function resolveDateRange(Request $request): array
    {
        $dateFrom = $request->filled('date_from')
            ? Carbon::parse($request->string('date_from'))
            : Carbon::now()->subDays(29);

        $dateTo = $request->filled('date_to')
            ? Carbon::parse($request->string('date_to'))
            : Carbon::today();

        if ($dateFrom->greaterThan($dateTo)) {
            [$dateFrom, $dateTo] = [$dateTo, $dateFrom];
        }

        return [$dateFrom, $dateTo];
    }

    private function buildDailySeriesFromItems(Collection $items, string $column, Carbon $dateFrom, Carbon $dateTo): array
    {
        $counts = $items
            ->groupBy(fn ($item) => Carbon::parse($item->{$column})->format('Y-m-d'))
            ->map
            ->count();

        $labels = [];
        $values = [];
        $cursor = $dateFrom->copy()->startOfDay();
        $end = $dateTo->copy()->startOfDay();

        while ($cursor->lte($end)) {
            $key = $cursor->format('Y-m-d');
            $labels[] = $cursor->format('d M');
            $values[] = $counts->get($key, 0);
            $cursor->addDay();
        }

        return compact('labels', 'values');
    }

    private function buildWeeklySeriesFromItems(Collection $items, string $column, Carbon $dateFrom, Carbon $dateTo): array
    {
        $counts = $items
            ->groupBy(function ($item) use ($column) {
                return Carbon::parse($item->{$column})->startOfWeek()->format('Y-m-d');
            })
            ->map
            ->count();

        $labels = [];
        $values = [];
        $cursor = $dateFrom->copy()->startOfWeek();
        $end = $dateTo->copy()->startOfWeek();

        while ($cursor->lte($end)) {
            $key = $cursor->format('Y-m-d');
            $labels[] = 'Sem ' . $cursor->format('d M');
            $values[] = $counts->get($key, 0);
            $cursor->addWeek();
        }

        return compact('labels', 'values');
    }

    private function buildMonthlySeriesFromItems(Collection $items, string $column, Carbon $dateFrom, Carbon $dateTo): array
    {
        $counts = $items
            ->groupBy(fn ($item) => Carbon::parse($item->{$column})->format('Y-m'))
            ->map
            ->count();

        $labels = [];
        $values = [];
        $cursor = $dateFrom->copy()->startOfMonth();
        $end = $dateTo->copy()->startOfMonth();

        while ($cursor->lte($end)) {
            $key = $cursor->format('Y-m');
            $labels[] = $cursor->translatedFormat('M Y');
            $values[] = $counts->get($key, 0);
            $cursor->addMonth();
        }

        return compact('labels', 'values');
    }

    private function mapPublicPathLabel(?string $path): string
    {
        $normalizedPath = '/' . ltrim((string) $path, '/');

        return match ($normalizedPath) {
            '/' => 'Inicio',
            '/servicios' => 'Servicios',
            '/contacto' => 'Contacto',
            '/quienessomos' => 'Quienes somos',
            '/terminos', '/terminos-y-condiciones' => 'Terminos',
            '/privacidad' => 'Privacidad',
            default => $normalizedPath,
        };
    }
}
