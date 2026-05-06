<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductoController extends Controller
{
    public function index(): View
    {
        return view('admin.productos.index', [
            'productos' => Producto::query()
                ->with('categoria')
                ->orderByDesc('descuento')
                ->orderByDesc('updated_at')
                ->orderByDesc('id')
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

    public function bulkCreate(): View
    {
        $categoria = Categoria::query()->firstOrCreate(['nombre' => 'Perfumes']);

        return view('admin.productos.bulk', [
            'imagenes' => $this->sourceImages(),
            'categorias' => Categoria::query()->orderBy('nombre')->get(),
            'productos' => Producto::query()->orderBy('nombre')->get(),
            'categoriaDefault' => $categoria,
        ]);
    }

    public function bulkStore(Request $request): RedirectResponse
    {
        $availableImages = collect($this->sourceImages())->pluck('path')->all();

        $data = $request->validate([
            'items' => ['required', 'array'],
            'items.*.selected' => ['nullable', 'boolean'],
            'items.*.producto_id' => ['nullable', 'exists:productos,id'],
            'items.*.source' => ['required', 'string', 'in:' . implode(',', $availableImages)],
            'items.*.categoria_id' => ['required', 'exists:categorias,id'],
            'items.*.nombre' => ['required', 'string', 'max:255'],
            'items.*.descripcion' => ['nullable', 'string'],
            'items.*.precio' => ['required', 'string'],
            'items.*.stock' => ['required', 'integer', 'min:0'],
        ]);

        $created = 0;
        $updated = 0;

        foreach ($data['items'] as $item) {
            if (empty($item['selected'])) {
                continue;
            }

            $payload = [
                'categoria_id' => $item['categoria_id'],
                'nombre' => $item['nombre'],
                'descripcion' => $item['descripcion'] ?? null,
                'precio' => $this->normalizeCopPrice($item['precio']),
                'stock' => $item['stock'],
                'imagen' => $item['source'],
            ];

            if (!empty($item['producto_id'])) {
                Producto::query()->findOrFail($item['producto_id'])->update($payload);
                $updated++;
                continue;
            }

            Producto::query()->create($payload);
            $created++;
        }

        return redirect()
            ->route('admin.productos.index')
            ->with('success', "Carga masiva completada. Creados: {$created}. Actualizados: {$updated}.");
    }

    public function store(ProductoRequest $request): RedirectResponse
    {
        $data = $request->validated();
        
        // Asegurar que el precio se guarda como número entero sin decimales
        $data['precio'] = (int) $data['precio'];
        $data['descuento'] = (float) ($data['descuento'] ?? 0);
        $data['costo_envio'] = (int) ($data['costo_envio'] ?? 0);

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
        
        // Asegurar que el precio se guarda como número entero sin decimales
        $data['precio'] = (int) $data['precio'];
        $data['descuento'] = (float) ($data['descuento'] ?? 0);
        $data['costo_envio'] = (int) ($data['costo_envio'] ?? 0);

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

    private function sourceImages(): array
    {
        $imagesPath = public_path('images');

        if (!File::isDirectory($imagesPath)) {
            return [];
        }

        return collect(File::allFiles($imagesPath))
            ->filter(fn ($file) => in_array(Str::lower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp'], true))
            ->map(function ($file) use ($imagesPath) {
                $relativePath = 'images/' . str_replace('\\', '/', $file->getRelativePathname());

                return [
                    'path' => $relativePath,
                    'url' => asset($relativePath),
                    'label' => pathinfo($file->getFilename(), PATHINFO_FILENAME),
                ];
            })
            ->reject(fn (array $image) => $image['path'] === 'images/logo-pagina.png')
            ->values()
            ->all();
    }

    private function normalizeCopPrice(mixed $value): int
    {
        $digits = preg_replace('/\D+/', '', (string) $value);

        return (int) ($digits ?: 0);
    }
}
