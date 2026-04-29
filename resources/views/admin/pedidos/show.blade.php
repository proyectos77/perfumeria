@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Pedido #{{ $pedido->id }}</span>
            <h1 class="section-heading__title">Detalle del pedido</h1>
        </div>

        @include('admin.partials.navigation')
        @include('admin.productos.partials.alerts')

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedido->detalles as $detalle)
                                <tr>
                                    <td>
                                        <strong class="d-block">{{ $detalle->producto->nombre }}</strong>
                                        <small class="text-muted">{{ $detalle->producto->categoria->nombre }}</small>
                                    </td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>${{ number_format($detalle->precio, 2) }}</td>
                                    <td>${{ number_format($detalle->precio * $detalle->cantidad, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold mb-3">Resumen</h2>
                        <p class="mb-1 text-muted">Total</p>
                        <p class="display-6 fw-bold">${{ number_format($pedido->total, 2) }}</p>

                        <form action="{{ route('admin.pedidos.update', $pedido) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <label class="form-label fw-semibold">Estado</label>
                            <select name="estado" class="form-select">
                                <option value="pendiente" @selected($pedido->estado === 'pendiente')>Pendiente</option>
                                <option value="confirmado" @selected($pedido->estado === 'confirmado')>Confirmado</option>
                                <option value="cancelado" @selected($pedido->estado === 'cancelado')>Cancelado</option>
                            </select>
                            <button class="btn btn-primary rounded-pill w-100 mt-3 fw-bold">Actualizar estado</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
