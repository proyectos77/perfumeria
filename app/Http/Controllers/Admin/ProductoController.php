<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductoController extends Controller
{
    public function index(): View
    {
        return view('admin.productos.index', [
            'productos' => Producto::query()
                ->with('categoria')
                ->latest()
                ->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.productos.create', [
            'producto' => new Producto(),
            'categorias' => Categoria::query()->orderBy('nombre')->get(),
        ]);
    }

    public function store(ProductoRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        Producto::query()->create($data);

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto): View
    {
        return view('admin.productos.edit', [
            'producto' => $producto,
            'categorias' => Categoria::query()->orderBy('nombre')->get(),
        ]);
    }

    public function update(ProductoRequest $request, Producto $producto): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('imagen')) {
            $this->deleteImagen($producto);
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        } else {
            unset($data['imagen']);
        }

        $producto->update($data);

        return redirect()
            ->route('admin.productos.edit', $producto)
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto): RedirectResponse
    {
        if ($producto->detalles()->exists()) {
            return back()->with('error', 'No puedes eliminar un producto que ya tiene pedidos asociados.');
        }

        $this->deleteImagen($producto);
        $producto->delete();

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }

    private function deleteImagen(Producto $producto): void
    {
        if ($producto->imagen && str_starts_with($producto->imagen, 'productos/')) {
            Storage::disk('public')->delete($producto->imagen);
        }
    }
}
