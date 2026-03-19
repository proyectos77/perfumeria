@extends('layouts.app')

@section('content')

<script>
    document.querySelectorAll('a[href^="#"]').forEach(ancla => {
        ancla.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

<!-- ============================================
     HERO SECTION - Diseño Elegante y Profesional
============================================== -->
<header class="hero-section position-relative overflow-hidden" style="height: 100vh; min-height: 600px;">
    <!-- Imagen de fondo con overlay profesional -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: url('{{ asset('images/home/imagen-home1.png') }}') center center / cover no-repeat;">
        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="background: linear-gradient(135deg, rgba(0,31,77,0.92) 0%, rgba(0,31,77,0.75) 50%, rgba(38,198,218,0.65) 100%);">
        </div>
    </div>

    <!-- Elementos decorativos -->
    <div class="position-absolute w-100 h-100 overflow-hidden" style="z-index: 1;">
        <div class="position-absolute rounded-circle" style="width: 500px; height: 500px; background: radial-gradient(circle, rgba(245,124,0,0.15) 0%, transparent 70%); top: -100px; right: -100px;"></div>
        <div class="position-absolute rounded-circle" style="width: 300px; height: 300px; background: radial-gradient(circle, rgba(38,198,218,0.2) 0%, transparent 70%); bottom: 10%; left: 5%;"></div>
    </div>

    <!-- Contenido principal -->
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center position-relative" style="z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <!-- Badge animado -->
                <div class="badge bg-warning text-dark px-4 py-2 mb-4 fw-semibold animate__animated animate__fadeInDown">
                    <i class="bi bi-stars me-2"></i>Transformación Digital
                </div>

                <!-- Título principal -->
                <h1 class="display-2 display-lg-1 fw-bold text-white mb-4 animate__animated animate__fadeInUp" style="line-height: 1.2;">
                    Impulsamos tu Negocio con
                    <span class="text-warning">Innovación Digital</span>
                </h1>

                <!-- Subtítulo mejorado -->
                <p class="lead fs-4 text-white-50 mb-5 animate__animated animate__fadeInUp animate__delay-1s" style="max-width: 700px; margin: 0 auto;">
                    Creamos soluciones tecnológicas a medida que transforman tu empresa, aumentan tu productividad y generan resultados reales.
                </p>

                <!-- Botones CTA -->
                <div class="d-flex flex-wrap justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="{{ route('servicios') }}"
                       class="btn btn-warning btn-lg px-5 fw-bold shadow-lg">
                        <i class="bi bi-rocket-takeoff me-2"></i>DescubreNuestros Servicios
                    </a>
                    <a href="{{ route('contacto') }}"
                       class="btn btn-outline-light btn-lg px-5 fw-semibold">
                        <i class="bi bi-chat-dots me-2"></i>Contáctanos
                    </a>
                </div>

                <!-- Estadísticas -->
                <div class="d-flex flex-wrap justify-content-center gap-4 gap-lg-5 mt-5 animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="stat-item">
                        <span class="display-5 fw-bold text-warning">5+</span>
                        <p class="text-white-50 mb-0 small">Años de Experiencia</p>
                    </div>
                    <div class="stat-item">
                        <span class="display-5 fw-bold text-warning">50+</span>
                        <p class="text-white-50 mb-0 small">Proyectos Entregados</p>
                    </div>
                    <div class="stat-item">
                        <span class="display-5 fw-bold text-warning">100%</span>
                        <p class="text-white-50 mb-0 small">Clientes Satisfechos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wave decorativa -->
    <div class="position-absolute bottom-0 start-0 w-100" style="z-index: 3;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" style="width: 100%; height: 100px;">
            <path fill="#ffffff" d="M0,64 C288,120 576,0 864,64 C1152,128 1440,32 1440,32 L1440,120 L0,120 Z"></path>
        </svg>
    </div>
</header>

<!-- ============================================
     SERVICIOS DESTACADOS - Diseño Moderno
============================================== -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Encabezado -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-primary px-3 py-2 mb-3">
                    <i class="bi bi-grid me-1"></i> Lo que hacemos
                </span>
                <h2 class="display-4 fw-bold text-dark mb-3">
                    Nuestras <span class="text-primary">Soluciones</span>
                </h2>
                <p class="lead text-muted">
                    Ofrecemos un portafolio completo de servicios tecnológicos adaptados a tus necesidades específicas.
                </p>
            </div>
        </div>

        <!-- Grid de servicios -->
        <div class="row g-4">
            <!-- 1. Desarrollo Web -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3">
                            <i class="bi bi-code-slash fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Desarrollo Web</h4>
                    <p class="text-muted mb-3">Sitios web modernos, responsivos y optimizados para posicionarte en los primeros lugares de búsqueda.</p>
                    <a href="{{ route('servicios') }}" class="text-primary fw-semibold text-decoration-none">
                        Leer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- 2. Mantenimiento -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3" style="background: linear-gradient(135deg, #f57c00, #ff9800);">
                            <i class="bi bi-gear fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Mantenimiento</h4>
                    <p class="text-muted mb-3">Mantén tus sistemas actualizados, seguros y funcionando con máximo rendimiento.</p>
                    <a href="{{ route('servicios') }}" class="text-primary fw-semibold text-decoration-none">
                        Leer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- 3. Consultoría -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3" style="background: linear-gradient(135deg, #26c6da, #00bcd4);">
                            <i class="bi bi-people fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Consultoría TI</h4>
                    <p class="text-muted mb-3">Asesoría estratégica para transformar digitalmente tu empresa con las mejores prácticas.</p>
                    <a href="{{ route('servicios') }}" class="text-primary fw-semibold text-decoration-none">
                        Leer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- 4. Software a Medida -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3" style="background: linear-gradient(135deg, #7b1fa2, #9c27b0);">
                            <i class="bi bi-file-code fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Software a Medida</h4>
                    <p class="text-muted mb-3">Desarrollamos soluciones personalizadas que se adaptan exactamente a tus procesos de negocio.</p>
                    <a href="{{ route('servicios') }}" class="text-primary fw-semibold text-decoration-none">
                        Leer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- 5. Integraciones -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3" style="background: linear-gradient(135deg, #e91e63, #f06292);">
                            <i class="bi bi-plug fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Integraciones API</h4>
                    <p class="text-muted mb-3">Conectamos tus sistemas con pasarelas de pago, CRMs y plataformas externas de forma fluida.</p>
                    <a href="{{ route('servicios') }}" class="text-primary fw-semibold text-decoration-none">
                        Leer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- 6. Automatización -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm transition-all">
                    <div class="icon-box mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-3" style="background: linear-gradient(135deg, #455a64, #607d8b);">
                            <i class="bi bi-robot fs-3 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Automatización</h4>
                    <p class="text-muted mb-3">Optimiza tu tiempo con bots, scripts y flujos automáticos diseñados para tu empresa.</p>
                    <a href="{{ route('servicios') }}" class="text-primary fw-semibold text-decoration-none">
                        Leer más <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Ver todos los servicios -->
        <div class="text-center mt-5">
            <a href="{{ route('servicios') }}" class="btn btn-primary btn-lg px-5 fw-bold shadow">
                <i class="bi bi-collection me-2"></i>Ver Todos los Servicios
            </a>
        </div>
    </div>
</section>

<!-- ============================================
     GALERÍA DE PROYECTOS - Slider Animado
============================================== -->
<section class="py-5" style="background: linear-gradient(135deg, #001f4d 0%, #0d47a1 50%, #26c6da 100%);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                <i class="bi bi-images me-1"></i> Nuestro Trabajo
            </span>
            <h2 class="display-4 fw-bold text-white mb-3">Proyectos Destacados</h2>
            <p class="lead text-white-50">Conoce algunos de los proyectos que hemos realizado para nuestros clientes.</p>
        </div>

        <!-- Slider de imágenes -->
        <div class="position-relative overflow-hidden">
            <div class="d-flex align-items-center gap-4 py-3"
                 style="width: max-content; animation: scrollLeft 35s linear infinite;">

                @php
                    $proyectos = [
                        ['src' => asset('images/home/imagen-home1.png'), 'alt' => 'Proyecto 1', 'cliente' => 'Cliente Destacado'],
                        ['src' => asset('images/home/imagen-home2.png'), 'alt' => 'Proyecto 2', 'cliente' => 'Empresa Tech'],
                        ['src' => asset('images/quienes-somos/quienes-somos1.png'), 'alt' => 'Proyecto 3', 'cliente' => 'StartUp Innovadora'],
                        ['src' => asset('images/home/imagen-home3.png'), 'alt' => 'Proyecto 4', 'cliente' => 'Negocio Local'],
                        ['src' => asset('images/quienes-somos/imagen-gemeni1.png'), 'alt' => 'Proyecto 5', 'cliente' => 'Corporación Global'],
                        ['src' => asset('images/quienes-somos/quienes-somos2.png'), 'alt' => 'Proyecto 6', 'cliente' => 'PYMES Colombia'],
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
                            <p class="text-white-50 small mb-0">Ver proyecto <i class="bi bi-arrow-right ms-1"></i></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     ¿POR QUÉ ELEGIRNOS? - Diferenciadores
============================================== -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    <i class="bi bi-shield-check me-1"></i> Nuestra Diferencia
                </span>
                <h2 class="display-4 fw-bold text-dark mb-4">
                    ¿Por qué elegir <span class="text-primary">CrearSystem</span>?
                </h2>
                <p class="text-muted fs-5 mb-4">
                    No solo desarrollamos tecnología, creamos alianzas estratégicas que impulsan el crecimiento de tu negocio.
                </p>

                <div class="d-flex flex-column gap-4">
                    <div class="feature-box d-flex p-3 rounded-3 bg-light">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0">
                            <i class="bi bi-lightning-charge fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Entrega Rápida</h5>
                            <p class="text-muted mb-0">Cumplimos nuestros plazos sin comprometer la calidad del proyecto.</p>
                        </div>
                    </div>

                    <div class="feature-box d-flex p-3 rounded-3 bg-light">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0" style="background: linear-gradient(135deg, #26c6da, #00bcd4);">
                            <i class="bi bi-shield-lock fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Seguridad Garantizada</h5>
                            <p class="text-muted mb-0">Tus datos y sistemas protegidos con los más altos estándares.</p>
                        </div>
                    </div>

                    <div class="feature-box d-flex p-3 rounded-3 bg-light">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0" style="background: linear-gradient(135deg, #7b1fa2, #9c27b0);">
                            <i class="bi bi-headset fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Soporte Permanente</h5>
                            <p class="text-muted mb-0">Te acompañamos antes, durante y después de cada proyecto.</p>
                        </div>
                    </div>

                    <div class="feature-box d-flex p-3 rounded-3 bg-light">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0" style="background: linear-gradient(135deg, #f57c00, #ff9800);">
                            <i class="bi bi-graph-up-arrow fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Resultados Medibles</h5>
                            <p class="text-muted mb-0">Proyectos diseñados para generar impacto real en tu negocio.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('images/home/designer.png') }}" alt="Equipo CrearSystem"
                         class="img-fluid rounded-4 shadow-lg">

                    <!-- Badge flotante -->
                    <div class="position-absolute" style="bottom: 20px; left: -20px;">
                        <div class="bg-white p-3 rounded-3 shadow-lg d-flex align-items-center gap-3">
                            <div class="stat-badge d-flex align-items-center justify-content-center rounded-circle">
                                <i class="bi bi-trophy fs-4 text-warning"></i>
                            </div>
                            <div>
                                <p class="fw-bold text-dark mb-0">Premio Excelencia</p>
                                <small class="text-muted">Tecnología 2024</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     CTA - LLAMADA A LA ACCIÓN
============================================== -->
<section class="py-5 position-relative overflow-hidden"
         style="background: linear-gradient(135deg, #001f4d 0%, #0d47a1 50%, #26c6da 100%);">

    <!-- Elementos decorativos -->
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
                    ¿Listo para transformar tu negocio?
                </h2>
                <p class="lead text-white-50 mb-5" style="max-width: 600px; margin: 0 auto;">
                    Contáctanos hoy y descubre cómo podemos ayudarte a alcanzar tus objetivos tecnológicos. ¡Tu próxima solución digital comienza aquí!
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

<!-- ============================================
     TESTIMONIOS - Sección de Opiniones
============================================== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 mb-3">
                <i class="bi bi-chat-square-quote me-1"></i> Testimonios
            </span>
            <h2 class="display-4 fw-bold text-dark mb-3">
                Lo que dicen nuestros <span class="text-primary">clientes</span>
            </h2>
            <p class="text-muted">La satisfacción de nuestros clientes es nuestro mayor logro.</p>
        </div>

        <!-- Grid de testimonios -->
        <div class="row g-4 justify-content-center">
            @forelse($testimoniosDestacados as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card h-100 p-4 bg-white rounded-4 border-0 shadow-sm">
                        <!-- Comillas decorativas -->
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

                        <!-- Estrellas -->
                        <div class="mt-3">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star{{ $i <= $item->calificacion ? '-fill' : '' }} text-warning"></i>
                            @endfor
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Aún no hay comentarios registrados.</p>
                </div>
            @endforelse
        </div>

        <!-- Botones de acción -->
        <div class="text-center mt-5">
            <button class="btn btn-outline-primary btn-lg px-4" data-bs-toggle="modal" data-bs-target="#modalTestimonios">
                <i class="bi bi-grid me-2"></i>Ver Todos los Testimonios
            </button>
            <a href="{{ route('servicios') }}#testimonio-form" class="btn btn-primary btn-lg px-4 ms-2">
                <i class="bi bi-plus-circle me-2"></i>Agregar mi Testimonio
            </a>
        </div>
    </div>
</section>

<!-- Modal de Testimonios -->
<div class="modal fade" id="modalTestimonios" tabindex="-1" aria-labelledby="modalTestimoniosLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTestimoniosLabel">
                    <i class="bi bi-chat-square-quote me-2"></i>Todos los Testimonios
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
                            <p class="text-muted">No hay más testimonios.</p>
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

<!-- ============================================
     ESTILOS CSS ADICIONALES
============================================== -->
<style>
/* Animaciones */
@keyframes scrollLeft {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

/* Hero Section */
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
}

/* Service Cards */
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

/* Project Cards */
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

/* Feature Boxes */
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

/* Testimonial Cards */
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

/* Botón CTA hover */
.btn-warning:hover {
    background: #e65100 !important;
    transform: translateY(-2px);
}

.btn-outline-light:hover {
    background: rgba(255,255,255,0.1) !important;
}

/* Animation delays */
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
