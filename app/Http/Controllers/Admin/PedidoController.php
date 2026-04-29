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
                ->latest()
                ->paginate(12),
        ]);
    }

    public function show(Pedido $pedido): View
    {
        return view('admin.pedidos.show', [
            'pedido' => $pedido->load('detalles.producto.categoria'),
        ]);
    }

    public function update(Request $request, Pedido $pedido): RedirectResponse
    {
        $data = $request->validate([
            'estado' => ['required', Rule::in([
                Pedido::ESTADO_PENDIENTE,
                Pedido::ESTADO_CONFIRMADO,
                Pedido::ESTADO_CANCELADO,
            ])],
        ]);

        $pedido->update($data);

        return back()->with('success', 'Estado del pedido actualizado correctamente.');
    }
}
