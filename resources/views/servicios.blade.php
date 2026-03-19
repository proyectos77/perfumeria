@extends('layouts.app')

@section('content')

<!-- Hero Section - Servicios -->
<section class="hero-servicios position-relative overflow-hidden">
    <!-- Imagen de fondo con overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: url('{{ asset('images/quienes-somos/quienes-somos2.png') }}') center center / cover no-repeat;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(0,31,77,0.85) 0%, rgba(38,198,218,0.75) 100%);"></div>
    </div>

    <!-- Contenido del Hero -->
    <div class="container position-relative z-1 py-5">
        <div class="row min-vh-50 align-items-center">
            <div class="col-12 text-center">
                <h1 class="display-2 fw-bold text-white mb-4 animate__animated animate__fadeInUp">
                    Nuestros Servicios
                </h1>
                <p class="lead text-white-50 fs-4 mb-5 animate__animated animate__fadeInUp animate__delay-1s">
                    Soluciones digitales a la medida para impulsar tu negocio al siguiente nivel
                </p>
                <div class="d-flex justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="#servicios" class="btn btn-warning btn-lg px-4 fw-bold">
                        <i class="bi bi-arrow-down-circle me-2"></i>Ver Servicios
                    </a>
                    <a href="{{ route('contacto') }}" class="btn btn-outline-light btn-lg px-4">
                        Contáctanos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- wave decorativa -->
    <div class="position-absolute bottom-0 start-0 w-100">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" preserveAspectRatio="none" style="width: 100%; height: 80px;">
            <path fill="#ffffff" d="M0,40 C360,100 720,0 1080,60 C1260,90 1380,70 1440,50 L1440,100 L0,100 Z"></path>
        </svg>
    </div>
</section>

<!-- Sección de Servicios Principales -->
<section id="servicios" class="py-5">
    <div class="container">
        <!-- Encabezado de sección -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-warning text-dark px-3 py-2 mb-3">¿Qué hacemos?</span>
                <h2 class="display-4 fw-bold text-primary mb-3">Soluciones Tecnológicas</h2>
                <p class="lead text-muted">Ofrecemos un completo portafolio de servicios digitales diseñados para transformar tu negocio y mantenerlo competitivo en el mundo digital.</p>
            </div>
        </div>

        <!-- Grid de Servicios -->
        <div class="row g-4">
            <!-- 1. Desarrollo Web -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card h-100 p-4 border-0 shadow-sm rounded-4 position-relative overflow-hidden service-card">
                    <div class="servicio-icon position-absolute end-0 top-0 opacity-10">
                        <i class="bi bi-code-slash display-1"></i>
                    </div>
                    <div class="servicio-icon-bg position-absolute rounded-circle"></div>
                    <div class="icon-container position-relative mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-circle mb-3">
                            <i class="bi bi-code-slash fs-2 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Desarrollo Web</h4>
                    <p class="text-muted mb-4">Creamos sitios web modernos, responsivos y optimizados para buscadores (SEO). Tu presencia digital efectiva y profesional.</p>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Diseño Responsivo</small>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Optimización SEO</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Alta Performance</small>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 2. Mantenimiento -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card h-100 p-4 border-0 shadow-sm rounded-4 position-relative overflow-hidden service-card">
                    <div class="servicio-icon position-absolute end-0 top-0 opacity-10">
                        <i class="bi bi-gear display-1"></i>
                    </div>
                    <div class="icon-container position-relative mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="background: linear-gradient(135deg, #f57c00, #ff9800);">
                            <i class="bi bi-gear fs-2 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Mantenimiento de Software</h4>
                    <p class="text-muted mb-4">Mantén tus sistemas actualizados y funcionando sin problemas. Actualizaciones, soporte técnico y mejoras continuas.</p>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Actualizaciones de Seguridad</small>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Soporte Técnico 24/7</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Mejoras Continuas</small>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 3. Consultoría -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card h-100 p-4 border-0 shadow-sm rounded-4 position-relative overflow-hidden service-card">
                    <div class="servicio-icon position-absolute end-0 top-0 opacity-10">
                        <i class="bi bi-people display-1"></i>
                    </div>
                    <div class="icon-container position-relative mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="background: linear-gradient(135deg, #26c6da, #00bcd4);">
                            <i class="bi bi-people fs-2 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Consultoría TI</h4>
                    <p class="text-muted mb-4">Asesoría estratégica para tu transformación digital. Optimizamos tus procesos y maximizamos la eficiencia tecnológica.</p>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Análisis de Procesos</small>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Estrategia Digital</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Optimización de Recursos</small>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 4. Software a Medida -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card h-100 p-4 border-0 shadow-sm rounded-4 position-relative overflow-hidden service-card">
                    <div class="servicio-icon position-absolute end-0 top-0 opacity-10">
                        <i class="bi bi-file-code display-1"></i>
                    </div>
                    <div class="icon-container position-relative mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="background: linear-gradient(135deg, #7b1fa2, #9c27b0);">
                            <i class="bi bi-file-code fs-2 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Software a Medida</h4>
                    <p class="text-muted mb-4">Desarrollamos soluciones personalizadas desde cero, adaptadas exactamente a tus requerimientos y procesos de negocio.</p>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Desarrollo Personalizado</small>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Escalabilidad Total</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Integración Nativa</small>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 5. Integraciones API -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card h-100 p-4 border-0 shadow-sm rounded-4 position-relative overflow-hidden service-card">
                    <div class="servicio-icon position-absolute end-0 top-0 opacity-10">
                        <i class="bi bi-plug display-1"></i>
                    </div>
                    <div class="icon-container position-relative mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="background: linear-gradient(135deg, #e91e63, #f06292);">
                            <i class="bi bi-plug fs-2 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Integraciones API</h4>
                    <p class="text-muted mb-4">Conectamos tu sistema con pasarelas de pago, CRMs, plataformas externas y servicios de terceros de forma fluida.</p>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Pasarelas de Pago</small>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Integración CRM</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>APIs Personalizadas</small>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 6. Automatización -->
            <div class="col-lg-4 col-md-6">
                <div class="servicio-card h-100 p-4 border-0 shadow-sm rounded-4 position-relative overflow-hidden service-card">
                    <div class="servicio-icon position-absolute end-0 top-0 opacity-10">
                        <i class="bi bi-robot display-1"></i>
                    </div>
                    <div class="icon-container position-relative mb-4">
                        <div class="icon-circle d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="background: linear-gradient(135deg, #455a64, #607d8b);">
                            <i class="bi bi-robot fs-2 text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Automatización de Procesos</h4>
                    <p class="text-muted mb-4">Ahorra tiempo y reduce errores con bots, scripts y flujos automáticos diseñados para tu empresa.</p>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Automatización de Tareas</small>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Workflows Automáticos</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <small>Reportes Automáticos</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de ¿Por Qué Elegirnos? -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <span class="badge bg-primary px-3 py-2 mb-3">¿Por qué nosotros?</span>
                <h2 class="display-4 fw-bold text-dark mb-4">Tu Socio Tecnológico de Confianza</h2>
                <p class="text-muted fs-5 mb-4">En CrearSystem combinamos tecnología de vanguardia con un enfoque centrado en el cliente para ofrecer soluciones que realmente impulsan tu negocio.</p>

                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-start">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-circle me-3 flex-shrink-0">
                            <i class="bi bi-shield-check text-white fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Seguridad Primero</h5>
                            <p class="text-muted mb-0">Protegemos tus datos con los más altos estándares de seguridad.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-circle me-3 flex-shrink-0" style="background: linear-gradient(135deg, #f57c00, #ff9800);">
                            <i class="bi bi-clock-history text-white fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Entrega Puntual</h5>
                            <p class="text-muted mb-0">Cumplimos con los plazos acordados sin comprometer la calidad.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <div class="feature-icon d-flex align-items-center justify-content-center rounded-circle me-3 flex-shrink-0" style="background: linear-gradient(135deg, #26c6da, #00bcd4);">
                            <i class="bi bi-headset text-white fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Soporte Continuo</h5>
                            <p class="text-muted mb-0">Estamos contigo en cada etapa, antes y después del proyecto.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('images/servicio/servicio1.png') }}" alt="Servicios CrearSystem" class="img-fluid rounded-4 shadow-lg">
                    <div class="position-absolute bottom-0 end-0 m-4">
                        <div class="bg-white p-3 rounded-3 shadow d-inline-block">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-circle d-flex align-items-center justify-content-center rounded-circle">
                                    <span class="fw-bold text-primary">5+</span>
                                </div>
                                <div>
                                    <p class="mb-0 fw-bold">Años de Experiencia</p>
                                    <small class="text-muted">En el mercado</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-5" style="background: linear-gradient(135deg, #001f4d 0%, #0d47a1 100%);">
    <div class="container text-center">
        <h2 class="display-5 fw-bold text-white mb-3">¿Listo para transformar tu negocio?</h2>
        <p class="lead text-white-50 mb-4">Contáctanos hoy y descubre cómo podemos ayudarte a alcanzar tus objetivos tecnológicos.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-5 fw-bold">
                <i class="bi bi-chat-dots me-2"></i>Conversemos
            </a>
            <a href="{{ route('home') }}" class="btn btn-outline-light btn-lg px-5">
                <i class="bi bi-house me-2"></i>Volver al Inicio
            </a>
        </div>
    </div>
</section>

<!-- Testimonios -->
<section id="testimonios" class="py-5 bg-white">
    <div class="container" style="max-width: 900px;">
        <div class="text-center mb-5">
            <span class="badge bg-warning text-dark px-3 py-2 mb-3">Testimonios</span>
            <h2 class="display-5 fw-bold text-dark">Lo que dicen nuestros clientes</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('testimonios.store') }}" class="row g-4 p-4 border rounded-4 shadow-sm" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
            @csrf

            <div class="col-md-6">
                <label for="nombre" class="form-label fw-semibold">Tu nombre</label>
                <input type="text" name="nombre" class="form-control form-control-lg border-0 shadow-sm" placeholder="Ej: Juan Pérez" required>
            </div>

            <div class="col-md-6">
                <label for="empresa" class="form-label fw-semibold">Empresa</label>
                <input type="text" name="empresa" class="form-control form-control-lg border-0 shadow-sm" placeholder="Ej: SoftTech S.A.S" required>
            </div>

            <div class="col-md-12">
                <label for="cargo" class="form-label fw-semibold">Cargo</label>
                <input type="text" name="cargo" class="form-control form-control-lg border-0 shadow-sm" placeholder="Ej: Gerente de Tecnología" required>
            </div>

            <div class="col-md-12">
                <label for="comentario" class="form-label fw-semibold">Comentario</label>
                <textarea name="comentario" class="form-control border-0 shadow-sm" placeholder="¿Qué opinas de nuestro servicio?" rows="4" required></textarea>
            </div>

            <!-- Calificación con estrellas -->
            <div class="col-md-12">
                <label class="form-label d-block fw-semibold text-center">Calificación:</label>
                <div class="rating-stars d-flex justify-content-center gap-2">
                    @for($i = 1; $i <= 5; $i++)
                    <input type="radio" name="calificacion" value="{{ $i }}" id="star{{ $i }}" required hidden>
                    <label for="star{{ $i }}" class="fs-2 star-label" style="cursor: pointer; color: #ddd; transition: all 0.3s;">
                        <i class="bi bi-star-fill"></i>
                    </label>
                    @endfor
                </div>
            </div>

            <div class="col-12 text-center mt-3">
                <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold">
                    <i class="bi bi-send me-2"></i>Enviar Testimonio
                </button>
            </div>
        </form>
    </div>
</section>

<style>
/* Estilos mejorados para los servicios */
.hero-servicios {
    min-height: 60vh;
    display: flex;
    align-items: center;
}

.min-vh-50 {
    min-height: 50vh;
}

.servicio-card {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    background: #fff;
}

.servicio-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

.icon-circle {
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #001f4d, #26c6da);
    box-shadow: 0 8px 20px rgba(0,31,77,0.3);
}

.servicio-icon-bg {
    width: 150px;
    height: 150px;
    background: linear-gradient(135deg, #001f4d 0%, #26c6da 100%);
    top: -50px;
    right: -50px;
    opacity: 0.1;
}

.feature-icon {
    width: 50px;
    height: 50px;
    min-width: 50px;
    background: linear-gradient(135deg, #001f4d, #26c6da);
}

.stat-circle {
    width: 50px;
    height: 50px;
    background: rgba(38, 198, 218, 0.2);
}

/* Animaciones de las estrellas */
.rating-stars label {
    transition: all 0.2s ease;
}

.rating-stars label:hover,
.rating-stars label:hover ~ label,
.rating-stars input:checked + label {
    color: #ffc107 !important;
    transform: scale(1.1);
}

/* Responsive */
@media (max-width: 768px) {
    .hero-servicios {
        min-height: 50vh;
    }

    .servicio-card {
        margin-bottom: 1rem;
    }
}
</style>

@endsection
