@extends('layouts.app')

@section('content')
@php
    $topPage = $topPaths->first();
    $topReferrer = $topReferrers->first();
@endphp

<section class="admin-analytics-page py-5">
    <div class="container-fluid admin-analytics-shell px-3 px-lg-4 px-xxl-5">
        <div class="admin-analytics-header mb-4">
            <div>
                <span class="admin-analytics-header__eyebrow">Panel interno</span>
                <h1 class="admin-analytics-header__title">Dashboard comercial y de trafico</h1>
                <p class="admin-analytics-header__text">
                    Un tablero mas sobrio para revisar mensajes, usuarios unicos estimados, paginas con mayor interes y actividad reciente del sitio.
                </p>
            </div>

            <div class="admin-analytics-period">
                <span class="admin-analytics-period__label">Periodo activo</span>
                <strong>{{ $periodSummary['label'] }}</strong>
                <small>Actualiza el rango para comparar el comportamiento del sitio.</small>
            </div>
        </div>

        @include('admin.partials.navigation')

        @if (session('success'))
            <div class="alert admin-analytics-alert mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="analytics-filter-panel mb-4">
            <div class="analytics-filter-panel__copy">
                <span class="analytics-badge">Filtro de analitica</span>
                <h2>Consulta el rendimiento por rango de fechas</h2>
                <p>
                    Revisa cuantas oportunidades entraron, como se comporta el trafico y que paginas concentran la atencion sin salir del panel.
                </p>
            </div>

            <form method="GET" action="{{ route('admin.contactos') }}" class="analytics-filter-form">
                <div class="analytics-filter-form__field">
                    <label for="date_from" class="form-label">Desde</label>
                    <input type="date" id="date_from" name="date_from" value="{{ $periodSummary['from'] }}" class="form-control rounded-4">
                </div>
                <div class="analytics-filter-form__field">
                    <label for="date_to" class="form-label">Hasta</label>
                    <input type="date" id="date_to" name="date_to" value="{{ $periodSummary['to'] }}" class="form-control rounded-4">
                </div>
                <div class="analytics-filter-form__actions">
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">Aplicar filtro</button>
                    <a href="{{ route('admin.contactos') }}" class="btn btn-outline-light rounded-pill px-4 fw-semibold">Limpiar</a>
                </div>
            </form>
        </div>

        @unless($visitsEnabled)
            <div class="alert alert-warning border-0 shadow-sm rounded-4 mb-4">
                Aun no hay analitica disponible. El sistema empezara a mostrar visitas publicas a partir de ahora.
            </div>
        @endunless

        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-3">
                <article class="analytics-kpi analytics-kpi--blue h-100">
                    <div class="analytics-kpi__icon"><i class="bi bi-envelope-paper"></i></div>
                    <div>
                        <span class="analytics-kpi__label">Mensajes en rango</span>
                        <strong class="analytics-kpi__value">{{ $messagesInRange }}</strong>
                        <small class="analytics-kpi__meta">Contactos captados en el periodo</small>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-3">
                <article class="analytics-kpi analytics-kpi--cyan h-100">
                    <div class="analytics-kpi__icon"><i class="bi bi-people"></i></div>
                    <div>
                        <span class="analytics-kpi__label">Usuarios unicos</span>
                        <strong class="analytics-kpi__value">{{ $uniqueVisitorsRange }}</strong>
                        <small class="analytics-kpi__meta">Estimado por sesion registrada</small>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-3">
                <article class="analytics-kpi analytics-kpi--violet h-100">
                    <div class="analytics-kpi__icon"><i class="bi bi-bar-chart"></i></div>
                    <div>
                        <span class="analytics-kpi__label">Visitas en rango</span>
                        <strong class="analytics-kpi__value">{{ $visitsInRange }}</strong>
                        <small class="analytics-kpi__meta">Navegacion publica registrada</small>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-3">
                <article class="analytics-kpi analytics-kpi--gold h-100">
                    <div class="analytics-kpi__icon"><i class="bi bi-bullseye"></i></div>
                    <div>
                        <span class="analytics-kpi__label">Conversion estimada</span>
                        <strong class="analytics-kpi__value">{{ $conversionRate }}%</strong>
                        <small class="analytics-kpi__meta">Mensajes frente a visitas</small>
                    </div>
                </article>
            </div>

            <div class="col-sm-6 col-xl-3">
                <article class="analytics-kpi analytics-kpi--teal h-100">
                    <div class="analytics-kpi__icon"><i class="bi bi-calendar-day"></i></div>
                    <div>
                        <span class="analytics-kpi__label">Mensajes hoy</span>
                        <strong class="analytics-kpi__value">{{ $messagesToday }}</strong>
                        <small class="analytics-kpi__meta">Actividad del dia actual</small>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-3">
                <article class="analytics-kpi analytics-kpi--green h-100">
                    <div class="analytics-kpi__icon"><i class="bi bi-calendar-week"></i></div>
                    <div>
                        <span class="analytics-kpi__label">Mensajes semana</span>
                        <strong class="analytics-kpi__value">{{ $messagesThisWeek }}</strong>
                        <small class="analytics-kpi__meta">Semana en curso</small>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-3">
                <article class="analytics-kpi analytics-kpi--rose h-100">
                    <div class="analytics-kpi__icon"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <span class="analytics-kpi__label">Visitas hoy</span>
                        <strong class="analytics-kpi__value">{{ $visitsToday }}</strong>
                        <small class="analytics-kpi__meta">Movimiento del dia actual</small>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-3">
                <article class="analytics-kpi analytics-kpi--slate h-100">
                    <div class="analytics-kpi__icon"><i class="bi bi-fingerprint"></i></div>
                    <div>
                        <span class="analytics-kpi__label">Unicos hoy</span>
                        <strong class="analytics-kpi__value">{{ $uniqueVisitorsToday }}</strong>
                        <small class="analytics-kpi__meta">Sesiones diferentes del dia</small>
                    </div>
                </article>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-xxl-8">
                <div class="analytics-card analytics-card--feature h-100">
                    <div class="analytics-card__head">
                        <div>
                            <span class="analytics-badge">Comparativo principal</span>
                            <h3>Mensajes vs visitas por dia</h3>
                            <p>Lectura rapida del comportamiento diario para detectar picos de interes y conversion.</p>
                        </div>
                    </div>

                    <div class="analytics-card__body analytics-card__body--chart">
                        <div class="analytics-chart analytics-chart--main">
                            <canvas id="chartPerformanceOverview"></canvas>
                        </div>
                    </div>

                    <div class="analytics-summary-strip">
                        <div class="analytics-summary-strip__item">
                            <span>Top pagina</span>
                            <strong>{{ $topPage['label'] ?? 'Sin datos' }}</strong>
                        </div>
                        <div class="analytics-summary-strip__item">
                            <span>Principal origen</span>
                            <strong>{{ $topReferrer['label'] ?? 'Directo' }}</strong>
                        </div>
                        <div class="analytics-summary-strip__item">
                            <span>Mensajes del mes</span>
                            <strong>{{ $messagesThisMonth }}</strong>
                        </div>
                        <div class="analytics-summary-strip__item">
                            <span>Visitas del mes</span>
                            <strong>{{ $visitsThisMonth }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4">
                <div class="analytics-card h-100">
                    <div class="analytics-card__head">
                        <div>
                            <span class="analytics-badge">Interes por contenido</span>
                            <h3>Paginas mas visitadas</h3>
                            <p>Distribucion del trafico en las principales rutas publicas.</p>
                        </div>
                    </div>

                    <div class="analytics-card__body">
                        <div class="analytics-chart analytics-chart--donut">
                            <canvas id="chartTopPaginas"></canvas>
                        </div>

                        <div class="analytics-progress-list mt-3">
                            @forelse($topPaths as $item)
                                <div class="analytics-progress-list__item">
                                    <div class="analytics-progress-list__meta">
                                        <span>{{ $item['label'] }}</span>
                                        <strong>{{ $item['total'] }}</strong>
                                    </div>
                                    <div class="analytics-progress-list__bar">
                                        <span style="width: {{ $visitsInRange > 0 ? min(100, round(($item['total'] / $visitsInRange) * 100)) : 0 }}%;"></span>
                                    </div>
                                </div>
                            @empty
                                <div class="dashboard-list__empty">Sin datos de paginas todavia.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6 col-xxl-3">
                <div class="analytics-card analytics-card--compact h-100">
                    <div class="analytics-card__head">
                        <div>
                            <span class="analytics-badge">Ritmo semanal</span>
                            <h3>Mensajes por semana</h3>
                        </div>
                    </div>
                    <div class="analytics-card__body analytics-card__body--chart">
                        <div class="analytics-chart analytics-chart--mini">
                            <canvas id="chartMensajesSemanales"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-3">
                <div class="analytics-card analytics-card--compact h-100">
                    <div class="analytics-card__head">
                        <div>
                            <span class="analytics-badge">Ritmo semanal</span>
                            <h3>Visitas por semana</h3>
                        </div>
                    </div>
                    <div class="analytics-card__body analytics-card__body--chart">
                        <div class="analytics-chart analytics-chart--mini">
                            <canvas id="chartVisitasSemanales"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-3">
                <div class="analytics-card analytics-card--compact h-100">
                    <div class="analytics-card__head">
                        <div>
                            <span class="analytics-badge">Tendencia mensual</span>
                            <h3>Mensajes por mes</h3>
                        </div>
                    </div>
                    <div class="analytics-card__body analytics-card__body--chart">
                        <div class="analytics-chart analytics-chart--mini">
                            <canvas id="chartMensajesMensuales"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xxl-3">
                <div class="analytics-card analytics-card--compact h-100">
                    <div class="analytics-card__head">
                        <div>
                            <span class="analytics-badge">Tendencia mensual</span>
                            <h3>Visitas por mes</h3>
                        </div>
                    </div>
                    <div class="analytics-card__body analytics-card__body--chart">
                        <div class="analytics-chart analytics-chart--mini">
                            <canvas id="chartVisitasMensuales"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-xl-4">
                <div class="analytics-card h-100">
                    <div class="analytics-card__head">
                        <div>
                            <span class="analytics-badge">Paginas publicas</span>
                            <h3>Top paginas visitadas</h3>
                        </div>
                    </div>
                    <div class="analytics-card__body">
                        <div class="dashboard-list">
                            @forelse($topPaths as $item)
                                <div class="dashboard-list__item">
                                    <span>{{ $item['label'] }}</span>
                                    <strong>{{ $item['total'] }}</strong>
                                </div>
                            @empty
                                <div class="dashboard-list__empty">Sin datos de paginas todavia.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="analytics-card h-100">
                    <div class="analytics-card__head">
                        <div>
                            <span class="analytics-badge">Origen del trafico</span>
                            <h3>Referencias principales</h3>
                        </div>
                    </div>
                    <div class="analytics-card__body">
                        <div class="dashboard-list">
                            @forelse($topReferrers as $item)
                                <div class="dashboard-list__item">
                                    <span>{{ $item['label'] }}</span>
                                    <strong>{{ $item['total'] }}</strong>
                                </div>
                            @empty
                                <div class="dashboard-list__empty">Sin datos de referencia todavia.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="analytics-card h-100">
                    <div class="analytics-card__head">
                        <div>
                            <span class="analytics-badge">Actividad reciente</span>
                            <h3>Ultimas visitas</h3>
                        </div>
                    </div>
                    <div class="analytics-card__body">
                        <div class="dashboard-list">
                            @forelse($recentVisits as $visit)
                                <div class="dashboard-list__item">
                                    <span>{{ $visit->path }}</span>
                                    <strong>{{ $visit->visited_at->format('d M H:i') }}</strong>
                                </div>
                            @empty
                                <div class="dashboard-list__empty">Sin navegacion registrada todavia.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="analytics-card h-100">
                    <div class="analytics-card__head">
                        <div>
                            <span class="analytics-badge">Oportunidades recientes</span>
                            <h3>Ultimos mensajes registrados</h3>
                        </div>
                        <a href="{{ route('admin.contactos.listado') }}" class="btn btn-outline-light rounded-pill px-4 fw-semibold">Ver listado</a>
                    </div>
                    <div class="analytics-card__body p-0">
                        <div class="table-responsive">
                            <table class="table analytics-table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Mensaje</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentMessages as $item)
                                        <tr>
                                            <td class="fw-semibold">{{ $item->nombre }}</td>
                                            <td>{{ $item->correo }}</td>
                                            <td class="analytics-table__message">{{ \Illuminate\Support\Str::limit($item->mensaje, 110) }}</td>
                                            <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-muted">Aun no hay mensajes registrados para este periodo.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .admin-analytics-page {
        background:
            radial-gradient(circle at top left, rgba(21, 101, 192, 0.16), transparent 28%),
            radial-gradient(circle at right center, rgba(139, 92, 246, 0.12), transparent 24%),
            linear-gradient(180deg, #040812 0%, #08101d 48%, #09111f 100%);
    }

    .admin-analytics-shell {
        max-width: 1760px;
    }

    .admin-analytics-header {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 1.25rem;
        align-items: flex-start;
    }

    .admin-analytics-header__eyebrow,
    .analytics-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
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

    .admin-analytics-header__title {
        margin: 0.85rem 0 0.8rem;
        color: #f8fafc;
        font-size: clamp(2rem, 2.8vw, 3.2rem);
        font-weight: 900;
        letter-spacing: -0.05em;
    }

    .admin-analytics-header__text {
        max-width: 780px;
        margin: 0;
        color: #8ea3bd;
        line-height: 1.8;
    }

    .admin-analytics-period {
        min-width: min(100%, 320px);
        padding: 1.15rem 1.25rem;
        border-radius: 24px;
        background: linear-gradient(180deg, rgba(12, 20, 36, 0.96) 0%, rgba(7, 12, 24, 0.98) 100%);
        border: 1px solid rgba(148, 163, 184, 0.14);
        box-shadow: 0 28px 70px rgba(0, 0, 0, 0.28);
    }

    .admin-analytics-period__label {
        display: block;
        margin-bottom: 0.45rem;
        color: #7dd3fc;
        font-size: 0.78rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .admin-analytics-period strong {
        display: block;
        color: #f8fafc;
        font-size: 1.18rem;
        font-weight: 800;
    }

    .admin-analytics-period small {
        display: block;
        margin-top: 0.5rem;
        color: #8ea3bd;
        line-height: 1.7;
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

    .admin-analytics-alert {
        padding: 1rem 1.2rem;
        border: 1px solid rgba(74, 222, 128, 0.16);
        border-radius: 20px;
        background: rgba(4, 120, 87, 0.14);
        color: #d1fae5;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.18);
    }

    .analytics-filter-panel,
    .analytics-card {
        border: 1px solid rgba(148, 163, 184, 0.12);
        border-radius: 28px;
        background: linear-gradient(180deg, rgba(10, 16, 29, 0.96) 0%, rgba(5, 9, 18, 0.98) 100%);
        box-shadow: 0 24px 65px rgba(0, 0, 0, 0.26);
    }

    .analytics-filter-panel {
        display: grid;
        grid-template-columns: minmax(0, 1.1fr) minmax(300px, 0.9fr);
        gap: 1.4rem;
        padding: 1.35rem;
        align-items: center;
    }

    .analytics-filter-panel__copy h2,
    .analytics-card__head h3 {
        margin: 0.9rem 0 0.65rem;
        color: #f8fafc;
        font-weight: 900;
        letter-spacing: -0.04em;
    }

    .analytics-filter-panel__copy h2 {
        font-size: clamp(1.55rem, 2vw, 2.3rem);
    }

    .analytics-filter-panel__copy p,
    .analytics-card__head p {
        margin: 0;
        color: #8ea3bd;
        line-height: 1.75;
    }

    .analytics-filter-form {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.85rem;
        padding: 1rem;
        border-radius: 22px;
        background: rgba(15, 23, 42, 0.54);
        border: 1px solid rgba(148, 163, 184, 0.1);
    }

    .analytics-filter-form__field .form-label {
        color: #cbd5e1;
        font-weight: 700;
    }

    .analytics-filter-form__field .form-control {
        min-height: 52px;
        color: #e2e8f0;
        border-color: rgba(148, 163, 184, 0.18);
        background: rgba(9, 15, 27, 0.9);
    }

    .analytics-filter-form__field .form-control:focus {
        color: #fff;
        border-color: rgba(34, 211, 238, 0.36);
        box-shadow: 0 0 0 0.2rem rgba(34, 211, 238, 0.12);
        background: rgba(9, 15, 27, 1);
    }

    .analytics-filter-form__actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        grid-column: 1 / -1;
    }

    .analytics-kpi {
        display: grid;
        grid-template-columns: 56px minmax(0, 1fr);
        gap: 0.95rem;
        align-items: center;
        padding: 1.15rem;
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.05);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.04);
    }

    .analytics-kpi__icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.12);
        color: #fff;
        font-size: 1.2rem;
    }

    .analytics-kpi__label {
        display: block;
        margin-bottom: 0.45rem;
        color: rgba(255, 255, 255, 0.68);
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .analytics-kpi__value {
        display: block;
        color: #fff;
        font-size: clamp(1.5rem, 1.8vw, 2.15rem);
        font-weight: 900;
        letter-spacing: -0.05em;
        line-height: 1.05;
    }

    .analytics-kpi__meta {
        display: block;
        margin-top: 0.25rem;
        color: rgba(255, 255, 255, 0.74);
        line-height: 1.55;
    }

    .analytics-kpi--blue { background: linear-gradient(135deg, #0f172a 0%, #1d4ed8 100%); }
    .analytics-kpi--cyan { background: linear-gradient(135deg, #0f172a 0%, #0891b2 100%); }
    .analytics-kpi--violet { background: linear-gradient(135deg, #111827 0%, #7c3aed 100%); }
    .analytics-kpi--gold { background: linear-gradient(135deg, #111827 0%, #d97706 100%); }
    .analytics-kpi--teal { background: linear-gradient(135deg, #0f172a 0%, #0f766e 100%); }
    .analytics-kpi--green { background: linear-gradient(135deg, #0f172a 0%, #15803d 100%); }
    .analytics-kpi--rose { background: linear-gradient(135deg, #111827 0%, #e11d48 100%); }
    .analytics-kpi--slate { background: linear-gradient(135deg, #020617 0%, #334155 100%); }

    .analytics-card {
        height: 100%;
        overflow: hidden;
    }

    .analytics-card__head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1rem;
        padding: 1.25rem 1.25rem 0;
    }

    .analytics-card__head h3 {
        font-size: 1.15rem;
    }

    .analytics-card__body {
        padding: 1.1rem 1.25rem 1.25rem;
    }

    .analytics-card__body--chart {
        padding-top: 0.85rem;
    }

    .analytics-card--feature .analytics-card__body {
        padding-bottom: 0.5rem;
    }

    .analytics-chart {
        position: relative;
        width: 100%;
    }

    .analytics-chart--main {
        height: 320px;
    }

    .analytics-chart--mini {
        height: 170px;
    }

    .analytics-chart--donut {
        height: 250px;
    }

    .analytics-summary-strip {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 0.85rem;
        padding: 0 1.25rem 1.25rem;
    }

    .analytics-summary-strip__item {
        padding: 0.9rem 1rem;
        border-radius: 18px;
        background: rgba(15, 23, 42, 0.74);
        border: 1px solid rgba(148, 163, 184, 0.08);
    }

    .analytics-summary-strip__item span {
        display: block;
        margin-bottom: 0.35rem;
        color: #8ea3bd;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .analytics-summary-strip__item strong {
        color: #f8fafc;
        font-size: 1rem;
        font-weight: 800;
    }

    .analytics-progress-list {
        display: grid;
        gap: 0.9rem;
    }

    .analytics-progress-list__item {
        display: grid;
        gap: 0.5rem;
    }

    .analytics-progress-list__meta {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        color: #cbd5e1;
    }

    .analytics-progress-list__meta span {
        color: #cbd5e1;
        font-weight: 600;
    }

    .analytics-progress-list__meta strong {
        color: #f8fafc;
    }

    .analytics-progress-list__bar {
        height: 8px;
        border-radius: 999px;
        background: rgba(51, 65, 85, 0.66);
        overflow: hidden;
    }

    .analytics-progress-list__bar span {
        display: block;
        height: 100%;
        border-radius: inherit;
        background: linear-gradient(90deg, #2563eb 0%, #22d3ee 100%);
    }

    .analytics-table {
        --bs-table-bg: transparent;
        --bs-table-striped-bg: rgba(255, 255, 255, 0.02);
        --bs-table-hover-bg: rgba(37, 99, 235, 0.08);
    }

    .analytics-table thead th {
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

    .analytics-table tbody td {
        padding: 1rem 1.15rem;
        border-color: rgba(148, 163, 184, 0.08);
        color: #e2e8f0;
        vertical-align: middle;
        background: transparent;
    }

    .analytics-table__message {
        min-width: 360px;
        color: #8ea3bd;
        line-height: 1.7;
    }

    .dashboard-list {
        display: grid;
        gap: 0.7rem;
    }

    .dashboard-list__item,
    .dashboard-list__empty {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        padding: 0.82rem 0.95rem;
        border-radius: 16px;
        background: rgba(15, 23, 42, 0.82);
        border: 1px solid rgba(148, 163, 184, 0.08);
        color: #8ea3bd;
    }

    .dashboard-list__item strong {
        color: #f8fafc;
        font-weight: 800;
    }

    @media (max-width: 1199.98px) {
        .analytics-summary-strip {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 991.98px) {
        .analytics-filter-panel {
            grid-template-columns: 1fr;
        }

        .analytics-filter-form {
            grid-template-columns: 1fr;
        }

        .analytics-chart--main {
            height: 280px;
        }
    }

    @media (max-width: 767.98px) {
        .admin-analytics-header {
            flex-direction: column;
        }

        .admin-analytics-period {
            width: 100%;
        }

        .analytics-kpi {
            grid-template-columns: 48px minmax(0, 1fr);
        }

        .analytics-kpi__icon {
            width: 48px;
            height: 48px;
            border-radius: 15px;
        }

        .analytics-summary-strip {
            grid-template-columns: 1fr;
        }

        .analytics-chart--main {
            height: 250px;
        }

        .analytics-chart--mini,
        .analytics-chart--donut {
            height: 220px;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const chartPalette = {
        blue: '#3b82f6',
        cyan: '#22d3ee',
        violet: '#8b5cf6',
        teal: '#14b8a6',
        gold: '#f59e0b',
        green: '#22c55e',
        rose: '#f43f5e',
        slate: '#94a3b8',
        white: '#e2e8f0',
        grid: 'rgba(148, 163, 184, 0.12)',
        tooltip: '#0f172a',
    };

    const messageDailySeries = @json($messageDailySeries);
    const messageWeeklySeries = @json($messageWeeklySeries);
    const messageMonthlySeries = @json($messageMonthlySeries);
    const visitDailySeries = @json($visitDailySeries);
    const visitWeeklySeries = @json($visitWeeklySeries);
    const visitMonthlySeries = @json($visitMonthlySeries);
    const topPaths = @json($topPaths);

    const buildCartesianOptions = function (legend = true) {
        return {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    display: legend,
                    labels: {
                        color: chartPalette.white,
                        usePointStyle: true,
                        boxWidth: 8,
                        boxHeight: 8,
                        padding: 16,
                    }
                },
                tooltip: {
                    backgroundColor: chartPalette.tooltip,
                    titleColor: chartPalette.white,
                    bodyColor: chartPalette.white,
                    borderColor: 'rgba(148, 163, 184, 0.18)',
                    borderWidth: 1,
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        color: chartPalette.slate,
                        maxRotation: 0,
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: chartPalette.grid,
                        drawBorder: false,
                    },
                    ticks: {
                        precision: 0,
                        color: chartPalette.slate,
                    }
                }
            }
        };
    };

    const makeDualLineChart = function (id, labels, firstValues, secondValues) {
        const element = document.getElementById(id);
        if (!element) {
            return;
        }

        new Chart(element, {
            type: 'line',
            data: {
                labels,
                datasets: [
                    {
                        label: 'Mensajes',
                        data: firstValues,
                        borderColor: chartPalette.blue,
                        backgroundColor: 'rgba(59, 130, 246, 0.16)',
                        fill: true,
                        tension: 0.36,
                        borderWidth: 2.4,
                        pointRadius: 2.4,
                        pointHoverRadius: 4,
                        pointBackgroundColor: chartPalette.blue,
                    },
                    {
                        label: 'Visitas',
                        data: secondValues,
                        borderColor: chartPalette.cyan,
                        backgroundColor: 'rgba(34, 211, 238, 0.12)',
                        fill: true,
                        tension: 0.36,
                        borderWidth: 2.4,
                        pointRadius: 2.4,
                        pointHoverRadius: 4,
                        pointBackgroundColor: chartPalette.cyan,
                    }
                ]
            },
            options: buildCartesianOptions(true),
        });
    };

    const makeMiniBarChart = function (id, labels, values, color) {
        const element = document.getElementById(id);
        if (!element) {
            return;
        }

        new Chart(element, {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                    data: values,
                    backgroundColor: color,
                    borderRadius: 10,
                    maxBarThickness: 24,
                }]
            },
            options: buildCartesianOptions(false),
        });
    };

    const topPagesElement = document.getElementById('chartTopPaginas');
    if (topPagesElement) {
        new Chart(topPagesElement, {
            type: 'doughnut',
            data: {
                labels: topPaths.map(item => item.label),
                datasets: [{
                    data: topPaths.map(item => item.total),
                    backgroundColor: [
                        chartPalette.blue,
                        chartPalette.cyan,
                        chartPalette.violet,
                        chartPalette.gold,
                        chartPalette.teal,
                        chartPalette.rose,
                        chartPalette.green,
                        chartPalette.slate,
                    ],
                    borderColor: '#07101c',
                    borderWidth: 6,
                    hoverOffset: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '72%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: chartPalette.white,
                            usePointStyle: true,
                            boxWidth: 8,
                            boxHeight: 8,
                            padding: 16,
                        }
                    },
                    tooltip: {
                        backgroundColor: chartPalette.tooltip,
                        titleColor: chartPalette.white,
                        bodyColor: chartPalette.white,
                        borderColor: 'rgba(148, 163, 184, 0.18)',
                        borderWidth: 1,
                    }
                }
            }
        });
    }

    makeDualLineChart(
        'chartPerformanceOverview',
        messageDailySeries.labels,
        messageDailySeries.values,
        visitDailySeries.values
    );

    makeMiniBarChart('chartMensajesSemanales', messageWeeklySeries.labels, messageWeeklySeries.values, 'rgba(59, 130, 246, 0.9)');
    makeMiniBarChart('chartVisitasSemanales', visitWeeklySeries.labels, visitWeeklySeries.values, 'rgba(34, 211, 238, 0.9)');
    makeMiniBarChart('chartMensajesMensuales', messageMonthlySeries.labels, messageMonthlySeries.values, 'rgba(139, 92, 246, 0.88)');
    makeMiniBarChart('chartVisitasMensuales', visitMonthlySeries.labels, visitMonthlySeries.values, 'rgba(245, 158, 11, 0.88)');
</script>

@endsection
