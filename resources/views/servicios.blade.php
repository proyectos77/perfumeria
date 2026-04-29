@extends('layouts.app')

@section('content')

@php
    $serviceGroups = [
        [
            'id' => 'direccion-control',
            'eyebrow' => 'Dirección y control',
            'title' => 'Servicios para ordenar decisiones, alcance y seguimiento',
            'text' => 'Pensados para empresas que necesitan avanzar con una gestión más clara, mejor visibilidad y menor riesgo en sus iniciativas tecnológicas.',
            'accent' => 'brand',
            'services' => [
                [
                    'id' => 'gestion-proyectos-tecnologicos',
                    'icon' => 'bi bi-kanban',
                    'title' => 'Gestión de proyectos tecnológicos',
                    'problem' => 'Cuando un proyecto no tiene seguimiento claro, se desordena el alcance, se diluyen responsabilidades y aumentan los retrasos.',
                    'approach' => 'Organizamos el proyecto con prioridades, hitos, seguimiento y comunicación orientada a decisión, manteniendo alineados negocio y ejecución.',
                    'benefit' => 'El cliente gana más control, mejor visibilidad del avance y una ruta de trabajo más confiable.',
                ],
                [
                    'id' => 'acompanamiento-soporte',
                    'icon' => 'bi bi-headset',
                    'title' => 'Acompañamiento y soporte',
                    'problem' => 'Muchas soluciones pierden valor después de la entrega porque no existe continuidad, seguimiento ni una referencia clara para resolver ajustes.',
                    'approach' => 'Damos acompañamiento posterior, atención a hallazgos, apoyo en decisiones y seguimiento a mejoras necesarias para sostener la operación.',
                    'benefit' => 'El cliente no queda solo frente a la herramienta y puede mantener continuidad con más tranquilidad.',
                ],
            ],
        ],
        [
            'id' => 'optimizacion-operativa',
            'eyebrow' => 'Optimización operativa',
            'title' => 'Servicios orientados a mejorar trabajo interno y productividad',
            'text' => 'Para empresas que necesitan reducir tareas manuales, conectar mejor sus procesos y trabajar con más estructura.',
            'accent' => 'sunset',
            'services' => [
                [
                    'id' => 'soluciones-digitales-automatizacion',
                    'icon' => 'bi bi-cpu',
                    'title' => 'Soluciones digitales y automatización',
                    'problem' => 'Los procesos manuales, tareas repetitivas y herramientas desconectadas consumen tiempo y dificultan el crecimiento ordenado.',
                    'approach' => 'Diseñamos soluciones a medida e integraciones que ayudan a simplificar tareas, conectar flujos y reducir fricción operativa.',
                    'benefit' => 'El cliente obtiene una operación más ágil, menos reproceso y mejor aprovechamiento del tiempo del equipo.',
                ],
                [
                    'id' => 'gestion-documental',
                    'icon' => 'bi bi-folder2-open',
                    'title' => 'Gestión documental',
                    'problem' => 'Cuando los documentos están dispersos o sin criterio de organización, se pierde tiempo, trazabilidad y confianza en la información.',
                    'approach' => 'Ayudamos a estructurar la información documental, definir lógica de consulta, seguimiento y control según la realidad del negocio.',
                    'benefit' => 'El cliente mejora acceso, orden y capacidad de gestión sobre su documentación crítica.',
                ],
            ],
        ],
        [
            'id' => 'implementacion-especializada',
            'eyebrow' => 'Implementacion especializada',
            'title' => 'Una solución concreta para necesidades documentales más estructuradas',
            'text' => 'Cuando la empresa necesita una base real para trabajar gestión documental con mayor formalidad, control y continuidad.',
            'accent' => 'aqua',
            'services' => [
                [
                    'id' => 'implementacion-sgdea-crear-system',
                    'icon' => 'bi bi-shield-check',
                    'title' => 'Implementación del SGDEA Crear System',
                    'problem' => 'Algunas organizaciones necesitan una solución documental más definida y no solo recomendaciones generales o herramientas dispersas.',
                    'approach' => 'Implementamos nuestro SGDEA como producto propio, adaptando su uso al contexto del cliente y acompañando la puesta en marcha con criterio práctico.',
                    'benefit' => 'El cliente accede a una base real de gestión documental con mayor respaldo, trazabilidad y experiencia aplicada.',
                ],
            ],
        ],
    ];

    $workStages = [
        [
            'step' => '01',
            'title' => 'Diagnóstico inicial',
            'text' => 'Revisamos la necesidad, el contexto del negocio y los puntos críticos para entender qué conviene resolver primero.',
        ],
        [
            'step' => '02',
            'title' => 'Definición de ruta',
            'text' => 'Aterrizamos objetivos, alcance, prioridades y forma de trabajo para que el proyecto empiece con expectativas claras.',
        ],
        [
            'step' => '03',
            'title' => 'Ejecución organizada',
            'text' => 'Desarrollamos y coordinamos el trabajo por etapas, manteniendo foco en utilidad real, orden y avance visible.',
        ],
        [
            'step' => '04',
            'title' => 'Seguimiento y ajustes',
            'text' => 'Acompañamos la implementación, resolvemos hallazgos y ajustamos decisiones cuando el proyecto lo necesita.',
        ],
        [
            'step' => '05',
            'title' => 'Cierre y mejora continua',
            'text' => 'Entregamos con claridad y dejamos una base para evolucionar la solución sin perder control ni continuidad.',
        ],
    ];
@endphp

@include('partials.page-hero', [
    'class' => 'page-hero--services',
    'image' => $siteSettings->services_hero_image_path,
    'badge' => [
        'icon' => 'bi bi-briefcase',
        'text' => 'Servicios',
    ],
    'title' => 'Servicios organizados por valor, no por una lista interminable.',
    'description' => 'Crear System acompaña empresas que necesitan dirección para sus proyectos tecnológicos, mejoras operativas y una gestión documental mejor estructurada. Nuestra oferta se concentra en servicios concretos, con enfoque de negocio y acompañamiento real.',
    'actions' => [
        [
            'href' => '#servicios',
            'label' => 'Explorar servicios',
            'icon' => 'bi bi-arrow-down-circle',
            'class' => 'btn btn-warning btn-lg px-5 fw-bold shadow-lg',
        ],
        [
            'href' => route('contacto'),
            'label' => 'Solicitar conversación',
            'icon' => 'bi bi-chat-dots',
            'class' => 'btn btn-outline-light btn-lg px-5 fw-semibold',
        ],
    ],
    'highlights' => [
        ['value' => '5', 'label' => 'Servicios clave'],
        ['value' => 'PM', 'label' => 'Enfoque de gestión'],
        ['value' => 'SGDEA', 'label' => 'Producto propio implementable'],
    ],
])

<section id="servicios" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">Qué hacemos</span>
            <h2 class="section-heading__title">Servicios agrupados por tipo de valor para evitar dispersión y dar más claridad</h2>
            <p class="section-heading__text">No buscamos transmitir que hacemos de todo. Preferimos mostrar con precisión dónde podemos aportar: dirección de proyectos, optimización operativa, gestión documental e implementación de una solución propia cuando el contexto lo requiere.</p>
        </div>

        <div class="d-flex flex-column gap-5 mt-5">
            @foreach($serviceGroups as $group)
                <section id="{{ $group['id'] }}" class="service-group">
                    <div class="service-group__header">
                        <span class="service-group__eyebrow service-group__eyebrow--{{ $group['accent'] }}">{{ $group['eyebrow'] }}</span>
                        <h3 class="service-group__title">{{ $group['title'] }}</h3>
                        <p class="service-group__text mb-0">{{ $group['text'] }}</p>
                    </div>

                    <div class="row g-4 mt-1">
                        @foreach($group['services'] as $service)
                            <div class="col-lg-6" id="{{ $service['id'] }}">
                                <article class="service-solution-card h-100">
                                    <div class="service-solution-card__icon service-solution-card__icon--{{ $group['accent'] }}">
                                        <i class="{{ $service['icon'] }}"></i>
                                    </div>
                                    <h4 class="service-solution-card__title">{{ $service['title'] }}</h4>

                                    <div class="service-solution-card__block">
                                        <span class="service-solution-card__label">Qué problema resuelve</span>
                                        <p class="mb-0">{{ $service['problem'] }}</p>
                                    </div>

                                    <div class="service-solution-card__block">
                                        <span class="service-solution-card__label">Cómo se aborda</span>
                                        <p class="mb-0">{{ $service['approach'] }}</p>
                                    </div>

                                    <div class="service-solution-card__block">
                                        <span class="service-solution-card__label">Beneficio para el cliente</span>
                                        <p class="mb-0">{{ $service['benefit'] }}</p>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" id="como-trabajamos">
    <div class="container py-lg-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <div class="content-panel">
                    <span class="section-heading__eyebrow">Cómo trabajamos</span>
                    <h2 class="section-heading__title text-start mb-3">Un proceso claro para reducir incertidumbre y avanzar con mejor control</h2>
                    <p class="section-heading__text text-start mb-4">En Crear System trabajamos con mentalidad de gestión de proyectos. Eso significa que no solo ejecutamos tareas: ayudamos a ordenar el camino, dar visibilidad al avance y tomar decisiones con más criterio desde el inicio.</p>

                    <div class="stack-list">
                        <div class="stack-list__item">
                            <div class="stack-list__icon premium-card__icon premium-card__icon--brand">
                                <i class="bi bi-kanban"></i>
                            </div>
                            <div>
                                <h3>Gestión visible</h3>
                                <p>Cada etapa busca que el cliente entienda qué se está haciendo, por qué se está haciendo y qué sigue después.</p>
                            </div>
                        </div>
                        <div class="stack-list__item">
                            <div class="stack-list__icon premium-card__icon premium-card__icon--sunset">
                                <i class="bi bi-people"></i>
                            </div>
                            <div>
                                <h3>Acompañamiento cercano</h3>
                                <p>No dejamos al cliente solo frente al proyecto. Acompañamos decisiones, ajustes y momentos clave durante la ejecución.</p>
                            </div>
                        </div>
                        <div class="stack-list__item">
                            <div class="stack-list__icon premium-card__icon premium-card__icon--aqua">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <div>
                                <h3>Mejora continua</h3>
                                <p>Buscamos que cada entrega deje una base más ordenada para sostener, mejorar y escalar la solución con el tiempo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="work-process-panel">
                    <div class="work-process-panel__header">
                        <span class="work-process-panel__eyebrow">Proceso de 5 etapas</span>
                        <h3>Un método pensado para dar claridad desde el primer paso hasta la mejora posterior.</h3>
                    </div>

                    <div class="row g-4">
                        @foreach($workStages as $stage)
                            <div class="col-md-6 {{ $loop->last ? 'col-lg-12' : '' }}">
                                <article class="work-stage h-100">
                                    <div class="work-stage__step">{{ $stage['step'] }}</div>
                                    <div>
                                        <h4 class="work-stage__title">{{ $stage['title'] }}</h4>
                                        <p class="work-stage__text mb-0">{{ $stage['text'] }}</p>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <div class="work-process-panel__closing">
                        <strong>Cierre</strong>
                        <p class="mb-0">Este proceso busca que el proyecto avance con menos improvisación, mejor comunicación y una sensación real de acompañamiento. Para el cliente, eso significa menos riesgo y más claridad para tomar decisiones.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="testimonio-form" class="section-surface section-surface--brand py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center section-heading--light">
            <span class="section-heading__eyebrow">Confianza</span>
            <h2 class="section-heading__title">La experiencia de nuestros clientes también habla por nuestro trabajo</h2>
            <p class="section-heading__text">Los testimonios ayudan a futuros clientes a entender cómo trabajamos, qué nivel de acompañamiento ofrecemos y qué resultados pueden esperar.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center mb-4">{{ session('success') }}</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-xl-9">
                <form method="POST" action="{{ route('testimonios.store') }}" class="glass-panel row g-4">
                    @csrf

                    <div class="col-md-6">
                        <label for="nombre" class="form-label form-label--light">Tu nombre</label>
                        <input type="text" name="nombre" class="form-control form-control-lg form-control-soft" placeholder="Ej: Juan Pérez" required>
                    </div>

                    <div class="col-md-6">
                        <label for="empresa" class="form-label form-label--light">Empresa</label>
                        <input type="text" name="empresa" class="form-control form-control-lg form-control-soft" placeholder="Ej: SoftTech SAS" required>
                    </div>

                    <div class="col-md-12">
                        <label for="cargo" class="form-label form-label--light">Cargo</label>
                        <input type="text" name="cargo" class="form-control form-control-lg form-control-soft" placeholder="Ej: Gerente de tecnología" required>
                    </div>

                    <div class="col-md-12">
                        <label for="comentario" class="form-label form-label--light">Comentario</label>
                        <textarea name="comentario" class="form-control form-control-soft" rows="4" placeholder="Cuentanos como fue tu experiencia trabajando con nosotros." required></textarea>
                    </div>

                    <div class="col-md-12">
                            <label class="form-label form-label--light d-block text-center">Calificación</label>
                        <div class="rating-stars d-flex justify-content-center gap-2">
                            @for($i = 1; $i <= 5; $i++)
                                <input type="radio" name="calificacion" value="{{ $i }}" id="star{{ $i }}" required hidden>
                                <label for="star{{ $i }}" class="fs-2 star-label">
                                    <i class="bi bi-star-fill"></i>
                                </label>
                            @endfor
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-warning btn-lg px-5 fw-bold shadow-lg">
                            <i class="bi bi-send me-2"></i>Enviar testimonio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-lg-4 text-center">
        <div class="cta-strip">
            <span class="section-heading__eyebrow">Siguiente paso</span>
            <h2 class="section-heading__title mb-3">Si buscas una solución seria, clara y bien ejecutada, este es un buen momento para empezar</h2>
            <p class="section-heading__text mb-4">Podemos ayudarte a construir una web profesional, una solución a medida o una mejora tecnológica que le dé más fuerza y más orden a tu negocio.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold shadow-lg">
                    <i class="bi bi-chat-dots me-2"></i>Conversemos
                </a>
                <a href="{{ route('home') }}" class="btn btn-outline-light btn-lg px-5 fw-semibold">
                    <i class="bi bi-house me-2"></i>Volver al inicio
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
