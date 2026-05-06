<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publico\PedidoRequest;
use App\Mail\PedidoRecibido;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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

                $precioUnitario = $producto->getPrecioConDescuento();
                $subtotal = $precioUnitario * $cantidad;
                $costoEnvio = $data['tipo_entrega'] === Pedido::ENTREGA_ENVIO
                    ? (float) $producto->costo_envio
                    : 0;
                $total = $subtotal + $costoEnvio;

                $pedido = Pedido::query()->create([
                    'token_seguimiento' => Str::random(48),
                    'nombres' => $data['nombres'],
                    'apellidos' => $data['apellidos'],
                    'telefono' => $data['telefono'],
                    'correo' => $data['correo'],
                    'tipo_entrega' => $data['tipo_entrega'],
                    'direccion' => $data['direccion'] ?? null,
                    'subtotal' => $subtotal,
                    'costo_envio' => $costoEnvio,
                    'total' => $total,
                    'estado' => Pedido::ESTADO_COMPRADO,
                    'medio_pago' => 'pendiente_pasarela',
                ]);

                $pedido->detalles()->create([
                    'producto_id' => $producto->id,
                    'cantidad' => $cantidad,
                    'precio' => $precioUnitario,
                ]);

                $producto->decrement('stock', $cantidad);
                $pedido->registrarEstado(Pedido::ESTADO_COMPRADO, 'Pedido comprado por el cliente.');

                return $pedido;
            });
        } catch (\RuntimeException $exception) {
            return back()
                ->withInput()
                ->with('error', $exception->getMessage());
        }

        $pedido->load('detalles.producto');
        try {
            Mail::to($pedido->correo)->send(new PedidoRecibido($pedido));
        } catch (\Throwable $exception) {
            Log::warning('No se pudo enviar el correo del pedido #' . $pedido->id, [
                'error' => $exception->getMessage(),
            ]);
        }

        return redirect()->route('pedidos.gracias', $pedido);
    }

    public function gracias(Pedido $pedido): View
    {
        return view('pedidos.gracias', [
            'pedido' => $pedido->load('detalles.producto'),
        ]);
    }

    public function seguimiento(string $token): View
    {
        $pedido = Pedido::query()
            ->where('token_seguimiento', $token)
            ->with(['detalles.producto', 'estados' => fn ($query) => $query->oldest()])
            ->firstOrFail();

        return view('pedidos.seguimiento', compact('pedido'));
    }
}
