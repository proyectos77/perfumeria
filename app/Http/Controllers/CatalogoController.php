<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
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
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('catalogo.index', [
            'productos' => $productos,
            'categorias' => Categoria::query()->orderBy('nombre')->get(),
            'categoriaActual' => $request->integer('categoria'),
        ]);
    }

    public function show(Producto $producto): View
    {
        return view('catalogo.show', [
            'producto' => $producto->load('categoria'),
        ]);
    }
}
