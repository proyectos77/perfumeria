@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container-fluid admin-wide-shell px-3 px-lg-4 px-xxl-5">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Administracion web</span>
            <h1 class="section-heading__title">Proyectos gestionados</h1>
            <p class="section-heading__text">Crea, organiza y publica los proyectos que quieres mostrar en la portada del sitio.</p>
        </div>

        @include('admin.partials.navigation')

        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-lg rounded-pill px-4 fw-bold">
                <i class="bi bi-plus-circle me-2"></i>Nuevo proyecto
            </a>
        </div>

        <div class="card admin-table-card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table admin-table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Proyecto</th>
                                <th>Cliente</th>
                                <th>Estado</th>
                                <th>Portada</th>
                                <th>Orden</th>
                                <th>Fecha</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $project)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="{{ $project->image_path ? $project->imageUrl() : asset('images/home/imagen-home1.png') }}" alt="{{ $project->title }}" class="project-table-thumb">
                                            <div>
                                                <strong class="d-block">{{ $project->title }}</strong>
                                                <small class="text-muted">{{ $project->summary }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $project->client_name ?: 'Sin definir' }}</td>
                                    <td>
                                        <span class="badge rounded-pill {{ $project->status === 'published' ? 'text-bg-success' : 'text-bg-secondary' }}">
                                            {{ $project->status === 'published' ? 'Publicado' : 'Borrador' }}
                                        </span>
                                    </td>
                                    <td>{{ $project->is_featured ? 'Si' : 'No' }}</td>
                                    <td>{{ $project->display_order }}</td>
                                    <td>{{ optional($project->completed_at)->format('d M Y') ?: '-' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Editar</a>
                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Eliminar este proyecto?');">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">Aun no has creado proyectos para mostrar en el sitio.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($projects->hasPages())
                <div class="card-footer bg-white">
                    {{ $projects->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    .admin-table-card {
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 28px 80px rgba(0, 31, 77, 0.12) !important;
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
    }

    .admin-table tbody td {
        padding: 1rem 1.1rem;
        border-color: rgba(18, 32, 51, 0.06);
        color: #122033;
    }

    .project-table-thumb {
        width: 68px;
        height: 68px;
        object-fit: cover;
        border-radius: 16px;
        background: #dbe5f2;
    }
</style>
@endsection
