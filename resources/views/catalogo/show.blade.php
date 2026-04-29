@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<section class="py-5 perfume-detail">
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger border-0 shadow-sm rounded-4">{{ session('error') }}</div>
        @endif

        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="perfume-detail__image">
                    <img src="{{ $producto->imagenUrl() }}" alt="{{ $producto->nombre }}">
                </div>
            </div>
            <div class="col-lg-6">
                <a href="{{ route('catalogo.index') }}" class="text-decoration-none text-muted"><i class="bi bi-arrow-left me-2"></i>Volver al catalogo</a>
                <span class="perfume-eyebrow mt-4">{{ $producto->categoria->nombre }}</span>
                <h1>{{ $producto->nombre }}</h1>
                <p class="lead text-muted">{{ $producto->descripcion }}</p>
                <p class="display-6 fw-bold">${{ number_format($producto->precio, 2) }}</p>

                <div class="stock-box mb-4">
                    <strong>Stock disponible:</strong>
                    <span>{{ $producto->stock }} unidades</span>
                </div>

                <form action="{{ route('pedidos.store') }}" method="POST" class="pedido-box">
                    @csrf
                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                    <label class="form-label fw-semibold">Cantidad</label>
                    <input type="number" name="cantidad" min="1" max="{{ max($producto->stock, 1) }}" value="{{ old('cantidad', 1) }}" class="form-control form-control-lg @error('cantidad') is-invalid @enderror" {{ $producto->stock === 0 ? 'disabled' : '' }}>
                    @error('cantidad') <div class="invalid-feedback">{{ $message }}</div> @enderror

                    <button class="btn btn-dark btn-lg rounded-pill w-100 mt-3 fw-bold" {{ $producto->stock === 0 ? 'disabled' : '' }}>
                        {{ $producto->stock > 0 ? 'Confirmar pedido' : 'Producto agotado' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@include('catalogo.partials.styles')
@endsection
