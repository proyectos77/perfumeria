@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 900px;">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <span class="perfume-eyebrow">Seguimiento</span>
                    <h1 class="fw-bold mt-2">Pedido #{{ $pedido->id }}</h1>
                    <p class="text-muted mb-0">{{ $pedido->nombreCompleto() }} · {{ $pedido->estadoLabel() }}</p>
                </div>

                @include('pedidos.partials.timeline', ['pedido' => $pedido])

                <div class="table-responsive mt-4">
                    <table class="table align-middle">
                        <tbody>
                            @foreach($pedido->detalles as $detalle)
                                <tr>
                                    <td>{{ $detalle->producto->nombre }}</td>
                                    <td class="text-center">{{ $detalle->cantidad }}</td>
                                    <td class="text-end">{{ number_format($detalle->precio * $detalle->cantidad, 0, ',', '.') }} COP</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-end">Total</th>
                                <th class="text-end">{{ number_format($pedido->total, 0, ',', '.') }} COP</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <p class="text-muted small mb-0">Si necesitas hacer un cambio, escribenos por WhatsApp o al correo de atencion.</p>
            </div>
        </div>
    </div>
</section>

@include('catalogo.partials.styles')
@endsection
