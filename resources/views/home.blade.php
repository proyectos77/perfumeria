@extends('layouts.app')

@section('content')

@php
    $heroSlides = [
        ['image' => 'images/home/imagen-home1.png', 'label' => 'Presencia digital'],
        ['image' => 'images/home/imagen-home2.png', 'label' => 'Soluciones comerciales'],
        ['image' => 'images/home/imagen-home3.png', 'label' => 'Plataformas a medida'],
        ['image' => 'images/quienes-somos/imagen-gemeni1.png', 'label' => 'Acompanamiento profesional'],
    ];
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('a[href^="#"]').forEach(function (ancla) {
            ancla.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));

                if (!target) {
                    return;
                }

                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        const slides = Array.from(document.querySelectorAll('[data-hero-slide]'));
        const indicators = Array.from(document.querySelectorAll('[data-hero-indicator]'));
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (!slides.length) {
            return;
        }

        let currentSlide = 0;
        let sliderTimer = null;

        const setActiveSlide = function (nextIndex) {
            currentSlide = nextIndex;

            slides.forEach(function (slide, index) {
                slide.classList.toggle('is-active', index === nextIndex);
            });

            indicators.forEach(function (indicator, index) {
                const isActive = index === nextIndex;
                indicator.classList.toggle('is-active', isActive);
                indicator.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });
        };

        const startSlider = function () {
            if (prefersReducedMotion || slides.length < 2) {
                return;
            }

            sliderTimer = window.setInterval(function () {
                setActiveSlide((currentSlide + 1) % slides.length);
            }, 6500);
        };

        const restartSlider = function () {
            if (sliderTimer) {
                window.clearInterval(sliderTimer);
            }

            startSlider();
        };

        indicators.forEach(function (indicator) {
            indicator.addEventListener('click', function () {
                setActiveSlide(Number(this.dataset.slideIndex));
                restartSlider();
            });
        });

        setActiveSlide(0);
        startSlider();
    });
</script>

<header class="hero-section position-relative overflow-hidden" style="height: 100vh; min-height: 600px;">
    <div class="hero-cinematic" aria-hidden="true">
        @foreach($heroSlides as $slide)
            <div
                class="hero-cinematic__slide {{ $loop->first ? 'is-active' : '' }}"
                data-hero-slide
                style="background-image: url('{{ asset($slide['image']) }}');"
            ></div>
        @endforeach
        <div class="hero-cinematic__overlay"></div>
        <div class="hero-cinematic__grain"></div>
        <div class="hero-cinematic__glow hero-cinematic__glow--top"></div>
        <div class="hero-cinematic__glow hero-cinematic__glow--bottom"></div>
    </div>

    <div class="position-absolute w-100 h-100 overflow-hidden" style="z-index: 1;">
        <div class="position-absolute rounded-circle" style="width: 500px; height: 500px; background: radial-gradient(circle, rgba(245,124,0,0.15) 0%, transparent 70%); top: -100px; right: -100px;"></div>
        <div class="position-absolute rounded-circle" style="width: 300px; height: 300px; background: radial-gradient(circle, rgba(38,198,218,0.2) 0%, transparent 70%); bottom: 10%; left: 5%;"></div>
    </div>

    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center position-relative" style="z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="badge bg-warning text-dark px-4 py-2 mb-4 fw-semibold animate__animated animate__fadeInDown">
                    <i class="bi bi-stars me-2"></i>Tu aliado en crecimiento digital
                </div>

                <h1 class="display-2 display-lg-1 fw-bold text-white mb-4 animate__animated animate__fadeInUp" style="line-height: 1.2;">
                    Haz que tu negocio proyecte una
                    <span class="text-warning">imagen profesional y convincente</span>
                </h1>

                <p class="lead fs-4 text-white-50 mb-5 animate__animated animate__fadeInUp animate__delay-1s" style="max-width: 760px; margin: 0 auto;">
                    Desarrollamos páginas web, software a medida y automatizaciones para empresas que quieren atraer mejores clientes, vender con más claridad y trabajar con más orden.
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="{{ route('servicios') }}" class="btn btn-warning btn-lg px-5 fw-bold shadow-lg">
                        <i class="bi bi-rocket-takeoff me-2"></i>Ver servicios
                    </a>
                    <a href="{{ route('contacto') }}" class="btn btn-outline-light btn-lg px-5 fw-semibold">
                        <i class="bi bi-chat-dots me-2"></i>Solicitar asesoría
                    </a>
                </div>

                <div class="d-flex flex-wrap justify-content-center gap-4 gap-lg-5 mt-5 animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="stat-item">
                        <span class="display-5 fw-bold text-warning">5+</span>
                        <p class="text-white-50 mb-0 small">Años de experiencia</p>
                    </div>
                    <div class="stat-item">
                        <span class="display-5 fw-bold text-warning">50+</span>
                        <p class="text-white-50 mb-0 small">Proyectos entregados</p>
                    </div>
                    <div class="stat-item">
                        <span class="display-5 fw-bold text-warning">100%</span>
                        <p class="text-white-50 mb-0 small">Compromiso con cada cliente</p>
                    </div>
                </div>

                <div class="hero-cinematic__nav d-none d-md-flex justify-content-center flex-wrap gap-3 mt-5">
                    @foreach($heroSlides as $slide)
                        <button
                            type="button"
                            class="hero-cinematic__indicator {{ $loop->first ? 'is-active' : '' }}"
                            data-hero-indicator
                            data-slide-index="{{ $loop->index }}"
                            aria-label="Mostrar escena {{ $loop->iteration }}"
                            aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                        >
                            <span class="hero-cinematic__indicator-bar"></span>
                            <span class="hero-cinematic__indicator-label">{{ $slide['label'] }}</span>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="position-absolute bottom-0 start-0 w-100" style="z-index: 3;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" style="width: 100%; height: 100px;">
            <path fill="#ffffff" d="M0,64 C288,120 576,0 864,64 C1152,128 1440,32 1440,32 L1440,120 L0,120 Z"></path>
        </svg>
    </div>
</header>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-primary px-3 py-2 mb-3">
                    <i class="bi bi-grid me-1"></i> Lo que hacemos
                </span>
                <h2 class="display-4 fw-bold text-dark mb-3">
                    Servicios pensados para ayudarte a <span class="text-primary">vender mejor y operar con más claridad</span>
                </h2>
                <p class="lead text-muted">
                    Si tu negocio necesita verse más confiable, explicar mejor lo que ofrece y mejorar su operación, aquí encuentras soluciones diseñadas para eso.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3">
                            <i class="bi bi-code-slash fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Desarrollo web</h4>
                    <p class="text-muted mb-3">Creamos sitios web modernos, rápidos y orientados a comunicar mejor tu propuesta de valor.</p>
                    <a href="{{ route('servicios') }}#desarrollo-web" class="text-primary fw-semibold text-decoration-none">
                        Conocer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3" style="background: linear-gradient(135deg, #f57c00, #ff9800);">
                            <i class="bi bi-gear fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Mantenimiento y soporte</h4>
                    <p class="text-muted mb-3">Aseguramos continuidad, estabilidad y mejoras constantes para que tu sistema siga funcionando bien.</p>
                    <a href="{{ route('servicios') }}#mantenimiento-software" class="text-primary fw-semibold text-decoration-none">
                        Conocer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3" style="background: linear-gradient(135deg, #26c6da, #00bcd4);">
                            <i class="bi bi-people fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Consultoría TI</h4>
                    <p class="text-muted mb-3">Te acompañamos a tomar mejores decisiones tecnológicas para avanzar con más orden y claridad.</p>
                    <a href="{{ route('servicios') }}#consultoria-ti" class="text-primary fw-semibold text-decoration-none">
                        Conocer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3" style="background: linear-gradient(135deg, #7b1fa2, #9c27b0);">
                            <i class="bi bi-file-code fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Software a medida</h4>
                    <p class="text-muted mb-3">Desarrollamos herramientas personalizadas para negocios que necesitan procesos más claros y productivos.</p>
                    <a href="{{ route('servicios') }}#software-medida" class="text-primary fw-semibold text-decoration-none">
                        Conocer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3" style="background: linear-gradient(135deg, #e91e63, #f06292);">
                            <i class="bi bi-plug fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Integraciones API</h4>
                    <p class="text-muted mb-3">Conectamos plataformas y herramientas para que tu operación funcione de forma más ágil y centralizada.</p>
                    <a href="{{ route('servicios') }}#integraciones-api" class="text-primary fw-semibold text-decoration-none">
                        Conocer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3" style="background: linear-gradient(135deg, #455a64, #607d8b);">
                            <i class="bi bi-robot fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Automatización</h4>
                    <p class="text-muted mb-3">Automatizamos tareas repetitivas para que tu equipo ahorre tiempo y trabaje con más enfoque.</p>
                    <a href="{{ route('servicios') }}#automatizacion-procesos" class="text-primary fw-semibold text-decoration-none">
                        Conocer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('servicios') }}" class="btn btn-primary btn-lg px-5 fw-bold shadow">
                <i class="bi bi-collection me-2"></i>Ver todos los servicios
            </a>
        </div>
    </div>
</section>

<section class="py-5" style="background: linear-gradient(135deg, #001f4d 0%, #0d47a1 50%, #26c6da 100%);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                <i class="bi bi-images me-1"></i> Primera impresión
            </span>
            <h2 class="display-4 fw-bold text-white mb-3">Proyectos pensados para transmitir confianza desde el primer vistazo</h2>
            <p class="lead text-white-50">Una buena presencia digital no solo se ve bien: también ayuda a que tu cliente entienda, confíe y tome acción.</p>
        </div>

        <div class="position-relative overflow-hidden">
            <div class="d-flex align-items-center gap-4 py-3"
                 style="width: max-content; animation: scrollLeft 35s linear infinite;">

                @php
                    $proyectos = [
                        ['src' => asset('images/home/imagen-home1.png'), 'alt' => 'Sitio web corporativo', 'cliente' => 'Marca corporativa'],
                        ['src' => asset('images/home/imagen-home2.png'), 'alt' => 'Proyecto digital comercial', 'cliente' => 'Negocio en crecimiento'],
                        ['src' => asset('images/quienes-somos/quienes-somos1.png'), 'alt' => 'Landing de servicios', 'cliente' => 'Servicios profesionales'],
                        ['src' => asset('images/home/imagen-home3.png'), 'alt' => 'Plataforma personalizada', 'cliente' => 'Operación optimizada'],
                        ['src' => asset('images/quienes-somos/imagen-gemeni1.png'), 'alt' => 'Presencia digital institucional', 'cliente' => 'Marca institucional'],
                        ['src' => asset('images/quienes-somos/quienes-somos2.png'), 'alt' => 'Solución visual empresarial', 'cliente' => 'Empresa en evolución'],
                    ];
                @endphp

                @foreach($proyectos as $proyecto)
                    <div class="project-card position-relative overflow-hidden rounded-4 shadow-lg"
                         style="width: 350px; height: 250px; flex-shrink: 0;">
                        <img src="{{ $proyecto['src'] }}" alt="{{ $proyecto['alt'] }}"
                             class="w-100 h-100 object-fit-cover" loading="lazy">
                        <div class="project-overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-4"
                             style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);">
                            <h5 class="text-white fw-bold mb-1">{{ $proyecto['cliente'] }}</h5>
                            <p class="text-white-50 small mb-0">Diseño y tecnología alineados con tu crecimiento <i class="bi bi-arrow-right ms-1"></i></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    <i class="bi bi-shield-check me-1"></i> Nuestra diferencia
                </span>
                <h2 class="display-4 fw-bold text-dark mb-4">
                    La combinación que tu negocio necesita para <span class="text-primary">verse bien y avanzar mejor</span>
                </h2>
                <p class="text-muted fs-5 mb-4">
                    No se trata solo de tener una página o un sistema. Se trata de contar con una solución que represente bien tu marca, respalde tu operación y te ayude a crecer.
                </p>

                <div class="d-flex flex-column gap-4">
                    <div class="feature-box d-flex p-3 rounded-3 bg-light">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0">
                            <i class="bi bi-lightning-charge fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Respuesta ágil</h5>
                            <p class="text-muted mb-0">Avanzamos con enfoque y claridad para que tu proyecto no se quede en ideas sino en resultados.</p>
                        </div>
                    </div>

                    <div class="feature-box d-flex p-3 rounded-3 bg-light">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0" style="background: linear-gradient(135deg, #26c6da, #00bcd4);">
                            <i class="bi bi-shield-lock fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Confianza técnica</h5>
                            <p class="text-muted mb-0">Construimos con una base sólida para que tu inversión tenga continuidad y valor en el tiempo.</p>
                        </div>
                    </div>

                    <div class="feature-box d-flex p-3 rounded-3 bg-light">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0" style="background: linear-gradient(135deg, #7b1fa2, #9c27b0);">
                            <i class="bi bi-headset fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Acompañamiento cercano</h5>
                            <p class="text-muted mb-0">Te acompañamos para que la solución no solo funcione, sino que también te ayude a tomar mejores decisiones.</p>
                        </div>
                    </div>

                    <div class="feature-box d-flex p-3 rounded-3 bg-light">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0" style="background: linear-gradient(135deg, #f57c00, #ff9800);">
                            <i class="bi bi-graph-up-arrow fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Enfoque en resultados</h5>
                            <p class="text-muted mb-0">Cada decisión busca mejorar tu imagen, fortalecer la experiencia del cliente y hacer más eficiente tu negocio.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('images/home/designer.png') }}" alt="Equipo CrearSystem"
                         class="img-fluid rounded-4 shadow-lg">

                    <div class="position-absolute" style="bottom: 20px; left: -20px;">
                        <div class="bg-white p-3 rounded-3 shadow-lg d-flex align-items-center gap-3">
                            <div class="stat-badge d-flex align-items-center justify-content-center rounded-circle">
                                <i class="bi bi-trophy fs-4 text-warning"></i>
                            </div>
                            <div>
                                <p class="fw-bold text-dark mb-0">Atención personalizada</p>
                                <small class="text-muted">Tu proyecto se trabaja con estrategia, detalle y enfoque real en tus objetivos</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 position-relative overflow-hidden"
         style="background: linear-gradient(135deg, #001f4d 0%, #0d47a1 50%, #26c6da 100%);">

    <div class="position-absolute w-100 h-100 overflow-hidden">
        <div class="position-absolute rounded-circle" style="width: 400px; height: 400px; background: rgba(255,255,255,0.05); top: -150px; right: -100px;"></div>
        <div class="position-absolute rounded-circle" style="width: 250px; height: 250px; background: rgba(245,124,0,0.2); bottom: -80px; left: 10%;"></div>
    </div>

    <div class="container position-relative text-center py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <span class="badge bg-warning text-dark px-4 py-2 mb-4">
                    <i class="bi bi-send me-1"></i> Hablemos
                </span>
                <h2 class="display-4 fw-bold text-white mb-4">
                    ¿Listo para que tu negocio proyecte una mejor imagen?
                </h2>
                <p class="lead text-white-50 mb-5" style="max-width: 680px; margin: 0 auto;">
                    Si necesitas una web profesional, una solución a medida o una mejora tecnológica que te ayude a crecer, este es un buen momento para comenzar.
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold shadow-lg">
                        <i class="bi bi-chat-dots me-2"></i>Conversemos
                    </a>
                    <a href="https://wa.me/573124926898" target="_blank" class="btn btn-outline-light btn-lg px-5 fw-semibold">
                        <i class="bi bi-whatsapp me-2"></i>WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 mb-3">
                <i class="bi bi-chat-square-quote me-1"></i> Testimonios
            </span>
            <h2 class="display-4 fw-bold text-dark mb-3">
                Lo que valoran nuestros <span class="text-primary">clientes</span>
            </h2>
            <p class="text-muted">La confianza se gana con resultados, buena comunicación y una experiencia de trabajo seria de principio a fin.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($testimoniosDestacados as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm">
                        <div class="text-warning fs-1 opacity-25" style="font-family: Georgia, serif;">"</div>

                        <p class="text-dark fst-italic mb-4">{{ $item->comentario }}</p>

                        <div class="d-flex align-items-center">
                            <div class="testimonial-avatar d-flex align-items-center justify-content-center rounded-circle me-3">
                                <span class="fw-bold text-primary">{{ substr($item->nombre, 0, 1) }}</span>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0">{{ $item->nombre }}</h6>
                                <small class="text-muted">{{ $item->cargo }} - {{ $item->empresa }}</small>
                            </div>
                        </div>

                        <div class="mt-3">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star{{ $i <= $item->calificacion ? '-fill' : '' }} text-warning"></i>
                            @endfor
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Aún no hay testimonios registrados.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <button class="btn btn-outline-primary btn-lg px-4" data-bs-toggle="modal" data-bs-target="#modalTestimonios">
                <i class="bi bi-grid me-2"></i>Ver todos los testimonios
            </button>
            <a href="{{ route('servicios') }}#testimonio-form" class="btn btn-primary btn-lg px-4 ms-2">
                <i class="bi bi-plus-circle me-2"></i>Compartir mi experiencia
            </a>
        </div>
    </div>
</section>

<div class="modal fade" id="modalTestimonios" tabindex="-1" aria-labelledby="modalTestimoniosLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTestimoniosLabel">
                    <i class="bi bi-chat-square-quote me-2"></i>Todos los testimonios
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    @forelse($testimoniosRestantes as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="testimonial-card h-100 p-4 bg-light rounded-4 border-0">
                                <p class="fst-italic">"{{ $item->comentario }}"</p>
                                <h6 class="fw-bold text-primary mb-0">{{ $item->nombre }}</h6>
                                <small class="text-muted">{{ $item->cargo }} - {{ $item->empresa }}</small>
                                <div class="mt-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="bi bi-star{{ $i <= $item->calificacion ? '-fill text-warning' : '-fill text-secondary' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">No hay más testimonios por mostrar.</p>
                        </div>
                    @endforelse
                </div>

                @if($testimoniosRestantes->hasPages())
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $testimoniosRestantes->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.hero-section {
    background: #001f4d;
    isolation: isolate;
}

.hero-cinematic {
    position: absolute;
    inset: 0;
    z-index: 0;
    overflow: hidden;
}

.hero-cinematic__slide,
.hero-cinematic__overlay,
.hero-cinematic__grain,
.hero-cinematic__glow {
    position: absolute;
    inset: 0;
}

.hero-cinematic__slide {
    opacity: 0;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    transform: scale(1.08);
    filter: saturate(108%) contrast(105%);
    transition: opacity 1.6s ease, transform 7s ease;
}

.hero-cinematic__slide.is-active {
    opacity: 1;
    transform: scale(1);
}

.hero-cinematic__overlay {
    z-index: 1;
    background:
        linear-gradient(90deg, rgba(0, 20, 54, 0.88) 0%, rgba(0, 31, 77, 0.72) 42%, rgba(8, 65, 125, 0.58) 68%, rgba(38, 198, 218, 0.34) 100%),
        linear-gradient(180deg, rgba(1, 10, 30, 0.22) 0%, rgba(1, 10, 30, 0.52) 100%);
}

.hero-cinematic__grain {
    z-index: 2;
    opacity: 0.18;
    background-image:
        linear-gradient(rgba(255, 255, 255, 0.06) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
    background-size: 3px 3px, 3px 3px;
    mix-blend-mode: soft-light;
}

.hero-cinematic__glow {
    z-index: 2;
    pointer-events: none;
}

.hero-cinematic__glow--top {
    background: radial-gradient(circle at 84% 18%, rgba(38, 198, 218, 0.28) 0%, transparent 28%);
}

.hero-cinematic__glow--bottom {
    background: radial-gradient(circle at 12% 88%, rgba(245, 124, 0, 0.2) 0%, transparent 24%);
}

.hero-cinematic__nav {
    position: relative;
    z-index: 4;
}

.hero-cinematic__indicator {
    min-width: 170px;
    padding: 0.85rem 1rem;
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 18px;
    background: rgba(255, 255, 255, 0.08);
    color: rgba(255, 255, 255, 0.72);
    text-align: left;
    backdrop-filter: blur(10px);
    transition: transform 0.25s ease, background-color 0.25s ease, border-color 0.25s ease, color 0.25s ease;
}

.hero-cinematic__indicator:hover {
    color: #fff;
    background: rgba(255, 255, 255, 0.12);
    border-color: rgba(255, 255, 255, 0.24);
}

.hero-cinematic__indicator.is-active {
    color: #fff;
    background: rgba(255, 255, 255, 0.16);
    border-color: rgba(255, 255, 255, 0.32);
    transform: translateY(-2px);
}

.hero-cinematic__indicator-bar {
    display: block;
    width: 56px;
    height: 4px;
    margin-bottom: 0.65rem;
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.3);
    overflow: hidden;
}

.hero-cinematic__indicator.is-active .hero-cinematic__indicator-bar {
    background: linear-gradient(90deg, #f5a623 0%, #ffd166 100%);
}

.hero-cinematic__indicator-label {
    display: block;
    font-size: 0.9rem;
    font-weight: 700;
    letter-spacing: 0.01em;
}

@media (prefers-reduced-motion: reduce) {
    .hero-cinematic__slide {
        transition: none;
    }
}

@keyframes scrollLeft {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

.hero-section .stat-item {
    text-align: center;
    padding: 0 20px;
}

.hero-section .stat-item:not(:last-child) {
    border-right: 1px solid rgba(255,255,255,0.2);
}

@media (max-width: 768px) {
    .hero-section .stat-item {
        flex: 1 1 100% !important;
        padding: 10px 0;
    }

    .hero-section .stat-item:not(:last-child) {
        border-right: none;
        border-bottom: 1px solid rgba(255,255,255,0.2);
        padding-bottom: 20px;
    }

    .hero-cinematic__overlay {
        background:
            linear-gradient(180deg, rgba(0, 20, 54, 0.82) 0%, rgba(0, 31, 77, 0.7) 52%, rgba(0, 31, 77, 0.78) 100%);
    }
}

.service-card {
    transition: all 0.3s ease;
}

.service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
}

.icon-box .icon-circle {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #001f4d, #26c6da);
}

.project-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.project-card:hover {
    transform: scale(1.03);
}

.project-card:hover .project-overlay {
    background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 100%);
}

.feature-box {
    transition: all 0.3s ease;
}

.feature-box:hover {
    background: #fff !important;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.feature-icon {
    width: 55px;
    height: 55px;
    min-width: 55px;
    background: linear-gradient(135deg, #001f4d, #26c6da);
}

.testimonial-card {
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
}

.testimonial-avatar {
    width: 50px;
    height: 50px;
    min-width: 50px;
    background: linear-gradient(135deg, rgba(0,31,77,0.1), rgba(38,198,218,0.1));
}

.stat-badge {
    width: 50px;
    height: 50px;
    min-width: 50px;
    background: rgba(245,124,0,0.1);
}

.btn-warning:hover {
    background: #e65100 !important;
    transform: translateY(-2px);
}

.btn-outline-light:hover {
    background: rgba(255,255,255,0.1) !important;
}

.animate__delay-1s {
    animation-delay: 0.3s;
}

.animate__delay-2s {
    animation-delay: 0.6s;
}

.animate__delay-3s {
    animation-delay: 0.9s;
}
</style>

@endsection
