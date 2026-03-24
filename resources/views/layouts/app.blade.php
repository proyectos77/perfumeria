<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Crear System - Desarrollo web, software y soluciones digitales</title>
    <meta name="description" content="Creamos páginas web, software a medida y soluciones digitales para empresas que buscan verse mejor, vender más y optimizar sus procesos.">
    <meta name="keywords" content="desarrollo web, software a medida, automatización, consultoría TI, soluciones digitales, tecnología">
    <meta name="author" content="Crear System">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Crear System">
    <meta property="og:description" content="Desarrollo web, software a medida y soluciones digitales para empresas que quieren crecer con tecnología.">
    <meta property="og:image" content="{{ asset('images/logo-crear-system.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
</head>
@php
    $heroHeaderRoutes = ['home', 'contacto', 'servicios', 'quienessomos', 'terminos', 'privacidad'];
    $usesHeroHeader = request()->routeIs(...$heroHeaderRoutes);
@endphp
<body class="@yield('body_class', 'bg-light') {{ $usesHeroHeader ? 'site-body--hero' : 'site-body--plain' }}">
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/685744ea19acdf191aa6527a/1iuaead4r';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>

    <div id="cookie-banner" class="position-fixed bottom-0 start-0 w-100 bg-dark text-white p-3 shadow" style="z-index: 1050; display: none;">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="mb-2 mb-md-0">
                Usamos cookies para mejorar tu experiencia. Al continuar, aceptas nuestra
                <a href="{{ route('terminos') }}" class="text-warning text-decoration-underline">política de privacidad y términos</a>.
            </div>
            <button id="aceptar-cookies" class="btn btn-outline-light btn-sm">Aceptar</button>
        </div>
    </div>

    <div class="site-shell min-vh-100">
        @include('layouts.navigation')

        @if (isset($header))
            <header class="bg-white shadow-sm">
                <div class="container py-4">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="@yield('main_class', 'site-main')">
            @yield('content')
        </main>
    </div>

    @include('layouts.footer')

    <a href="tel:+573124926898"
       class="site-float-action site-float-action--phone"
       data-bs-toggle="tooltip"
       title="Llámanos ahora"
       aria-label="Llámanos ahora">
        <i class="bi bi-telephone-fill"></i>
    </a>

    <a href="https://wa.me/573124926898"
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
