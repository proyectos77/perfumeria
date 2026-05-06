@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<!-- Hero Section con Carrusel -->
<section class="perfume-hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <span class="perfume-eyebrow">PERFUMERY J &amp; P online</span>
                <h1>Fragancias seleccionadas para cada momento.</h1>
                <p style="color: var(--text-secondary); font-size: 1.05rem; margin-bottom: 2rem;">
                    Explora nuestro catálogo de fragancias premium, revisa el stock disponible y solicita tu pedido de forma segura y sencilla.
                </p>
                <a href="#catalogo" class="btn btn-primary btn-lg fw-bold">
                    <i class="bi bi-bag-heart me-2"></i>Explorar Catálogo
                </a>
            </div>
            @if(!empty($heroImages))
                <div class="col-lg-7">
                    <x-carousel-elegant :images="$heroImages" />
                </div>
            @else
                <div class="col-lg-7">
                    <div style="aspect-ratio: 3/2; background: linear-gradient(135deg, var(--secondary-100) 0%, var(--secondary-50) 100%); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                        <div style="text-align: center; color: var(--text-light);">
                            <i class="bi bi-image" style="font-size: 3rem; color: var(--secondary-300);"></i>
                            <p style="margin-top: 1rem;">Galería de imágenes</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<section class="catalog-filter-section">
    <div class="container">
        <form method="GET" action="{{ route('catalogo.index') }}" class="catalog-filter">
            <div class="catalog-filter__field">
                <label>
                    <span>Filtrar</span>
                    Selecciona una categoría
                </label>
                <select name="categoria" class="form-select">
                    <option value="">Todas las categorías</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @selected($categoriaActual === $categoria->id)>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-funnel me-2"></i>Aplicar filtro
            </button>
            @if($categoriaActual)
                <a href="{{ route('catalogo.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-x-circle me-2"></i>Limpiar
                </a>
            @endif
        </form>
    </div>
</section>

<section class="catalog-section" id="catalogo">
    <div class="container-fluid catalog-shell">
        @if (session('error'))
            <div class="alert alert-danger border-0 shadow-sm rounded-4">{{ session('error') }}</div>
        @endif

        <div class="catalog-grid">
            @forelse($productos as $producto)
                <div>
                    <article class="perfume-card">
                        <a href="{{ route('catalogo.show', $producto) }}" class="perfume-card__image">
                            <img src="{{ $producto->imagenUrl() }}" alt="{{ $producto->nombre }}">
                        </a>
                        <div class="perfume-card__body">
                            <span class="perfume-card__category">{{ $producto->categoria->nombre }}</span>
                            <h2>{{ $producto->nombre }}</h2>
                            <p>{{ Str::limit($producto->descripcion, 105) }}</p>
                            <div class="perfume-card__meta">
                                <div>
                                    @if($producto->descuento > 0)
                                        <div class="perfume-card__discount">
                                            <strong>{{ $producto->getPrecioFormato() }}</strong>
                                            <span>-{{ $producto->descuento }}%</span>
                                        </div>
                                        <strong class="perfume-card__price perfume-card__price--sale">{{ $producto->getPrecioConDescuentoFormato() }}</strong>
                                    @else
                                        <strong class="perfume-card__price">{{ $producto->getPrecioFormato() }}</strong>
                                    @endif
                                </div>
                                <small class="{{ $producto->stock > 0 ? 'is-available' : 'is-empty' }}">
                                    {{ $producto->stock > 0 ? $producto->stock . ' disponibles' : 'Sin stock' }}
                                </small>
                            </div>
                            <a href="{{ route('catalogo.show', $producto) }}" class="btn btn-outline-dark w-100 mt-3">Ver detalle</a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5 text-muted">Aun no hay perfumes disponibles en el catalogo.</div>
                </div>
            @endforelse
        </div>

        @if($productos->hasPages())
            <div class="mt-5">{{ $productos->links('pagination::bootstrap-5') }}</div>
        @endif
    </div>
</section>

@include('catalogo.partials.styles')
@endsection
