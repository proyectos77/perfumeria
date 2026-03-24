@extends('layouts.app')

@section('content')

<section class="py-5">
    <div class="container-fluid admin-wide-shell px-3 px-lg-4 px-xxl-5">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Panel interno</span>
            <h1 class="section-heading__title">Moderacion de comentarios de clientes</h1>
            <p class="section-heading__text">Aqui puedes revisar los testimonios enviados desde el sitio y eliminar los que no quieras mostrar en la pagina de inicio.</p>
        </div>

        @include('admin.partials.navigation')

        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg border-0 rounded-4 h-100">
                    <div class="card-header text-white rounded-top-4" style="background: linear-gradient(135deg,#3b82f6,#6366f1);">
                        <h5 class="card-title mb-0 fw-bold">Comentarios registrados</h5>
                    </div>
                    <div class="card-body text-center py-4">
                        <h3 class="fw-bold text-primary mb-1">{{ $totalComentarios }}</h3>
                        <p class="text-muted mb-0">Total de testimonios guardados</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg border-0 rounded-4 h-100">
                    <div class="card-header text-white rounded-top-4" style="background: linear-gradient(135deg,#06b6d4,#0891b2);">
                        <h5 class="card-title mb-0 fw-bold">Calificacion promedio</h5>
                    </div>
                    <div class="card-body text-center py-4">
                        <h3 class="fw-bold text-info mb-1">{{ $promedioCalificacion }}</h3>
                        <p class="text-muted mb-0">Promedio actual de valoracion</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card shadow-lg border-0 rounded-4 h-100">
                    <div class="card-header text-white rounded-top-4" style="background: linear-gradient(135deg,#10b981,#059669);">
                        <h5 class="card-title mb-0 fw-bold">Ultimos 30 dias</h5>
                    </div>
                    <div class="card-body text-center py-4">
                        <h3 class="fw-bold text-success mb-1">{{ $comentariosRecientes }}</h3>
                        <p class="text-muted mb-0">Comentarios recientes</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card admin-table-card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="card-header admin-table-card__header rounded-top-4">
                <h5 class="card-title mb-0 fw-bold">Comentarios publicados</h5>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table admin-table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Empresa</th>
                                <th>Comentario</th>
                                <th>Calificacion</th>
                                <th>Fecha</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($comentarios as $comentario)
                                <tr>
                                    <td class="fw-bold">{{ $comentario->id }}</td>
                                    <td>
                                        <div class="fw-semibold">{{ $comentario->nombre }}</div>
                                        <small class="text-muted">{{ $comentario->cargo }}</small>
                                    </td>
                                    <td>{{ $comentario->empresa }}</td>
                                    <td class="admin-table__comment">{{ $comentario->comentario }}</td>
                                    <td>
                                        <div class="text-warning">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="bi bi-star{{ $i <= $comentario->calificacion ? '-fill' : '' }}"></i>
                                            @endfor
                                        </div>
                                        <small class="text-muted">{{ $comentario->calificacion }}/5</small>
                                    </td>
                                    <td>{{ $comentario->created_at->format('d M Y H:i') }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.testimonios.eliminar', $comentario->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn btn-outline-danger btn-sm admin-table__delete"
                                                title="Eliminar comentario"
                                                aria-label="Eliminar comentario"
                                                onclick="return confirm('Eliminar este comentario?');"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        Aun no hay comentarios registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($comentarios->hasPages())
                <div class="card-footer admin-table-card__footer rounded-bottom-4">
                    <div class="d-flex justify-content-center admin-table__pagination">
                        {{ $comentarios->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    .admin-wide-shell {
        max-width: 1680px;
    }

    .admin-switcher .btn {
        border-radius: 999px;
        min-width: 190px;
    }

    .admin-table-card {
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 28px 80px rgba(0, 31, 77, 0.12) !important;
    }

    .admin-table-card__header {
        padding: 1.15rem 1.5rem;
        color: #fff;
        background: linear-gradient(135deg, #001f4d 0%, #0d47a1 58%, #26c6da 100%);
    }

    .admin-table-card__footer {
        background: linear-gradient(180deg, rgba(245, 247, 251, 0.92) 0%, rgba(236, 242, 249, 0.92) 100%);
    }

    .admin-table {
        --bs-table-bg: transparent;
        --bs-table-striped-bg: rgba(245, 247, 251, 0.72);
        --bs-table-hover-bg: rgba(38, 198, 218, 0.08);
    }

    .admin-table thead th {
        padding: 1rem 1.1rem;
        border-bottom: 1px solid rgba(18, 32, 51, 0.08);
        background: rgba(241, 245, 249, 0.96);
        color: #001f4d;
        font-size: 0.85rem;
        font-weight: 800;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .admin-table tbody td {
        padding: 1rem 1.1rem;
        border-color: rgba(18, 32, 51, 0.06);
        vertical-align: middle;
        color: #122033;
    }

    .admin-table__comment {
        min-width: 460px;
        color: #49566a;
        line-height: 1.7;
    }

    .admin-table__delete {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        padding: 0;
    }

    .admin-table__pagination .pagination {
        margin-bottom: 0;
        gap: 0.35rem;
    }

    .admin-table__pagination .page-link {
        border: none;
        min-width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px !important;
        color: #0d47a1;
        background: #fff;
        box-shadow: 0 10px 24px rgba(0, 31, 77, 0.08);
    }

    .admin-table__pagination .page-item.active .page-link {
        color: #fff;
        background: linear-gradient(135deg, #001f4d 0%, #0d47a1 58%, #26c6da 100%);
    }

    .admin-table__pagination .page-item.disabled .page-link {
        color: #94a3b8;
        background: rgba(255, 255, 255, 0.7);
        box-shadow: none;
    }

    .card:hover {
        transform: translateY(-3px);
        transition: .2s ease-in-out;
    }

    .admin-table tbody tr:hover {
        background-color: rgba(38, 198, 218, 0.08) !important;
    }

    @media (max-width: 991.98px) {
        .admin-table__comment {
            min-width: 320px;
        }
    }
</style>

@endsection
