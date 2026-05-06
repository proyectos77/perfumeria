<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PERFUMERY J & P - Tienda online de fragancias</title>
    <meta name="description" content="Tienda online de perfumes con catalogo, pedidos y control de stock.">
    <meta name="keywords" content="perfumes, fragancias, tienda online, catalogo de perfumes">
    <meta name="author" content="PERFUMERY J & P">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="PERFUMERY J & P">
    <meta property="og:description" content="Tienda online de fragancias seleccionadas.">
    <meta property="og:image" content="{{ asset('images/logo-pagina.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <link rel="icon" href="{{ asset('images/logo-pagina.png') }}?v=2" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo-pagina.png') }}?v=2" type="image/png">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&family=Cormorant+Garamond:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/product-detail.css') }}?v={{ time() }}">
</head>
@php
    $heroHeaderRoutes = ['home', 'catalogo.*'];
    $usesHeroHeader = request()->routeIs(...$heroHeaderRoutes);
@endphp
<body class="@yield('body_class', 'bg-light') {{ $usesHeroHeader ? 'site-body--hero' : 'site-body--plain' }}">
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

    <a href="https://wa.me/573538002817?text=Hola%20PERFUMERY%20J%20%26%20P,%20me%20gustaría%20hacer%20una%20consulta"
       target="_blank"
       class="site-float-action site-float-action--whatsapp"
       data-bs-toggle="tooltip"
       title="Escríbenos por WhatsApp"
       aria-label="Escríbenos por WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const siteHeader = document.querySelector("[data-site-header]");
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
