@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 760px;">
            <div class="card-body p-5 text-center">
                <span class="perfume-eyebrow">Pedido recibido</span>
                <h1 class="fw-bold mt-3">Gracias por tu compra</h1>
                <p class="text-muted">Tu pedido #{{ $pedido->id }} fue registrado correctamente. Estado actual: {{ $pedido->estado }}.</p>

                <div class="table-responsive mt-4">
                    <table class="table align-middle">
                        <tbody>
                            @foreach($pedido->detalles as $detalle)
                                <tr>
                                    <td class="text-start">{{ $detalle->producto->nombre }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td class="text-end">${{ number_format($detalle->precio * $detalle->cantidad, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-end">Total</th>
                                <th class="text-end">${{ number_format($pedido->total, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <a href="{{ route('catalogo.index') }}" class="btn btn-dark rounded-pill px-4 mt-3">Volver al catalogo</a>
            </div>
        </div>
    </div>
</section>

@include('catalogo.partials.styles')
@endsection
