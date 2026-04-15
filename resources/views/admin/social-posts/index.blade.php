@extends('layouts.app')

@section('content')
<section class="social-admin-page py-5">
    <div class="container-fluid social-admin-shell px-3 px-lg-4 px-xxl-5">
        <div class="social-admin-header mb-4">
            <div>
                <span class="social-admin-header__eyebrow">Panel social</span>
                <h1 class="social-admin-header__title">Publicaciones y programacion base</h1>
                <p class="social-admin-header__text">
                    Desde aqui puedes crear borradores, dejar publicaciones aprobadas, programarlas y marcar cuando ya quedaron publicadas externamente.
                </p>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('admin.social-templates.index') }}" class="btn btn-outline-light rounded-pill px-4 fw-semibold">
                    <i class="bi bi-palette-fill me-2"></i>Crear desde diseno
                </a>
                <a href="{{ route('admin.social-posts.create') }}" class="btn btn-primary rounded-pill px-4 fw-semibold">
                    <i class="bi bi-plus-circle me-2"></i>Nueva publicacion
                </a>
            </div>
        </div>

        @include('admin.partials.navigation')

        @if (session('success'))
            <div class="alert social-admin-alert mb-4">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert social-admin-alert social-admin-alert--danger mb-4">{{ session('error') }}</div>
        @endif

        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-xl">
                <article class="social-kpi social-kpi--slate h-100">
                    <span>Total</span>
                    <strong>{{ $stats['total'] }}</strong>
                    <small>Publicaciones registradas</small>
                </article>
            </div>
            <div class="col-sm-6 col-xl">
                <article class="social-kpi social-kpi--blue h-100">
                    <span>Borradores</span>
                    <strong>{{ $stats['draft'] }}</strong>
                    <small>Pendientes de aprobacion</small>
                </article>
            </div>
            <div class="col-sm-6 col-xl">
                <article class="social-kpi social-kpi--violet h-100">
                    <span>Programadas</span>
                    <strong>{{ $stats['scheduled'] }}</strong>
                    <small>Con fecha futura</small>
                </article>
            </div>
            <div class="col-sm-6 col-xl">
                <article class="social-kpi social-kpi--cyan h-100">
                    <span>Listas</span>
                    <strong>{{ $stats['ready'] }}</strong>
                    <small>Disponibles para integracion</small>
                </article>
            </div>
            <div class="col-sm-6 col-xl">
                <article class="social-kpi social-kpi--green h-100">
                    <span>Publicadas</span>
                    <strong>{{ $stats['published'] }}</strong>
                    <small>Cerradas manualmente</small>
                </article>
            </div>
        </div>

        <div class="social-info-panel mb-4">
            <div>
                <span class="social-pill">Estado de esta fase</span>
                @if($linkedInConnection)
                    <h2>LinkedIn ya esta conectado para publicacion real</h2>
                    <p>
                        Ya puedes enviar publicaciones a LinkedIn directamente desde este panel. Gemini sigue siendo opcional: solo se necesita si quieres generar o mejorar el texto con IA antes de publicar.
                    </p>
                @else
                    <h2>La conexion externa todavia no esta activa</h2>
                    <p>
                        Este modulo ya te deja administrar el contenido y la programacion interna. La salida real a LinkedIn se habilita apenas conectes una cuenta desde el modulo de conexiones.
                    </p>
                @endif
            </div>
            <div class="social-info-panel__legend">
                <div><strong>Borrador:</strong> contenido en construccion.</div>
                <div><strong>Programada:</strong> aprobada con fecha futura.</div>
                <div><strong>Lista:</strong> ya cumplio fecha y puede salir a publicacion.</div>
                @if($linkedInConnection)
                    <div><strong>LinkedIn:</strong> cuenta activa {{ $linkedInConnection->account_name }}.</div>
                @endif
            </div>
        </div>

        <div class="social-table-card">
            <div class="social-table-card__header">
                <h3>Publicaciones registradas</h3>
                <p class="mb-0">Resumen completo de contenido, redes, estado y fecha objetivo.</p>
            </div>

            <div class="table-responsive">
                <table class="table social-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Redes</th>
                            <th>Estado</th>
                            <th>Programada</th>
                            <th>Publicada</th>
                            <th>Resumen</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>
                                    <div class="fw-semibold text-white">{{ $post->title }}</div>
                                    <small class="text-secondary">Actualizada {{ $post->updated_at->format('d M Y H:i') }}</small>
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($post->platform_labels as $platformLabel)
                                            <span class="social-chip">{{ $platformLabel }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <span class="social-status social-status--{{ $post->status }}">
                                        {{ $post->status_label }}
                                    </span>
                                </td>
                                <td>
                                    {{ $post->publish_at ? $post->publish_at->format('d M Y H:i') : 'Sin fecha' }}
                                </td>
                                <td>
                                    {{ $post->published_at ? $post->published_at->format('d M Y H:i') : 'Pendiente' }}
                                </td>
                                <td class="social-table__content">
                                    {{ \Illuminate\Support\Str::limit($post->content, 140) }}
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap justify-content-end gap-2">
                                        <a href="{{ route('admin.social-posts.edit', $post) }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                                            Editar
                                        </a>
                                        @if($linkedInConnection && in_array('linkedin', $post->platforms ?? [], true) && $post->status !== \App\Models\SocialPost::STATUS_PUBLISHED)
                                            <form action="{{ route('admin.social-posts.publish-linkedin', $post) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary btn-sm rounded-pill px-3"
                                                    onclick="return confirm('Publicar esta pieza en LinkedIn ahora?');"
                                                >
                                                    Publicar en LinkedIn
                                                </button>
                                            </form>
                                        @endif
                                        @if($post->status !== \App\Models\SocialPost::STATUS_PUBLISHED)
                                            <form action="{{ route('admin.social-posts.publish', $post) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-sm rounded-pill px-3">
                                                    Marcar publicada manual
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.social-posts.destroy', $post) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                                onclick="return confirm('Eliminar esta publicacion?');"
                                            >
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-secondary">
                                    Aun no hay publicaciones sociales registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($posts->hasPages())
                <div class="social-table-card__footer">
                    {{ $posts->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    .social-admin-page {
        background:
            radial-gradient(circle at top left, rgba(37, 99, 235, 0.16), transparent 30%),
            radial-gradient(circle at right top, rgba(20, 184, 166, 0.12), transparent 24%),
            linear-gradient(180deg, #060b16 0%, #0a1324 52%, #0b1627 100%);
    }

    .social-admin-shell {
        max-width: 1760px;
    }

    .social-admin-header {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 1.2rem;
        align-items: flex-start;
    }

    .social-admin-header__eyebrow,
    .social-pill {
        display: inline-flex;
        padding: 0.42rem 0.9rem;
        border-radius: 999px;
        background: rgba(59, 130, 246, 0.12);
        border: 1px solid rgba(96, 165, 250, 0.16);
        color: #93c5fd;
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .social-admin-header__title {
        margin: 0.85rem 0 0.8rem;
        color: #f8fafc;
        font-size: clamp(2rem, 2.8vw, 3rem);
        font-weight: 900;
        letter-spacing: -0.05em;
    }

    .social-admin-header__text {
        max-width: 760px;
        margin: 0;
        color: #8ea3bd;
        line-height: 1.8;
    }

    .social-admin-alert {
        border: 1px solid rgba(74, 222, 128, 0.16);
        border-radius: 20px;
        background: rgba(4, 120, 87, 0.14);
        color: #d1fae5;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.18);
    }

    .social-admin-alert--danger {
        border-color: rgba(248, 113, 113, 0.2);
        background: rgba(127, 29, 29, 0.22);
        color: #fee2e2;
    }

    .admin-switcher .btn {
        min-width: 180px;
        border-radius: 999px;
    }

    .admin-switcher .btn-outline-primary,
    .admin-switcher .btn-outline-primary:hover {
        color: #dbeafe;
        border-color: rgba(96, 165, 250, 0.18);
        background: rgba(12, 20, 36, 0.8);
    }

    .admin-switcher .btn-primary {
        border-color: transparent;
        background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 50%, #06b6d4 100%);
        box-shadow: 0 18px 30px rgba(29, 78, 216, 0.22);
    }

    .social-kpi,
    .social-info-panel,
    .social-table-card {
        border: 1px solid rgba(148, 163, 184, 0.12);
        border-radius: 28px;
        background: linear-gradient(180deg, rgba(10, 16, 29, 0.96) 0%, rgba(5, 9, 18, 0.98) 100%);
        box-shadow: 0 24px 65px rgba(0, 0, 0, 0.26);
    }

    .social-kpi {
        padding: 1.2rem;
    }

    .social-kpi span,
    .social-kpi small {
        display: block;
    }

    .social-kpi span {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .social-kpi strong {
        display: block;
        margin: 0.6rem 0 0.35rem;
        color: #fff;
        font-size: 2rem;
        font-weight: 900;
    }

    .social-kpi small {
        color: rgba(255, 255, 255, 0.72);
        line-height: 1.6;
    }

    .social-kpi--slate { background: linear-gradient(135deg, #0f172a 0%, #334155 100%); }
    .social-kpi--blue { background: linear-gradient(135deg, #0f172a 0%, #2563eb 100%); }
    .social-kpi--violet { background: linear-gradient(135deg, #111827 0%, #7c3aed 100%); }
    .social-kpi--cyan { background: linear-gradient(135deg, #0f172a 0%, #0891b2 100%); }
    .social-kpi--green { background: linear-gradient(135deg, #0f172a 0%, #15803d 100%); }

    .social-info-panel {
        display: grid;
        grid-template-columns: minmax(0, 1.25fr) minmax(280px, 0.75fr);
        gap: 1.25rem;
        padding: 1.35rem;
        align-items: center;
    }

    .social-info-panel h2,
    .social-table-card__header h3 {
        margin: 0.9rem 0 0.6rem;
        color: #f8fafc;
        font-weight: 900;
        letter-spacing: -0.04em;
    }

    .social-info-panel p,
    .social-table-card__header p,
    .social-info-panel__legend {
        margin: 0;
        color: #8ea3bd;
        line-height: 1.75;
    }

    .social-info-panel__legend {
        display: grid;
        gap: 0.65rem;
        padding: 1rem 1.1rem;
        border-radius: 20px;
        background: rgba(15, 23, 42, 0.72);
        border: 1px solid rgba(148, 163, 184, 0.08);
    }

    .social-table-card {
        overflow: hidden;
    }

    .social-table-card__header {
        padding: 1.25rem 1.35rem 1rem;
    }

    .social-table-card__footer {
        padding: 1rem 1.25rem 1.35rem;
    }

    .social-table-card__footer .pagination {
        margin-bottom: 0;
        justify-content: center;
        gap: 0.35rem;
    }

    .social-table-card__footer .page-link {
        border: none;
        min-width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px !important;
        color: #0d47a1;
        background: #fff;
    }

    .social-table-card__footer .page-item.active .page-link {
        color: #fff;
        background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 60%, #06b6d4 100%);
    }

    .social-table {
        --bs-table-bg: transparent;
        --bs-table-striped-bg: rgba(255, 255, 255, 0.02);
        --bs-table-hover-bg: rgba(37, 99, 235, 0.08);
    }

    .social-table thead th {
        padding: 0.95rem 1.15rem;
        border-bottom: 1px solid rgba(148, 163, 184, 0.12);
        background: rgba(15, 23, 42, 0.88);
        color: #cbd5e1;
        font-size: 0.78rem;
        font-weight: 800;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .social-table tbody td {
        padding: 1rem 1.15rem;
        border-color: rgba(148, 163, 184, 0.08);
        color: #e2e8f0;
        background: transparent;
        vertical-align: middle;
    }

    .social-table__content {
        min-width: 320px;
        color: #94a3b8;
        line-height: 1.7;
    }

    .social-chip,
    .social-status {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        padding: 0.38rem 0.8rem;
        font-size: 0.76rem;
        font-weight: 800;
        letter-spacing: 0.03em;
    }

    .social-chip {
        background: rgba(37, 99, 235, 0.14);
        color: #bfdbfe;
        border: 1px solid rgba(96, 165, 250, 0.14);
    }

    .social-status--draft { background: rgba(71, 85, 105, 0.22); color: #cbd5e1; }
    .social-status--approved { background: rgba(59, 130, 246, 0.2); color: #bfdbfe; }
    .social-status--scheduled { background: rgba(124, 58, 237, 0.22); color: #ddd6fe; }
    .social-status--ready { background: rgba(6, 182, 212, 0.2); color: #a5f3fc; }
    .social-status--published { background: rgba(34, 197, 94, 0.2); color: #bbf7d0; }
    .social-status--failed { background: rgba(239, 68, 68, 0.18); color: #fecaca; }

    @media (max-width: 991.98px) {
        .social-info-panel {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
