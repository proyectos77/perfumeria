<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publico\PedidoRequest;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PedidoController extends Controller
{
    public function store(PedidoRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            $pedido = DB::transaction(function () use ($data) {
                $producto = Producto::query()
                    ->lockForUpdate()
                    ->findOrFail($data['producto_id']);

                $cantidad = (int) $data['cantidad'];

                if ($producto->stock < $cantidad) {
                    throw new \RuntimeException('No hay stock suficiente para este producto.');
                }

                $total = $producto->precio * $cantidad;

                $pedido = Pedido::query()->create([
                    'total' => $total,
                    'estado' => Pedido::ESTADO_PENDIENTE,
                ]);

                $pedido->detalles()->create([
                    'producto_id' => $producto->id,
                    'cantidad' => $cantidad,
                    'precio' => $producto->precio,
                ]);

                $producto->decrement('stock', $cantidad);

                return $pedido;
            });
        } catch (\RuntimeException $exception) {
            return back()
                ->withInput()
                ->with('error', $exception->getMessage());
        }

        return redirect()->route('pedidos.gracias', $pedido);
    }

    public function gracias(Pedido $pedido): View
    {
        return view('pedidos.gracias', [
            'pedido' => $pedido->load('detalles.producto'),
        ]);
    }
}
