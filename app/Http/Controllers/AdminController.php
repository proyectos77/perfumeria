<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // ...existing code...

        $query = Contacto::query();

        // Aplicar filtro
        $filtro = $request->get('filtro', 'todos');

        if ($filtro === 'mes') {
            $query->whereMonth('created_at', Carbon::now()->month)
                  ->whereYear('created_at', Carbon::now()->year);
        } elseif ($filtro === 'trimestre') {
            $trimestre = ceil(Carbon::now()->month / 3);
            $mesInicio = ($trimestre - 1) * 3 + 1;
            $mesFin = $trimestre * 3;
            $anio = Carbon::now()->year;

            $fechaInicio = Carbon::createFromDate($anio, $mesInicio, 1)->startOfDay()->toDateString();
            $fechaFin = Carbon::createFromDate($anio, $mesFin, 1)->endOfMonth()->toDateString();

            $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        } elseif ($filtro === 'ano') {
            $query->whereYear('created_at', Carbon::now()->year);
        } elseif ($filtro === 'rango') {
            $fecha_inicio = $request->get('fecha_inicio');
            $fecha_fin = $request->get('fecha_fin');
            if ($fecha_inicio && $fecha_fin) {
                $query->whereBetween('created_at', [$fecha_inicio, $fecha_fin]);
            }
        }

        // Estadísticas
        $total = Contacto::count();
        $delMes = Contacto::whereMonth('created_at', Carbon::now()->month)
                           ->whereYear('created_at', Carbon::now()->year)
                           ->count();
        $nuevos = Contacto::whereDate('created_at', Carbon::today())->count();

        // Datos para gráficos
        // Detectar driver de BD y usar la función adecuada para formatear meses
        try {
            $pdo = DB::getPdo();
            $driver = $pdo->getAttribute(\PDO::ATTR_DRIVER_NAME);
        } catch (\Exception $e) {
            $driver = config('database.default'); // fallback
        }

        if (strpos($driver, 'mysql') !== false) {
            $mesFormat = "DATE_FORMAT(created_at, '%M %Y') as mes";
        } elseif (strpos($driver, 'pgsql') !== false || strpos($driver, 'postgres') !== false) {
            $mesFormat = "to_char(created_at, 'FMMonth YYYY') as mes";
        } else {
            // fallback a una representación ISO si no se reconoce el driver
            $mesFormat = "DATE_FORMAT(created_at, '%M %Y') as mes";
        }

        $datosMeses = Contacto::selectRaw("$mesFormat, COUNT(*) as cantidad")
            ->groupBy('mes')
            ->orderByRaw('MAX(created_at) DESC')
            ->limit(6)
            ->get()
            ->toArray();

        $datosDistribucion = [
            ['label' => 'Total', 'cantidad' => $total],
            ['label' => 'Este mes', 'cantidad' => $delMes],
            ['label' => 'Hoy', 'cantidad' => $nuevos],
        ];

        // Paginación
        $mensajes = $query->latest()->paginate(10);

        return view('admin.contactos', compact(
            'mensajes',
            'total',
            'delMes',
            'nuevos',
            'datosMeses',
            'datosDistribucion'
        ));
    }

    // ...existing code...
}
