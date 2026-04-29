@extends('layouts.app')

@section('content')

@php
    $conversationTopics = [
        [
            'icon' => 'bi bi-diagram-3',
            'title' => 'Contexto actual',
            'text' => 'Entendemos en qué punto está tu empresa, qué necesidad tienes y dónde hoy se está generando más fricción.',
        ],
        [
            'icon' => 'bi bi-kanban',
            'title' => 'Prioridades del proyecto',
            'text' => 'Aterrizamos qué conviene resolver primero y qué tipo de avance puede tener más sentido según tu momento actual.',
        ],
        [
            'icon' => 'bi bi-chat-square-text',
            'title' => 'Siguiente paso',
            'text' => 'Definimos si vale la pena avanzar a una propuesta, un diagnóstico más detallado o una conversación de seguimiento.',
        ],
    ];

    $contactPoints = [
        [
            'icon' => 'bi bi-telephone-fill',
            'title' => 'Teléfono',
            'text' => $siteSettings->contact_phone,
            'accent' => 'brand',
        ],
        [
            'icon' => 'bi bi-envelope-fill',
            'title' => 'Correo',
            'text' => $siteSettings->contact_email,
            'accent' => 'aqua',
        ],
        [
            'icon' => 'bi bi-person-lines-fill',
            'title' => 'Tipo de contacto',
            'text' => 'Conversación inicial, diagnóstico o evaluación de una necesidad puntual.',
            'accent' => 'sunset',
        ],
    ];
@endphp

@include('partials.page-hero', [
    'class' => 'page-hero--contact',
    'image' => $siteSettings->contact_hero_image_path,
    'badge' => [
        'icon' => 'bi bi-chat-dots',
        'text' => 'Contacto',
    ],
    'title' => 'Conversemos sobre tu necesidad antes de hablar de una propuesta.',
    'description' => 'Este es el punto de partida para transformar una necesidad en una solución clara, bien orientada y respaldada profesionalmente.',
    'actions' => [
        [
            'href' => '#contacto-formulario',
            'label' => 'Solicitar conversación inicial',
            'icon' => 'bi bi-arrow-down-circle',
            'class' => 'btn btn-warning btn-lg px-5 fw-bold shadow-lg',
        ],
        [
            'href' => $siteSettings->whatsappUrl(),
            'label' => 'Hablar por WhatsApp',
            'icon' => 'bi bi-whatsapp',
            'target' => '_blank',
            'class' => 'btn btn-outline-light btn-lg px-5 fw-semibold',
        ],
    ],
    'highlights' => [
        ['value' => 'Inicial', 'label' => 'Conversación de diagnóstico'],
        ['value' => 'Directa', 'label' => 'Comunicación clara y ejecutiva'],
        ['value' => 'Útil', 'label' => 'Orientada a definir el siguiente paso'],
    ],
])

<section id="contacto-formulario" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">Contacto inicial</span>
            <h2 class="section-heading__title">Una conversación bien planteada ayuda a tomar mejores decisiones</h2>
            <p class="section-heading__text">No buscamos llevarte a una venta agresiva. Buscamos entender tu contexto, identificar si hay encaje y definir una forma razonable de avanzar.</p>
        </div>

        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <div class="contact-strategy-panel">
                    <div class="contact-strategy-panel__header">
                        <span class="section-heading__eyebrow">Qué podemos revisar</span>
                        <h3>En la primera conversación nos enfocamos en claridad, no en presión comercial.</h3>
                    </div>

                    <div class="contact-strategy-panel__topics">
                        @foreach($conversationTopics as $topic)
                            <article class="contact-topic">
                                <div class="contact-topic__icon">
                                    <i class="{{ $topic['icon'] }}"></i>
                                </div>
                                <div>
                                    <h4>{{ $topic['title'] }}</h4>
                                    <p class="mb-0">{{ $topic['text'] }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="contact-strategy-panel__note">
                        <strong>Sugerencia</strong>
                        <p class="mb-0">Si quieres agilizar la respuesta, cuéntanos brevemente qué necesitas, en qué etapa está el tema y qué te gustaría aclarar en una primera conversación.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="form-panel">
                    <div class="form-panel__header">
                        <span class="section-heading__eyebrow">Formulario breve</span>
                        <h3>Solicita una conversación inicial</h3>
                        <p>Déjanos tus datos y una descripción breve del contexto. Con eso podemos revisar el caso y responderte con mayor criterio.</p>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('contacto.enviar') }}" method="POST" class="row g-4">
                        @csrf

                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control form-control-lg form-control-soft" placeholder="Ej: Laura Gómez" required>
                        </div>

                        <div class="col-md-6">
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control form-control-lg form-control-soft" placeholder="Ej: laura@empresa.com" required>
                        </div>

                        <div class="col-12">
                            <label for="mensaje" class="form-label">Contexto o necesidad</label>
                            <textarea name="mensaje" class="form-control form-control-soft" rows="5" placeholder="Cuéntanos brevemente qué necesitas, qué problema quieres resolver o qué te gustaría revisar en una conversación inicial." required></textarea>
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
                                <i class="bi bi-send me-2"></i>Enviar solicitud
                            </button>
                            <a href="{{ $siteSettings->whatsappUrl() }}" target="_blank" class="btn btn-outline-primary btn-lg px-4 fw-semibold">
                                <i class="bi bi-whatsapp me-2"></i>WhatsApp
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-2">
            @foreach($contactPoints as $point)
                <div class="col-lg-4">
                    <article class="info-card info-card--executive h-100">
                        <div class="premium-card__icon premium-card__icon--{{ $point['accent'] }}">
                            <i class="{{ $point['icon'] }}"></i>
                        </div>
                        <div>
                            <h3>{{ $point['title'] }}</h3>
                            <p class="mb-0">{{ $point['text'] }}</p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
