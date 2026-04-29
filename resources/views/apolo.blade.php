@extends('layouts.app')

@section('body_class', 'bg-light')

@section('content')
@php
    $apoloHomeUrl = config('services.apolo.url');
    $apoloRegisterUrl = config('services.apolo.register_url');
    $showRegisterButton = filled($apoloRegisterUrl) && $apoloRegisterUrl !== $apoloHomeUrl;

    $definitionPoints = [
        [
            'icon' => 'bi bi-folder-check',
            'title' => 'Sistema propio',
            'text' => 'El SGDEA Crear System es una solución desarrollada por la firma para trabajar gestión documental con mayor orden, trazabilidad y control.',
        ],
        [
            'icon' => 'bi bi-diagram-3',
            'title' => 'Pensado para operar',
            'text' => 'No se presenta como una idea abstracta. Es un sistema orientado al trabajo diario con documentos, seguimiento y estructura de información.',
        ],
        [
            'icon' => 'bi bi-shield-check',
            'title' => 'Enfoque práctico',
            'text' => 'La propuesta se centra en utilidad real, claridad de uso y una base documental más confiable para la organización.',
        ],
    ];

    $originReasons = [
        'El SGDEA se crea desde una necesidad concreta: trabajar la gestión documental con una base más organizada, menos dispersión y mejor criterio de control.',
        'También responde a una convicción de Crear System: las soluciones documentales deben ser útiles en la práctica y no quedarse solo en conceptos o promesas comerciales.',
        'Por eso el sistema forma parte de la propia experiencia de la firma y sirve como caso real para aprender, ajustar y fortalecer el acompañamiento a otras organizaciones.',
    ];

    $internalUsePoints = [
        [
            'icon' => 'bi bi-inboxes',
            'title' => 'Organización de información',
            'text' => 'Se usa como base para estructurar documentos, mantener mejor orden interno y trabajar con mayor consistencia en la gestión de archivos.',
        ],
        [
            'icon' => 'bi bi-arrow-repeat',
            'title' => 'Validación continua',
            'text' => 'Su uso interno permite detectar mejoras, entender necesidades reales de operación y evolucionar el sistema desde la experiencia práctica.',
        ],
        [
            'icon' => 'bi bi-people',
            'title' => 'Criterio para acompañar',
            'text' => 'Al ser una herramienta utilizada por Crear System, la conversación con clientes potenciales se basa en uso real y no solo en una propuesta teórica.',
        ],
    ];

    $problemCards = [
        [
            'icon' => 'bi bi-files',
            'title' => 'Documentos dispersos',
            'text' => 'Ayuda a reducir la dispersión de archivos y a trabajar con una estructura más clara para consultar y organizar información.',
        ],
        [
            'icon' => 'bi bi-search',
            'title' => 'Dificultad para encontrar información',
            'text' => 'Facilita una gestión más ordenada para que la información sea más localizable y útil en el trabajo diario.',
        ],
        [
            'icon' => 'bi bi-clock-history',
            'title' => 'Falta de seguimiento',
            'text' => 'Aporta una base más sólida para dar continuidad a los documentos y reducir pérdida de contexto en los procesos.',
        ],
        [
            'icon' => 'bi bi-exclamation-triangle',
            'title' => 'Dependencia de prácticas informales',
            'text' => 'Permite pasar de una gestión basada en hábitos dispersos a una forma de trabajo más consistente y controlada.',
        ],
    ];

    $idealProfiles = [
        'Organizaciones que manejan volumen documental relevante y necesitan más orden para operar.',
        'Equipos que quieren reducir dispersión de archivos y mejorar acceso a la información.',
        'Empresas que buscan una base documental más clara antes de crecer o formalizar procesos.',
        'Entidades que valoran una solución acompañada por una firma que también la usa como caso real.',
    ];

    $previewMetrics = [
        ['label' => 'Expedientes activos', 'value' => '128'],
        ['label' => 'Documentos trazados', 'value' => '1.246'],
        ['label' => 'Pendientes por revisar', 'value' => '14'],
    ];

    $previewSignals = [
        'Consulta centralizada de documentos y expedientes.',
        'Seguimiento visible de estados y responsables.',
        'Bitácora clara para saber qué pasó y cuándo.',
    ];
@endphp

@include('partials.page-hero', [
    'class' => 'page-hero--about sgdea-hero',
    'image' => 'images/quienes-somos/imagen-gemeni1.png',
    'badge' => [
        'icon' => 'bi bi-folder2-open',
        'text' => 'SGDEA Crear System',
    ],
    'title' => 'Un sistema propio para trabajar la gestión documental con más orden y respaldo.',
    'description' => 'El SGDEA Crear System es una solución desarrollada por la firma y utilizada internamente como caso real de aplicación. Su valor no está en prometer complejidad técnica, sino en aportar estructura, claridad y mejor control sobre la información documental.',
    'actions' => array_values(array_filter([
        [
            'href' => '#que-es-sgdea',
            'label' => 'Conocer el sistema',
            'icon' => 'bi bi-arrow-down-circle',
            'class' => 'btn btn-warning btn-lg px-5 fw-bold shadow-lg',
        ],
        filled($apoloHomeUrl) ? [
            'href' => $apoloHomeUrl,
            'label' => 'Ir al sistema',
            'icon' => 'bi bi-box-arrow-up-right',
            'target' => '_blank',
            'class' => 'btn btn-outline-light btn-lg px-5 fw-semibold',
        ] : null,
    ])),
    'highlights' => [
        ['value' => 'Propio', 'label' => 'Sistema desarrollado por Crear System'],
        ['value' => 'Real', 'label' => 'Uso interno como caso de aplicación'],
        ['value' => 'Claro', 'label' => 'Enfoque práctico y orientado a valor'],
    ],
])

<section id="que-es-sgdea" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">1. Qué es el SGDEA</span>
            <h2 class="section-heading__title">Un producto propio orientado a gestión documental con criterio práctico</h2>
            <p class="section-heading__text">El SGDEA Crear System se presenta como una solución real de la firma para trabajar documentación con más estructura, mejor seguimiento y una base operativa más clara.</p>
        </div>

        <div class="row g-4">
            @foreach($definitionPoints as $point)
                <div class="col-lg-4">
                    <article class="premium-card premium-card--story h-100">
                        <div class="premium-card__icon premium-card__icon--brand">
                            <i class="{{ $point['icon'] }}"></i>
                        </div>
                        <h3 class="premium-card__title">{{ $point['title'] }}</h3>
                        <p class="premium-card__text">{{ $point['text'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" id="vista-referencia">
    <div class="container py-lg-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <div class="content-panel">
                    <span class="section-heading__eyebrow">Vista de referencia</span>
                    <h2 class="section-heading__title text-start mb-3">Una referencia visual para entender cómo se organiza el trabajo</h2>
                    <p class="section-heading__text text-start mb-4">Esta vista no busca mostrar complejidad técnica. Busca dejar claro el tipo de orden que propone el sistema: expedientes visibles, estados claros, consulta rápida y seguimiento trazable.</p>

                    <ul class="premium-list">
                        @foreach($previewSignals as $signal)
                            <li><i class="bi bi-check-circle-fill"></i><span>{{ $signal }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="sgdea-preview">
                    <div class="sgdea-preview__window">
                        <div class="sgdea-preview__topbar">
                            <div class="sgdea-preview__dots">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="sgdea-preview__title">SGDEA Crear System</div>
                            <div class="sgdea-preview__status">Caso real en uso</div>
                        </div>

                        <div class="sgdea-preview__body">
                            <aside class="sgdea-preview__sidebar">
                                <strong>Módulos</strong>
                                <span>Expedientes</span>
                                <span>Documentos</span>
                                <span>Seguimiento</span>
                                <span>Consulta</span>
                            </aside>

                            <div class="sgdea-preview__content">
                                <div class="sgdea-preview__metrics">
                                    @foreach($previewMetrics as $metric)
                                        <div class="sgdea-preview__metric">
                                            <small>{{ $metric['label'] }}</small>
                                            <strong>{{ $metric['value'] }}</strong>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="sgdea-preview__panel">
                                    <div class="sgdea-preview__panel-header">
                                        <strong>Expedientes recientes</strong>
                                        <span>Actualizado</span>
                                    </div>

                                    <div class="sgdea-preview__list">
                                        <div class="sgdea-preview__row">
                                            <span>CON-2026-014</span>
                                            <span>Contrato marco</span>
                                            <span class="sgdea-preview__badge sgdea-preview__badge--ok">Vigente</span>
                                        </div>
                                        <div class="sgdea-preview__row">
                                            <span>CAL-2026-031</span>
                                            <span>Acta de validación</span>
                                            <span class="sgdea-preview__badge sgdea-preview__badge--pending">Revisión</span>
                                        </div>
                                        <div class="sgdea-preview__row">
                                            <span>PRO-2026-009</span>
                                            <span>Propuesta técnica</span>
                                            <span class="sgdea-preview__badge sgdea-preview__badge--trace">Trazado</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="sgdea-preview__trace">
                                    <strong>Bitácora reciente</strong>
                                    <div>
                                        <span>10:24</span>
                                        <p>Se actualizó el expediente CAL-2026-031 con observaciones del responsable.</p>
                                    </div>
                                    <div>
                                        <span>09:10</span>
                                        <p>Se registró nueva versión documental para el proceso PRO-2026-009.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="por-que-se-creo">
    <div class="container py-lg-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="content-panel">
                    <span class="section-heading__eyebrow">2. Por qué se creó</span>
                    <h2 class="section-heading__title text-start mb-3">Nace desde una necesidad real de trabajo, no desde una promesa comercial vacía</h2>

                    @foreach($originReasons as $reason)
                        <p class="section-heading__text text-start mb-3">{{ $reason }}</p>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-6">
                <div class="sgdea-side-card">
                    <x-apolo-logo class="apolo-logo--large mb-4" />
                    <h3>Producto propio con experiencia aplicada</h3>
                    <p class="mb-0">El valor del SGDEA no está en declararse innovador, sino en servir como una herramienta útil para trabajar mejor la información documental y fortalecer el criterio con el que Crear System acompaña este tipo de necesidades.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-surface py-5" id="como-se-usa">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">3. Cómo se usa en Crear System</span>
            <h2 class="section-heading__title">Se utiliza internamente como caso real para trabajar, validar y mejorar</h2>
            <p class="section-heading__text">Crear System usa el SGDEA como una base de aplicación práctica. Eso permite conocer mejor sus alcances, detectar mejoras y hablar del sistema desde la experiencia real.</p>
        </div>

        <div class="row g-4">
            @foreach($internalUsePoints as $point)
                <div class="col-lg-4">
                    <article class="sgdea-use-card h-100">
                        <div class="sgdea-use-card__icon">
                            <i class="{{ $point['icon'] }}"></i>
                        </div>
                        <h3 class="sgdea-use-card__title">{{ $point['title'] }}</h3>
                        <p class="sgdea-use-card__text mb-0">{{ $point['text'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 bg-white" id="problemas-que-resuelve">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">4. Qué problemas resuelve</span>
            <h2 class="section-heading__title">Aporta orden, acceso y una forma más consistente de trabajar la documentación</h2>
            <p class="section-heading__text">El SGDEA busca ayudar cuando la gestión documental empieza a depender demasiado de archivos dispersos, criterios poco uniformes o prácticas difíciles de sostener en el tiempo.</p>
        </div>

        <div class="row g-4">
            @foreach($problemCards as $card)
                <div class="col-md-6">
                    <article class="problem-card h-100">
                        <div class="problem-card__icon">
                            <i class="{{ $card['icon'] }}"></i>
                        </div>
                        <h3 class="problem-card__title">{{ $card['title'] }}</h3>
                        <p class="problem-card__text mb-0">{{ $card['text'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" id="para-quien-es-ideal">
    <div class="container py-lg-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <div class="content-panel">
                    <span class="section-heading__eyebrow">5. Para qué tipo de organizaciones es ideal</span>
                    <h2 class="section-heading__title text-start mb-3">Encaja mejor en organizaciones que necesitan más estructura documental</h2>
                    <p class="section-heading__text text-start mb-0">No todas las empresas necesitan el mismo nivel de solución documental. El SGDEA tiene más sentido cuando ya existe una necesidad real de ordenar mejor, consultar mejor y sostener mejor la gestión de información.</p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="sgdea-ideal-panel">
                    @foreach($idealProfiles as $profile)
                        <div class="sgdea-ideal-panel__item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>{{ $profile }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 position-relative overflow-hidden sgdea-cta">
    <div class="container py-lg-4 text-center position-relative">
        <span class="badge bg-warning text-dark px-4 py-2 mb-4">
            <i class="bi bi-chat-dots me-1"></i>Siguiente paso
        </span>
        <h2 class="display-5 fw-bold text-white mb-3">Si quieres conocer si este sistema encaja con tu organización, conversemos.</h2>
        <p class="lead text-white-50 sgdea-cta__text mb-4">Podemos revisar tu contexto, entender el nivel de necesidad documental y definir si tiene sentido explorar una implementación o una conversación más detallada.</p>

        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold shadow-lg">
                <i class="bi bi-send me-2"></i>Solicitar conversación
            </a>
            @if(filled($apoloHomeUrl))
                <a href="{{ $apoloHomeUrl }}" target="_blank" rel="noopener" class="btn btn-outline-light btn-lg px-5 fw-semibold">
                    <i class="bi bi-box-arrow-up-right me-2"></i>Ir al sistema
                </a>
            @endif
            @if($showRegisterButton)
                <a href="{{ $apoloRegisterUrl }}" target="_blank" rel="noopener" class="btn btn-outline-light btn-lg px-5 fw-semibold">
                    <i class="bi bi-person-plus me-2"></i>Registrarse
                </a>
            @endif
        </div>
    </div>
</section>

<style>
.sgdea-side-card,
.sgdea-use-card,
.sgdea-ideal-panel,
.sgdea-preview__window {
    border-radius: 30px;
}

.sgdea-side-card {
    height: 100%;
    padding: 2rem;
    background: linear-gradient(180deg, rgba(11, 31, 58, 0.96) 0%, rgba(18, 74, 138, 0.92) 100%);
    color: #fff;
    box-shadow: 0 24px 60px rgba(6, 30, 64, 0.18);
}

.sgdea-side-card h3 {
    margin-bottom: 0.9rem;
    font-size: 1.45rem;
    font-weight: 700;
}

.sgdea-side-card p {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.72;
}

.sgdea-preview {
    position: relative;
}

.sgdea-preview__window {
    overflow: hidden;
    border: 1px solid rgba(11, 31, 58, 0.08);
    background: linear-gradient(180deg, #ffffff 0%, #f4f8fc 100%);
    box-shadow: 0 24px 60px rgba(6, 30, 64, 0.12);
}

.sgdea-preview__topbar {
    display: grid;
    grid-template-columns: auto 1fr auto;
    align-items: center;
    gap: 1rem;
    padding: 1rem 1.25rem;
    background: linear-gradient(90deg, #0b1f3a 0%, #124a8a 100%);
    color: #fff;
}

.sgdea-preview__dots {
    display: inline-flex;
    gap: 0.45rem;
}

.sgdea-preview__dots span {
    width: 10px;
    height: 10px;
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.6);
}

.sgdea-preview__title,
.sgdea-preview__status {
    font-weight: 700;
}

.sgdea-preview__status {
    font-size: 0.82rem;
    color: rgba(255, 255, 255, 0.8);
}

.sgdea-preview__body {
    display: grid;
    grid-template-columns: 190px 1fr;
    min-height: 420px;
}

.sgdea-preview__sidebar {
    display: grid;
    align-content: start;
    gap: 0.85rem;
    padding: 1.5rem 1.15rem;
    background: rgba(11, 31, 58, 0.04);
    border-right: 1px solid rgba(11, 31, 58, 0.08);
}

.sgdea-preview__sidebar strong {
    color: #0b1f3a;
    font-size: 0.9rem;
}

.sgdea-preview__sidebar span {
    padding: 0.7rem 0.85rem;
    border-radius: 14px;
    background: rgba(255, 255, 255, 0.9);
    color: #5b6777;
    font-weight: 600;
}

.sgdea-preview__content {
    display: grid;
    gap: 1rem;
    padding: 1.4rem;
}

.sgdea-preview__metrics {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 0.9rem;
}

.sgdea-preview__metric {
    padding: 1rem;
    border-radius: 18px;
    background: #fff;
    border: 1px solid rgba(11, 31, 58, 0.08);
}

.sgdea-preview__metric small {
    display: block;
    margin-bottom: 0.35rem;
    color: #5b6777;
}

.sgdea-preview__metric strong {
    font-size: 1.4rem;
    color: #0b1f3a;
}

.sgdea-preview__panel,
.sgdea-preview__trace {
    padding: 1.1rem;
    border-radius: 22px;
    background: #fff;
    border: 1px solid rgba(11, 31, 58, 0.08);
}

.sgdea-preview__panel-header {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 1rem;
    color: #5b6777;
}

.sgdea-preview__list {
    display: grid;
    gap: 0.85rem;
}

.sgdea-preview__row {
    display: grid;
    grid-template-columns: 120px 1fr auto;
    gap: 0.85rem;
    align-items: center;
    padding: 0.85rem 0.95rem;
    border-radius: 16px;
    background: linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
}

.sgdea-preview__row span {
    color: #34465c;
    font-size: 0.95rem;
}

.sgdea-preview__badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.4rem 0.7rem;
    border-radius: 999px;
    font-size: 0.76rem;
    font-weight: 700;
}

.sgdea-preview__badge--ok {
    background: rgba(22, 122, 74, 0.12);
    color: #167a4a;
}

.sgdea-preview__badge--pending {
    background: rgba(200, 135, 25, 0.12);
    color: #9d6711;
}

.sgdea-preview__badge--trace {
    background: rgba(18, 74, 138, 0.12);
    color: #124a8a;
}

.sgdea-preview__trace {
    display: grid;
    gap: 0.9rem;
}

.sgdea-preview__trace > strong {
    color: #0b1f3a;
}

.sgdea-preview__trace div {
    display: grid;
    grid-template-columns: 58px 1fr;
    gap: 0.8rem;
    align-items: start;
}

.sgdea-preview__trace span {
    font-size: 0.85rem;
    font-weight: 700;
    color: #124a8a;
}

.sgdea-preview__trace p {
    margin: 0;
    color: #5d6b81;
    line-height: 1.65;
}

.sgdea-use-card {
    height: 100%;
    padding: 1.9rem;
    background: #fff;
    border: 1px solid rgba(11, 31, 58, 0.08);
    box-shadow: 0 18px 45px rgba(6, 30, 64, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.sgdea-use-card:hover,
.sgdea-ideal-panel__item:hover {
    transform: translateY(-6px);
}

.sgdea-use-card__icon {
    width: 64px;
    height: 64px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
    margin-bottom: 1.2rem;
    background: linear-gradient(135deg, #0b1f3a, #1e9fb3);
    color: #fff;
    font-size: 1.45rem;
}

.sgdea-use-card__title {
    margin-bottom: 0.75rem;
    font-size: 1.3rem;
    font-weight: 700;
}

.sgdea-use-card__text {
    color: #5d6b81;
    line-height: 1.72;
}

.sgdea-ideal-panel {
    padding: 2rem;
    background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
    border: 1px solid rgba(11, 31, 58, 0.08);
    box-shadow: 0 18px 45px rgba(6, 30, 64, 0.08);
}

.sgdea-ideal-panel__item {
    display: flex;
    align-items: flex-start;
    gap: 0.9rem;
    padding: 1rem 0;
    transition: transform 0.3s ease;
}

.sgdea-ideal-panel__item + .sgdea-ideal-panel__item {
    border-top: 1px solid rgba(11, 31, 58, 0.08);
}

.sgdea-ideal-panel__item i {
    color: #124a8a;
    margin-top: 0.2rem;
}

.sgdea-ideal-panel__item span {
    color: #5d6b81;
    line-height: 1.72;
}

.sgdea-cta {
    background: linear-gradient(135deg, #0b1f3a 0%, #124a8a 50%, #1e9fb3 100%);
}

.sgdea-cta__text {
    max-width: 780px;
    margin-inline: auto;
}

@media (max-width: 991.98px) {
    .sgdea-preview__body {
        grid-template-columns: 1fr;
    }

    .sgdea-preview__sidebar {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        border-right: 0;
        border-bottom: 1px solid rgba(11, 31, 58, 0.08);
    }
}

@media (max-width: 767.98px) {
    .sgdea-side-card,
    .sgdea-use-card,
    .sgdea-ideal-panel,
    .sgdea-preview__content {
        padding: 1.5rem;
    }

    .sgdea-preview__topbar {
        grid-template-columns: 1fr;
        justify-items: start;
    }

    .sgdea-preview__metrics {
        grid-template-columns: 1fr;
    }

    .sgdea-preview__sidebar {
        grid-template-columns: 1fr;
    }

    .sgdea-preview__row,
    .sgdea-preview__trace div {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection
