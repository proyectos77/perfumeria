<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Calificacion;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CatalogoController extends Controller
{
    public function index(Request $request): View
    {
        $productos = Producto::query()
            ->with('categoria')
            ->when($request->filled('categoria'), function ($query) use ($request) {
                $query->where('categoria_id', $request->integer('categoria'));
            })
            ->orderByDesc('descuento')
            ->orderByDesc('updated_at')
            ->orderByDesc('id')
            ->paginate(24)
            ->withQueryString();

        return view('catalogo.index', [
            'productos' => $productos,
            'categorias' => Categoria::query()->orderBy('nombre')->get(),
            'categoriaActual' => $request->integer('categoria'),
            'heroImages' => $this->heroImages(),
        ]);
    }

    public function show(Producto $producto): View
    {
        return view('catalogo.show', [
            'producto' => $producto->load('categoria'),
        ]);
    }

    public function storeCalificacion(Request $request, Producto $producto): RedirectResponse
    {
        $validated = $request->validate([
            'calificacion' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string|max:500',
        ]);

        Calificacion::create([
            'producto_id' => $producto->id,
            'nombre' => auth()->user()->name,
            'correo' => auth()->user()->email,
            'calificacion' => $validated['calificacion'],
            'comentario' => $validated['comentario'],
            'ip' => $request->ip(),
            'aprobado' => true, // En producción, cambiar a false para moderación
        ]);

        return back()->with('success', 'Tu calificación ha sido registrada.');
    }

    public function storeComentario(Request $request, Producto $producto): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|max:100',
            'contenido' => 'required|string|min:10|max:1000',
        ]);

        Comentario::create([
            'producto_id' => $producto->id,
            'nombre' => $validated['nombre'],
            'correo' => $validated['correo'],
            'contenido' => $validated['contenido'],
            'ip' => $request->ip(),
            'aprobado' => true, // En producción, cambiar a false para moderación
        ]);

        return back()->with('success', 'Tu comentario ha sido registrado.');
    }

    private function heroImages(): array
    {
        $imagesPath = public_path('images');

        if (!File::isDirectory($imagesPath)) {
            return [];
        }

        return collect(File::allFiles($imagesPath))
            ->filter(fn ($file) => in_array(Str::lower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp'], true))
            ->map(fn ($file) => 'images/' . str_replace('\\', '/', $file->getRelativePathname()))
            ->reject(fn (string $path) => $path === 'images/logo-pagina.png')
            ->take(5)
            ->map(fn (string $path) => asset($path))
            ->values()
            ->all();
    }
}
