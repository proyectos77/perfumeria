<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PedidoController extends Controller
{
    public function index(): View
    {
        return view('admin.pedidos.index', [
            'pedidos' => Pedido::query()
                ->withCount('detalles')
                ->orderByRaw('visto_admin_at IS NOT NULL')
                ->latest()
                ->paginate(12),
        ]);
    }

    public function show(Pedido $pedido): View
    {
        if (is_null($pedido->visto_admin_at)) {
            $pedido->forceFill(['visto_admin_at' => now()])->save();
        }

        return view('admin.pedidos.show', [
            'pedido' => $pedido->load([
                'detalles.producto.categoria',
                'estados' => fn ($query) => $query->oldest(),
            ]),
        ]);
    }

    public function update(Request $request, Pedido $pedido): RedirectResponse
    {
        $data = $request->validate([
            'estado' => ['required', Rule::in([
                Pedido::ESTADO_COMPRADO,
                Pedido::ESTADO_CONFIRMADO,
                Pedido::ESTADO_ENVIADO,
                Pedido::ESTADO_ENTREGADO,
                Pedido::ESTADO_CANCELADO,
            ])],
        ]);

        if ($pedido->estado !== $data['estado']) {
            $pedido->update($data);
            $pedido->registrarEstado($data['estado'], Pedido::estadosAdmin()[$data['estado']] ?? null);
        }

        return back()->with('success', 'Estado del pedido actualizado correctamente.');
    }
}
