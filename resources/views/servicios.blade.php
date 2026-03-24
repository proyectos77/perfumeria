@extends('layouts.app')

@section('content')

@include('partials.page-hero', [
    'class' => 'page-hero--services',
    'image' => 'images/servicio/servicio1.png',
    'badge' => [
        'icon' => 'bi bi-grid',
        'text' => 'Servicios digitales',
    ],
    'title' => 'Soluciones pensadas para <span class="text-warning">atraer clientes, ordenar procesos y hacer crecer tu negocio</span>',
    'description' => 'Cada servicio está diseñado para ayudarte a proyectar una imagen más profesional, comunicar mejor tu valor y avanzar con una operación más clara y eficiente.',
    'actions' => [
        [
            'href' => '#servicios',
            'label' => 'Explorar servicios',
            'icon' => 'bi bi-arrow-down-circle',
            'class' => 'btn btn-warning btn-lg px-5 fw-bold shadow-lg',
        ],
        [
            'href' => route('contacto'),
            'label' => 'Solicitar propuesta',
            'icon' => 'bi bi-chat-dots',
            'class' => 'btn btn-outline-light btn-lg px-5 fw-semibold',
        ],
    ],
    'highlights' => [
        ['value' => '6', 'label' => 'Líneas de servicio'],
        ['value' => '5+', 'label' => 'Años de experiencia'],
        ['value' => '360', 'label' => 'Acompañamiento continuo'],
    ],
])

@php
    $servicios = [
        [
            'id' => 'desarrollo-web',
            'icon' => 'bi bi-code-slash',
            'title' => 'Desarrollo web',
            'text' => 'Creamos sitios web y plataformas que transmiten confianza, explican mejor tu propuesta y convierten visitas en oportunidades reales.',
            'items' => ['Diseño responsivo', 'SEO técnico', 'Velocidad y experiencia de usuario'],
            'accent' => 'brand',
        ],
        [
            'id' => 'mantenimiento-software',
            'icon' => 'bi bi-gear',
            'title' => 'Mantenimiento de software',
            'text' => 'Mantenemos tus plataformas actualizadas, seguras y estables para que tu operación siga avanzando sin fricciones ni interrupciones innecesarias.',
            'items' => ['Actualizaciones críticas', 'Monitoreo y soporte', 'Corrección de incidencias'],
            'accent' => 'sunset',
        ],
        [
            'id' => 'consultoria-ti',
            'icon' => 'bi bi-people',
            'title' => 'Consultoría TI',
            'text' => 'Te ayudamos a tomar mejores decisiones tecnológicas para invertir con criterio, ordenar procesos y avanzar con una ruta más clara.',
            'items' => ['Diagnóstico de procesos', 'Ruta tecnológica', 'Priorización de iniciativas'],
            'accent' => 'aqua',
        ],
        [
            'id' => 'software-medida',
            'icon' => 'bi bi-file-code',
            'title' => 'Software a medida',
            'text' => 'Desarrollamos soluciones personalizadas para negocios que necesitan más control, más trazabilidad y una operación mejor organizada.',
            'items' => ['Modelado del negocio', 'Escalabilidad', 'Integración con tus procesos'],
            'accent' => 'violet',
        ],
        [
            'id' => 'integraciones-api',
            'icon' => 'bi bi-plug',
            'title' => 'Integraciones API',
            'text' => 'Conectamos tus sistemas, herramientas y plataformas para que tu negocio trabaje con más fluidez y menos reprocesos.',
            'items' => ['Pagos y facturación', 'Sincronización de datos', 'Conectividad entre sistemas'],
            'accent' => 'rose',
        ],
        [
            'id' => 'automatizacion-procesos',
            'icon' => 'bi bi-robot',
            'title' => 'Automatización de procesos',
            'text' => 'Automatizamos tareas repetitivas para que tu equipo ahorre tiempo, reduzca errores y se concentre en lo que realmente genera valor.',
            'items' => ['Bots y scripts', 'Procesos recurrentes', 'Reportes automáticos'],
            'accent' => 'slate',
        ],
    ];
@endphp

<section id="servicios" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">Qué podemos hacer por ti</span>
            <h2 class="section-heading__title">Servicios creados para resolver necesidades reales de negocio</h2>
            <p class="section-heading__text">Aquí no solo encuentras desarrollo. Encuentras soluciones que te ayudan a presentar mejor tu marca, mejorar la experiencia del cliente y trabajar con más orden.</p>
        </div>

        <div class="row g-4">
            @foreach($servicios as $servicio)
                <div class="col-lg-4 col-md-6" id="{{ $servicio['id'] }}">
                    <article class="premium-card premium-card--service h-100">
                        <div class="premium-card__icon premium-card__icon--{{ $servicio['accent'] }}">
                            <i class="{{ $servicio['icon'] }}"></i>
                        </div>
                        <h3 class="premium-card__title">{{ $servicio['title'] }}</h3>
                        <p class="premium-card__text">{{ $servicio['text'] }}</p>

                        <ul class="premium-list">
                            @foreach($servicio['items'] as $item)
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-lg-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="content-panel">
                    <span class="section-heading__eyebrow">Por qué elegirnos</span>
                    <h2 class="section-heading__title text-start mb-3">Más que desarrollo: una solución que también respalda tu imagen y tu crecimiento</h2>
                    <p class="section-heading__text text-start mb-4">Nuestro trabajo no termina en entregar una herramienta. Buscamos que tu negocio se vea mejor, transmita más confianza y funcione con mayor claridad ante tus clientes y tu equipo.</p>

                    <div class="stack-list">
                        <div class="stack-list__item">
                            <div class="stack-list__icon premium-card__icon premium-card__icon--brand">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div>
                                <h3>Base confiable</h3>
                                <p>Construimos soluciones pensadas para durar, escalar y sostener una presencia profesional en el tiempo.</p>
                            </div>
                        </div>
                        <div class="stack-list__item">
                            <div class="stack-list__icon premium-card__icon premium-card__icon--sunset">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                            <div>
                                <h3>Ejecución enfocada</h3>
                                <p>Priorizamos claridad, utilidad y decisiones que aportan valor real al negocio, no solo a la parte técnica.</p>
                            </div>
                        </div>
                        <div class="stack-list__item">
                            <div class="stack-list__icon premium-card__icon premium-card__icon--aqua">
                                <i class="bi bi-headset"></i>
                            </div>
                            <div>
                                <h3>Acompañamiento real</h3>
                                <p>Te acompañamos antes, durante y después para que la solución siga siendo útil y te ayude a crecer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="image-panel">
                    <img src="{{ asset('images/home/imagen-home2.png') }}" alt="Servicios profesionales de Crear System" class="img-fluid">
                    <div class="image-panel__badge">
                        <strong>Una buena solución también debe inspirar confianza</strong>
                        <span>Cuando tu servicio se presenta con claridad y respaldo profesional, es más fácil abrir conversaciones comerciales y avanzar hacia la decisión.</span>
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
                        <textarea name="comentario" class="form-control form-control-soft" rows="4" placeholder="Cuéntanos cómo fue tu experiencia trabajando con nosotros." required></textarea>
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
