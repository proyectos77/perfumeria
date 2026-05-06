@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 820px;">
            <div class="card-body p-5 text-center">
                <span class="perfume-eyebrow">Pedido recibido</span>
                <h1 class="fw-bold mt-3">Gracias por tu compra</h1>
                <p class="text-muted">Tu pedido #{{ $pedido->id }} fue registrado correctamente. Estado actual: {{ $pedido->estado }}.</p>
                <p class="mb-0"><strong>{{ $pedido->nombreCompleto() }}</strong></p>
                <p class="text-muted">
                    {{ $pedido->tipoEntregaLabel() }}
                    @if($pedido->direccion)
                        · {{ $pedido->direccion }}
                    @endif
                </p>

                <div class="table-responsive mt-4">
                    <table class="table align-middle">
                        <tbody>
                            @foreach($pedido->detalles as $detalle)
                                <tr>
                                    <td class="text-start">{{ $detalle->producto->nombre }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td class="text-end">{{ number_format($detalle->precio * $detalle->cantidad, 0, ',', '.') }} COP</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-end">Subtotal</th>
                                <th class="text-end">{{ number_format($pedido->subtotal, 0, ',', '.') }} COP</th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-end">Envio</th>
                                <th class="text-end">{{ number_format($pedido->costo_envio, 0, ',', '.') }} COP</th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-end">Total</th>
                                <th class="text-end">{{ number_format($pedido->total, 0, ',', '.') }} COP</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <button class="btn btn-dark rounded-pill px-4 mt-3" type="button" disabled>Pedido confirmado</button>
                <a href="{{ route('catalogo.index') }}" class="btn btn-outline-dark rounded-pill px-4 mt-3">Volver al catalogo</a>
                <p class="small text-muted mt-3 mb-0">La pasarela de pago se integrara en una siguiente fase.</p>
            </div>
        </div>
    </div>
</section>

@include('catalogo.partials.styles')
@endsection
