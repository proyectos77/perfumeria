<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $siteSettings->site_name }} - Soluciones digitales, gestión documental y acompañamiento tecnológico</title>
    <meta name="description" content="{{ $siteSettings->site_summary }}">
    <meta name="keywords" content="soluciones digitales, gestión documental, SGDEA, automatización, proyectos tecnológicos, firma tecnológica">
    <meta name="author" content="{{ $siteSettings->site_name }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="{{ $siteSettings->site_name }}">
    <meta property="og:description" content="{{ $siteSettings->site_summary }}">
    <meta property="og:image" content="{{ $siteSettings->assetUrl($siteSettings->logo_path) }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/site-public-pages.css') }}?v={{ time() }}">
</head>
@php
    $heroHeaderRoutes = ['home', 'contacto', 'servicios', 'quienessomos', 'terminos', 'privacidad'];
    $usesHeroHeader = request()->routeIs(...$heroHeaderRoutes);
@endphp
<body class="@yield('body_class', 'bg-light') {{ $usesHeroHeader ? 'site-body--hero' : 'site-body--plain' }}">
    <div id="cookie-banner" class="site-cookie-banner" style="display: none;">
        <div class="container site-cookie-banner__inner">
            <p class="site-cookie-banner__text mb-0">
                Usamos cookies para mejorar tu experiencia. Al continuar, aceptas nuestra
                <a href="{{ route('terminos') }}">política de privacidad y términos</a>.
            </p>
            <button id="aceptar-cookies" class="btn btn-outline-light btn-sm site-cookie-banner__button">Aceptar</button>
        </div>
    </div>

    <div class="site-shell min-vh-100">
        @include('layouts.navigation')

        @if (isset($header))
            <header class="site-subheader">
                <div class="container py-4 site-subheader__inner">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="@yield('main_class', 'site-main')">
            @yield('content')
        </main>
    </div>

    @include('layouts.footer')

    <a href="{{ $siteSettings->whatsappUrl() }}"
       target="_blank"
       class="site-float-action site-float-action--whatsapp"
       data-bs-toggle="tooltip"
       title="Escríbenos por WhatsApp"
       aria-label="Escríbenos por WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const banner = document.getElementById("cookie-banner");
            const botonAceptar = document.getElementById("aceptar-cookies");
            const siteHeader = document.querySelector("[data-site-header]");

            if (banner && !localStorage.getItem("cookies_aceptadas")) {
                banner.style.display = "block";
            }

            if (botonAceptar) {
                botonAceptar.addEventListener("click", function () {
                    localStorage.setItem("cookies_aceptadas", true);
                    banner.style.display = "none";
                });
            }

            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            if (siteHeader) {
                const syncHeaderState = function () {
                    siteHeader.classList.toggle("is-scrolled", window.scrollY > 18);
                };

                syncHeaderState();
                window.addEventListener("scroll", syncHeaderState, { passive: true });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
