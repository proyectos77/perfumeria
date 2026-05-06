@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container-fluid px-3 px-lg-4">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Ventas</span>
            <h1 class="section-heading__title">Pedidos</h1>
            <p class="section-heading__text">Consulta las compras registradas y actualiza su estado operativo.</p>
        </div>

        @include('admin.partials.navigation')
        @include('admin.productos.partials.alerts')

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Entrega</th>
                            <th>Estado</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pedidos as $pedido)
                            <tr>
                                <td><strong>#{{ $pedido->id }}</strong></td>
                                <td>
                                    <strong class="d-block">{{ $pedido->nombreCompleto() }}</strong>
                                    <small class="text-muted">{{ $pedido->telefono }}</small>
                                </td>
                                <td>{{ $pedido->tipoEntregaLabel() }}</td>
                                <td>
                                    <span class="order-status {{ $pedido->estadoColorClass() }}">{{ $pedido->estadoLabel() }}</span>
                                    @if(is_null($pedido->visto_admin_at))
                                        <small class="d-block text-warning fw-bold">Nuevo</small>
                                    @endif
                                </td>
                                <td>{{ $pedido->detalles_count }}</td>
                                <td>{{ number_format($pedido->total, 0, ',', '.') }} COP</td>
                                <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.pedidos.show', $pedido) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Ver detalle</a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center py-5 text-muted">Aun no hay pedidos registrados.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($pedidos->hasPages())
                <div class="card-footer bg-white">{{ $pedidos->links('pagination::bootstrap-5') }}</div>
            @endif
        </div>
    </div>
</section>
@endsection
