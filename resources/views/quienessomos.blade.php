@extends('layouts.app')

@section('content')

@include('partials.page-hero', [
    'class' => 'page-hero--about',
    'image' => 'images/quienes-somos/imagen-gemeni1.png',
    'badge' => [
        'icon' => 'bi bi-stars',
        'text' => 'Quiénes somos',
    ],
    'title' => 'Conoce al equipo que puede <span class="text-warning">impulsar la imagen y la operación de tu negocio</span>',
    'description' => 'Detrás de cada proyecto hay una visión clara: ayudarte a comunicar mejor, trabajar con más orden y construir una presencia digital que genere confianza.',
    'actions' => [
        [
            'href' => '#historia-empresa',
            'label' => 'Conocer más',
            'icon' => 'bi bi-arrow-down-circle',
            'class' => 'btn btn-warning btn-lg px-5 fw-bold shadow-lg',
        ],
        [
            'href' => route('contacto'),
            'label' => 'Hablar con nosotros',
            'icon' => 'bi bi-people',
            'class' => 'btn btn-outline-light btn-lg px-5 fw-semibold',
        ],
    ],
    'highlights' => [
        ['value' => '1', 'label' => 'Visión clara'],
        ['value' => '3', 'label' => 'Pilares de confianza'],
        ['value' => '100%', 'label' => 'Enfoque personalizado'],
    ],
])

@php
    $bloques = [
        [
            'title' => 'Misión',
            'text' => 'Ayudar a empresas y emprendedores a crecer con soluciones digitales que mejoran su imagen, fortalecen su operación y generan más confianza ante sus clientes.',
            'icon' => 'bi bi-bullseye',
            'accent' => 'brand',
        ],
        [
            'title' => 'Visión',
            'text' => 'Ser una marca reconocida por convertir necesidades tecnológicas en proyectos bien pensados, bien ejecutados y alineados con el crecimiento de cada negocio.',
            'icon' => 'bi bi-eye',
            'accent' => 'aqua',
        ],
        [
            'title' => 'Historia',
            'text' => 'Crear System nace de la convicción de que la tecnología bien aplicada puede ordenar procesos, fortalecer marcas y abrir nuevas oportunidades comerciales.',
            'icon' => 'bi bi-clock-history',
            'accent' => 'sunset',
        ],
    ];

    $equipo = [
        [
            'nombre' => 'Geovanni Pérez',
            'perfil' => 'Fundador y desarrollador de software',
            'foto' => 'images/equipo/geovanni.png',
            'cv' => 'hoja-vida/Acta_Implementacion_SEO_CrearSystem.pdf',
        ],
    ];
@endphp

<section id="historia-empresa" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">Nuestra base</span>
            <h2 class="section-heading__title">La confianza empieza cuando sabes quién está detrás de tu proyecto</h2>
            <p class="section-heading__text">Aquí encuentras la visión, el criterio y el compromiso que respaldan cada solución que desarrollamos para nuestros clientes.</p>
        </div>

        <div class="row g-4">
            @foreach($bloques as $bloque)
                <div class="col-lg-4">
                    <article class="premium-card premium-card--story h-100">
                        <div class="premium-card__icon premium-card__icon--{{ $bloque['accent'] }}">
                            <i class="{{ $bloque['icon'] }}"></i>
                        </div>
                        <h3 class="premium-card__title">{{ $bloque['title'] }}</h3>
                        <p class="premium-card__text">{{ $bloque['text'] }}</p>
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
                <div class="image-panel">
                    <img src="{{ asset('images/quienes-somos/quienes-somos1.png') }}" alt="Equipo de Crear System" class="img-fluid">
                    <div class="image-panel__badge image-panel__badge--compact">
                        <strong>Crear System</strong>
                        <span>Una propuesta tecnológica con criterio, cercanía y enfoque práctico para empresas que quieren crecer con más orden.</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="content-panel">
                    <span class="section-heading__eyebrow">Por qué confiar</span>
                    <h2 class="section-heading__title text-start mb-3">Tu proyecto merece un equipo que entienda negocio, diseño y tecnología</h2>
                    <p class="section-heading__text text-start mb-4">No trabajamos solo para entregar una página o un sistema. Trabajamos para que tu negocio proyecte seriedad, funcione mejor y conecte con más claridad con sus clientes.</p>

                    <div class="stack-list">
                        <div class="stack-list__item">
                            <div class="stack-list__icon premium-card__icon premium-card__icon--brand">
                                <i class="bi bi-layout-text-window"></i>
                            </div>
                            <div>
                                <h3>Comunicación que convence</h3>
                                <p>Convertimos ideas complejas en soluciones claras, profesionales y fáciles de entender para tu cliente.</p>
                            </div>
                        </div>
                        <div class="stack-list__item">
                            <div class="stack-list__icon premium-card__icon premium-card__icon--aqua">
                                <i class="bi bi-diagram-3"></i>
                            </div>
                            <div>
                                <h3>Estructura bien pensada</h3>
                                <p>Construimos con criterio técnico para que cada proyecto sea limpio, funcional y sostenible en el tiempo.</p>
                            </div>
                        </div>
                        <div class="stack-list__item">
                            <div class="stack-list__icon premium-card__icon premium-card__icon--sunset">
                                <i class="bi bi-award"></i>
                            </div>
                            <div>
                                <h3>Compromiso real</h3>
                                <p>Nos importa que el resultado represente bien a tu negocio y te ayude a crecer con más confianza.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-surface py-5">
    <div class="container py-lg-4 text-center">
        <div class="section-heading">
            <span class="section-heading__eyebrow">Presentación personal</span>
            <h2 class="section-heading__title">Conoce a la persona que puede acompañar tu proyecto de principio a fin</h2>
            <p class="section-heading__text">Aquí no solo ves un perfil profesional. Conoces la experiencia, la preparación y la disciplina que respaldan cada solución que entregamos.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($equipo as $miembro)
                <div class="col-md-6 col-xl-4">
                    <article class="team-card h-100">
                        <img src="{{ asset($miembro['foto']) }}" class="team-card__avatar" alt="{{ $miembro['nombre'] }}">
                        <h3>{{ $miembro['nombre'] }}</h3>
                        <p>{{ $miembro['perfil'] }}</p>

                        <div class="d-flex flex-column gap-2">
                            <button class="btn btn-warning fw-bold ver-cv" data-cv="{{ $miembro['cv'] }}">Ver perfil profesional</button>
                            <button class="btn btn-outline-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#modalHistoria">Conocer mi historia</button>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="modal fade modal-elegante profile-modal" id="modalCV" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="modal-header profile-modal__header border-0 position-relative p-4 bg-gradient-primary text-white">
                <div class="w-100 text-center pt-5">
                    <img src="{{ asset('images/equipo/geovanni.png') }}" class="foto-modal shadow-lg" alt="Geovanni Pérez">
                    <h3 class="fw-bold mt-4">Geovanni Pérez</h3>
                    <p class="mb-0 opacity-75">Fundador y desarrollador de software</p>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body profile-modal__body p-5">
                <h4 class="titulo-seccion">Perfil profesional</h4>
                <p class="texto-seccion">
                    Acompaño a empresas y emprendedores en la construcción de soluciones digitales que no solo funcionan, sino que también transmiten orden, confianza y profesionalismo.
                    Mi enfoque combina desarrollo, criterio visual y comprensión del negocio para convertir necesidades reales en proyectos útiles y bien ejecutados.
                </p>

                <h4 class="titulo-seccion mt-4">Fortalezas que aportan valor al cliente</h4>
                <ul class="list-group list-group-flush tarjeta-lista mb-4">
                    <li class="list-group-item">Desarrollo web moderno, responsivo y optimizado para una mejor presentación digital</li>
                    <li class="list-group-item">Mantenimiento de software y soporte para dar continuidad y estabilidad</li>
                    <li class="list-group-item">Consultoría enfocada en ordenar procesos y tomar mejores decisiones tecnológicas</li>
                    <li class="list-group-item">Integraciones API para conectar herramientas y mejorar la operación</li>
                    <li class="list-group-item">Automatización de procesos para ahorrar tiempo y reducir fricción operativa</li>
                </ul>

                <h4 class="titulo-seccion mb-3">Formación que respalda el trabajo</h4>

                <div class="accordion accordion-flush acordeon-elegante" id="acordeonFormacion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed acordeon-titulo" type="button" data-bs-toggle="collapse" data-bs-target="#formacion1">
                                Ingeniería de Sistemas - UNAD
                            </button>
                        </h2>
                        <div id="formacion1" class="accordion-collapse collapse" data-bs-parent="#acordeonFormacion">
                            <div class="accordion-body">
                                Formación en programación, arquitectura de software, análisis de información y desarrollo de soluciones aplicadas a contextos reales.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed acordeon-titulo" type="button" data-bs-toggle="collapse" data-bs-target="#formacion2">
                                Diplomado en Gerencia de Proyectos - Universidad del Rosario
                            </button>
                        </h2>
                        <div id="formacion2" class="accordion-collapse collapse" data-bs-parent="#acordeonFormacion">
                            <div class="accordion-body">
                                Preparación en planeación estratégica, gestión de riesgos, cronogramas y liderazgo orientado al cumplimiento de objetivos.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed acordeon-titulo" type="button" data-bs-toggle="collapse" data-bs-target="#formacion3">
                                Diplomado en Seguridad de la Información y Ciberseguridad - Universidad del Rosario
                            </button>
                        </h2>
                        <div id="formacion3" class="accordion-collapse collapse" data-bs-parent="#acordeonFormacion">
                            <div class="accordion-body">
                                Formación en seguridad, gestión de riesgos y protección de la información para construir soluciones más confiables.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed acordeon-titulo" type="button" data-bs-toggle="collapse" data-bs-target="#formacion4">
                                Diplomado en PHP y Java - Politécnico Colombiano
                            </button>
                        </h2>
                        <div id="formacion4" class="accordion-collapse collapse" data-bs-parent="#acordeonFormacion">
                            <div class="accordion-body">
                                Formación técnica en backend, programación orientada a objetos, estructuras de datos y desarrollo web.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed acordeon-titulo" type="button" data-bs-toggle="collapse" data-bs-target="#formacion5">
                                Programas de emprendimiento e innovación - UNAD
                            </button>
                        </h2>
                        <div id="formacion5" class="accordion-collapse collapse" data-bs-parent="#acordeonFormacion">
                            <div class="accordion-body">
                                Participación en procesos de innovación, aceleración y construcción de propuestas de valor con enfoque empresarial.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-elegante profile-modal" id="modalHistoria" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="modal-header profile-modal__header profile-modal__header--story border-0 position-relative p-4 bg-gradient-success text-white">
                <div class="w-100 text-center pt-5">
                    <img src="{{ asset('images/equipo/geovanni.png') }}" class="foto-modal shadow-lg" alt="Geovanni Pérez">
                    <h3 class="fw-bold mt-4">Geovanni Pérez</h3>
                    <p class="mb-0 opacity-75">Fundador y desarrollador de software</p>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body profile-modal__body profile-modal__body--story p-5">
                <h4 class="titulo-seccion">Una historia que respalda el compromiso con cada proyecto</h4>

                <p class="texto-seccion">
                    Mi camino comenzó en el Ejército Nacional de Colombia, una etapa que fortaleció valores esenciales para cualquier proyecto serio: disciplina, responsabilidad y compromiso.
                </p>

                <p class="texto-seccion">
                    Luego llegó la decisión de construir una carrera en tecnología, con formación técnica, estudios en ingeniería de sistemas y una dedicación constante al aprendizaje y la mejora.
                </p>

                <p class="texto-seccion">
                    Esa experiencia hoy se traduce en una manera de trabajar enfocada en cumplir, comunicar con claridad y entregar soluciones que realmente aporten valor al cliente.
                </p>

                <blockquote class="blockquote text-center mt-4 profile-modal__quote">
                    <p class="fst-italic text-danger fw-bold mb-0">Cada proyecto merece compromiso, criterio y una ejecución que esté a la altura de la confianza del cliente.</p>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.ver-cv').forEach(button => {
        button.addEventListener('click', function () {
            new bootstrap.Modal(document.getElementById('modalCV')).show();
        });
    });
</script>

@endsection
