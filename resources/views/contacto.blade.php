@extends('layouts.app')

@section('content')

@include('partials.page-hero', [
    'class' => 'page-hero--contact',
    'image' => 'images/quienes-somos/quienes-somos2.png',
    'badge' => [
        'icon' => 'bi bi-chat-dots',
        'text' => 'Contacto directo',
    ],
    'title' => 'Conversemos sobre la <span class="text-warning">solución que tu negocio necesita</span>',
    'description' => 'Si buscas una página web profesional, una mejora tecnológica o una solución a medida, este es el punto de partida para ordenar tu idea y convertirla en un proyecto real.',
    'actions' => [
        [
            'href' => '#contacto-formulario',
            'label' => 'Ir al formulario',
            'icon' => 'bi bi-arrow-down-circle',
            'class' => 'btn btn-warning btn-lg px-5 fw-bold shadow-lg',
        ],
        [
            'href' => 'https://wa.me/573124926898',
            'label' => 'WhatsApp',
            'icon' => 'bi bi-whatsapp',
            'target' => '_blank',
            'class' => 'btn btn-outline-light btn-lg px-5 fw-semibold',
        ],
    ],
    'highlights' => [
        ['value' => '24/7', 'label' => 'Canal disponible'],
        ['value' => '1', 'label' => 'Formulario central'],
        ['value' => '3', 'label' => 'Canales de atención'],
    ],
])

<section id="contacto-formulario" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">Hablemos</span>
            <h2 class="section-heading__title">Un contacto claro transmite confianza desde el primer mensaje</h2>
            <p class="section-heading__text">Esta sección está pensada para que el cliente entienda rápido cómo comunicarse, qué puede solicitar y por qué vale la pena iniciar la conversación.</p>
        </div>

        <div class="row g-4 align-items-start">
            <div class="col-lg-7">
                <div class="form-panel">
                    <div class="form-panel__header">
                        <span class="section-heading__eyebrow">Formulario</span>
                        <h3>Cuéntanos qué necesitas</h3>
                        <p>Recibimos solicitudes de desarrollo web, automatización, mantenimiento, soporte y proyectos tecnológicos a medida.</p>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('contacto.enviar') }}" method="POST" class="row g-4">
                        @csrf

                        <div class="col-12">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control form-control-lg form-control-soft" placeholder="Ej: Laura Gómez" required>
                        </div>

                        <div class="col-12">
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control form-control-lg form-control-soft" placeholder="Ej: laura@empresa.com" required>
                        </div>

                        <div class="col-12">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea name="mensaje" class="form-control form-control-soft" rows="6" placeholder="Cuéntanos qué necesitas, en qué etapa está tu proyecto y cómo podemos ayudarte." required></textarea>
                        </div>

                        <div class="col-12">
                            <div class="legal-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="acepta_terminos" id="acepta_terminos" required>
                                    <label class="form-check-label" for="acepta_terminos">
                                        He leído y acepto los
                                        <a href="{{ route('terminos') }}" target="_blank">Términos y Condiciones</a>
                                        y la
                                        <a href="{{ route('privacidad') }}" target="_blank">Política de Privacidad</a>.
                                    </label>
                                </div>

                                @error('acepta_terminos')
                                    <div class="invalid-feedback d-block">
                                        Debes aceptar los términos y condiciones para continuar.
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-wrap gap-3">
                            <button type="submit" class="btn btn-warning btn-lg px-4 fw-bold shadow-lg">
                                <i class="bi bi-send me-2"></i>Enviar mensaje
                            </button>
                            <a href="https://wa.me/573124926898" target="_blank" class="btn btn-outline-primary btn-lg px-4 fw-semibold">
                                <i class="bi bi-whatsapp me-2"></i>Escribir por WhatsApp
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="info-stack">
                    <article class="info-card">
                        <div class="premium-card__icon premium-card__icon--brand">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div>
                            <h3>Teléfono</h3>
                            <p>+57 312 492 6898</p>
                        </div>
                    </article>

                    <article class="info-card">
                        <div class="premium-card__icon premium-card__icon--aqua">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div>
                            <h3>Correo</h3>
                            <p>crearsystem@gmail.com</p>
                        </div>
                    </article>

                    <article class="info-card">
                        <div class="premium-card__icon premium-card__icon--sunset">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div>
                            <h3>Atención</h3>
                            <p>Canal disponible para solicitudes comerciales, asesoría tecnológica y seguimiento de proyectos.</p>
                        </div>
                    </article>

                    <div class="info-banner">
                        <span class="section-heading__eyebrow">Respuesta rápida</span>
                        <h3>Si ya tienes una idea clara, escríbenos ahora</h3>
                        <p>WhatsApp es el canal más directo para iniciar una conversación, compartir tu necesidad y avanzar más rápido.</p>
                        <a href="https://wa.me/573124926898" target="_blank" class="btn btn-success btn-lg px-4 fw-bold">
                            <i class="bi bi-whatsapp me-2"></i>Hablar por WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
