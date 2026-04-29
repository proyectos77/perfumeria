@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<section class="perfume-hero">
    <div class="container">
        <div class="row align-items-end g-4">
            <div class="col-lg-7">
                <span class="perfume-eyebrow">Perfumeria online</span>
                <h1>Fragancias seleccionadas para cada momento.</h1>
                <p>Explora el catalogo, revisa stock disponible y solicita tu pedido de forma sencilla.</p>
            </div>
            <div class="col-lg-5">
                <form method="GET" action="{{ route('catalogo.index') }}" class="perfume-filter">
                    <label class="form-label">Filtrar por categoria</label>
                    <div class="d-flex gap-2">
                        <select name="categoria" class="form-select">
                            <option value="">Todas</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" @selected($categoriaActual === $categoria->id)>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-dark px-4">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger border-0 shadow-sm rounded-4">{{ session('error') }}</div>
        @endif

        <div class="row g-4">
            @forelse($productos as $producto)
                <div class="col-md-6 col-xl-4">
                    <article class="perfume-card h-100">
                        <a href="{{ route('catalogo.show', $producto) }}" class="perfume-card__image">
                            <img src="{{ $producto->imagenUrl() }}" alt="{{ $producto->nombre }}">
                        </a>
                        <div class="perfume-card__body">
                            <span>{{ $producto->categoria->nombre }}</span>
                            <h2>{{ $producto->nombre }}</h2>
                            <p>{{ Str::limit($producto->descripcion, 105) }}</p>
                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <strong>${{ number_format($producto->precio, 2) }}</strong>
                                <small class="{{ $producto->stock > 0 ? 'text-success' : 'text-danger' }}">
                                    {{ $producto->stock > 0 ? $producto->stock . ' disponibles' : 'Sin stock' }}
                                </small>
                            </div>
                            <a href="{{ route('catalogo.show', $producto) }}" class="btn btn-outline-dark rounded-pill w-100 mt-3">Ver detalle</a>
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
