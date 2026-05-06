@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<section class="perfume-detail">
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger border-0 shadow-sm rounded-4">{{ session('error') }}</div>
        @endif

        <div class="perfume-detail__back">
            <a href="{{ route('catalogo.index') }}" class="perfume-back-link">
                <i class="bi bi-arrow-left"></i>
                Volver al catalogo
            </a>
        </div>

        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <div class="perfume-detail__image">
                    <img src="{{ $producto->imagenUrl() }}" alt="{{ $producto->nombre }}">
                </div>
            </div>

            <div class="col-lg-6">
                <article class="perfume-detail__panel">
                    <span class="perfume-eyebrow">{{ $producto->categoria->nombre }}</span>
                    <h1>{{ $producto->nombre }}</h1>
                    <p class="perfume-detail__description">{{ $producto->descripcion }}</p>

                    <div class="product-detail__pricing">
                        @if($producto->descuento > 0)
                            <div class="product-detail__discount-row">
                                <span class="product-detail__old-price">{{ $producto->getPrecioFormato() }}</span>
                                <span class="product-detail__discount-badge">Descuento {{ $producto->descuento }}%</span>
                            </div>
                            <p class="product-detail__price">{{ $producto->getPrecioConDescuentoFormato() }}</p>
                        @else
                            <p class="product-detail__price">{{ $producto->getPrecioFormato() }}</p>
                        @endif
                    </div>

                    <div class="stock-box">
                        <span>Stock disponible</span>
                        <strong>{{ $producto->stock }} unidades</strong>
                    </div>
                </article>

                <form action="{{ route('pedidos.store') }}" method="POST" class="pedido-box">
                    @csrf
                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                    <div class="pedido-box__header">
                        <span class="perfume-eyebrow">Solicitud de pedido</span>
                        <h2>Confirma tus datos</h2>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres" value="{{ old('nombres') }}" class="form-control @error('nombres') is-invalid @enderror" required>
                            @error('nombres') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" value="{{ old('apellidos') }}" class="form-control @error('apellidos') is-invalid @enderror" required>
                            @error('apellidos') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Telefono</label>
                            <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control @error('telefono') is-invalid @enderror" required>
                            @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo" value="{{ old('correo') }}" class="form-control @error('correo') is-invalid @enderror" required>
                            @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Cantidad</label>
                            <input type="number" name="cantidad" min="1" max="{{ max($producto->stock, 1) }}" value="{{ old('cantidad', 1) }}" class="form-control @error('cantidad') is-invalid @enderror" {{ $producto->stock === 0 ? 'disabled' : '' }} data-cantidad>
                            @error('cantidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-7">
                            <label class="form-label">Entrega</label>
                            <select name="tipo_entrega" class="form-select @error('tipo_entrega') is-invalid @enderror" data-tipo-entrega>
                                <option value="recoger_tienda" @selected(old('tipo_entrega') === 'recoger_tienda')>Recoge en tienda</option>
                                <option value="envio" @selected(old('tipo_entrega') === 'envio')>Envio a direccion (+{{ $producto->getCostoEnvioFormato() }})</option>
                            </select>
                            @error('tipo_entrega') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12" data-direccion-field style="display: none;">
                            <label class="form-label">Direccion de envio</label>
                            <input type="text" name="direccion" value="{{ old('direccion') }}" class="form-control @error('direccion') is-invalid @enderror" placeholder="Barrio, direccion, referencias">
                            @error('direccion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="order-summary mt-4">
                        <div><span>Producto</span><strong data-subtotal>{{ $producto->getPrecioConDescuentoFormato() }}</strong></div>
                        <div><span>Envio</span><strong data-envio>0 COP</strong></div>
                        <div class="order-summary__total"><span>Total</span><strong data-total>{{ $producto->getPrecioConDescuentoFormato() }}</strong></div>
                        <small>Medio de pago: pendiente por integrar pasarela.</small>
                    </div>

                    <button class="btn btn-dark btn-lg rounded-pill w-100 mt-3 fw-bold" {{ $producto->stock === 0 ? 'disabled' : '' }}>
                        {{ $producto->stock > 0 ? 'Hacer pedido' : 'Producto agotado' }}
                    </button>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-8 offset-lg-2">
                <x-rating-stars :product="$producto" />
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-8 offset-lg-2">
                <x-comments-section :product="$producto" />
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const unitPrice = {{ (int) round($producto->getPrecioConDescuento()) }};
        const shippingCost = {{ (int) round($producto->costo_envio) }};
        const quantity = document.querySelector('[data-cantidad]');
        const delivery = document.querySelector('[data-tipo-entrega]');
        const addressField = document.querySelector('[data-direccion-field]');
        const subtotalEl = document.querySelector('[data-subtotal]');
        const shippingEl = document.querySelector('[data-envio]');
        const totalEl = document.querySelector('[data-total]');

        const formatCop = (value) => {
            return Math.round(value).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' COP';
        };

        const syncSummary = () => {
            const qty = Math.max(parseInt(quantity?.value || '1', 10), 1);
            const shipping = delivery?.value === 'envio' ? shippingCost : 0;
            const subtotal = unitPrice * qty;

            if (addressField) {
                addressField.style.display = delivery?.value === 'envio' ? 'block' : 'none';
            }

            if (subtotalEl) subtotalEl.textContent = formatCop(subtotal);
            if (shippingEl) shippingEl.textContent = formatCop(shipping);
            if (totalEl) totalEl.textContent = formatCop(subtotal + shipping);
        };

        quantity?.addEventListener('input', syncSummary);
        delivery?.addEventListener('change', syncSummary);
        syncSummary();
    });
</script>
@endsection
