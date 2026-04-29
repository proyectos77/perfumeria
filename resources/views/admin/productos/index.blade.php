@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container-fluid admin-wide-shell px-3 px-lg-4 px-xxl-5">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Inventario</span>
            <h1 class="section-heading__title">Productos</h1>
            <p class="section-heading__text">Administra perfumes, precios, imagenes y control de stock.</p>
        </div>

        @include('admin.partials.navigation')
        @include('admin.productos.partials.alerts')

        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('admin.productos.create') }}" class="btn btn-primary btn-lg rounded-pill px-4 fw-bold">
                <i class="bi bi-plus-circle me-2"></i>Nuevo producto
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Producto</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ $producto->imagenUrl() }}" alt="{{ $producto->nombre }}" class="perfume-thumb">
                                        <div>
                                            <strong class="d-block">{{ $producto->nombre }}</strong>
                                            <small class="text-muted">{{ Str::limit($producto->descripcion, 90) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $producto->categoria->nombre }}</td>
                                <td>${{ number_format($producto->precio, 2) }}</td>
                                <td>
                                    <span class="badge rounded-pill {{ $producto->stock > 0 ? 'text-bg-success' : 'text-bg-danger' }}">
                                        {{ $producto->stock }} unidades
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.productos.edit', $producto) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Editar</a>
                                    <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Eliminar este producto?');">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">Aun no hay productos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($productos->hasPages())
                <div class="card-footer bg-white">{{ $productos->links('pagination::bootstrap-5') }}</div>
            @endif
        </div>
    </div>
</section>

<style>
    .perfume-thumb { width: 72px; height: 72px; object-fit: cover; border-radius: 14px; background: #f5f0eb; }
</style>
@endsection
