<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(): View
    {
        return view('admin.categorias.index', [
            'categorias' => Categoria::query()
                ->withCount('productos')
                ->orderBy('nombre')
                ->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.categorias.create', [
            'categoria' => new Categoria(),
        ]);
    }

    public function store(CategoriaRequest $request): RedirectResponse
    {
        Categoria::query()->create($request->validated());

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoria creada correctamente.');
    }

    public function edit(Categoria $categoria): View
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, Categoria $categoria): RedirectResponse
    {
        $categoria->update($request->validated());

        return redirect()
            ->route('admin.categorias.edit', $categoria)
            ->with('success', 'Categoria actualizada correctamente.');
    }

    public function destroy(Categoria $categoria): RedirectResponse
    {
        if ($categoria->productos()->exists()) {
            return back()->with('error', 'No puedes eliminar una categoria con productos asociados.');
        }

        $categoria->delete();

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoria eliminada correctamente.');
    }
}
