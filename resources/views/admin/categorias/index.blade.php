@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Clasificacion</span>
            <h1 class="section-heading__title">Categorias</h1>
            <p class="section-heading__text">Organiza el catalogo por familias olfativas, marcas o colecciones.</p>
        </div>

        @include('admin.partials.navigation')
        @include('admin.productos.partials.alerts')

        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary btn-lg rounded-pill px-4 fw-bold">
                <i class="bi bi-plus-circle me-2"></i>Nueva categoria
            </a>
        </div>

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Productos</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categorias as $categoria)
                        <tr>
                            <td><strong>{{ $categoria->nombre }}</strong></td>
                            <td>{{ $categoria->productos_count }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.categorias.edit', $categoria) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Editar</a>
                                <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Eliminar esta categoria?');">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center py-5 text-muted">Aun no hay categorias registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>
            @if($categorias->hasPages())
                <div class="card-footer bg-white">{{ $categorias->links('pagination::bootstrap-5') }}</div>
            @endif
        </div>
    </div>
</section>
@endsection
