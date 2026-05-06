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
                                    <td>{{ number_format($detalle->precio, 0, ',', '.') }} COP</td>
                                    <td>{{ number_format($detalle->precio * $detalle->cantidad, 0, ',', '.') }} COP</td>
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
                        <div class="mb-3">
                            <p class="mb-1 text-muted">Cliente</p>
                            <strong>{{ $pedido->nombreCompleto() }}</strong>
                            <small class="d-block text-muted">{{ $pedido->telefono }} · {{ $pedido->correo }}</small>
                        </div>
                        <div class="mb-3">
                            <p class="mb-1 text-muted">Entrega</p>
                            <strong>{{ $pedido->tipoEntregaLabel() }}</strong>
                            @if($pedido->direccion)
                                <small class="d-block text-muted">{{ $pedido->direccion }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Subtotal</span>
                                <strong>{{ number_format($pedido->subtotal, 0, ',', '.') }} COP</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Envio</span>
                                <strong>{{ number_format($pedido->costo_envio, 0, ',', '.') }} COP</strong>
                            </div>
                        </div>
                        <p class="mb-1 text-muted">Total</p>
                        <p class="display-6 fw-bold">{{ number_format($pedido->total, 0, ',', '.') }} COP</p>
                        <p class="small text-muted">Medio de pago: {{ str_replace('_', ' ', $pedido->medio_pago) }}</p>

                        <form action="{{ route('admin.pedidos.update', $pedido) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <label class="form-label fw-semibold">Estado</label>
                            <select name="estado" class="form-select">
                                @foreach(\App\Models\Pedido::estadosAdmin() as $estado => $label)
                                    <option value="{{ $estado }}" @selected($pedido->estado === $estado)>{{ $label }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary rounded-pill w-100 mt-3 fw-bold">Actualizar estado</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-lg rounded-4 mt-4">
            <div class="card-body p-4">
                <h2 class="h4 fw-bold mb-4">Flujo del pedido</h2>
                @include('pedidos.partials.timeline', ['pedido' => $pedido])
            </div>
        </div>
    </div>
</section>
@endsection
