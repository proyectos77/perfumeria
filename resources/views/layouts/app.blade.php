<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    
    <!-- <title>Crear System</title> -->
    <title>Crear System - Soluciones digitales en desarrollo web</title>
    <meta name="description" content="Desarrollamos páginas web, aplicaciones y soluciones tecnológicas para empresas. Transformamos ideas en realidad digital.">
    <meta name="keywords" content="desarrollo web, software, aplicaciones, consultoría TI, Laravel, tecnología">
    <meta name="author" content="Crear System">
    <meta name="robots" content="index, follow">

    <!-- Para redes sociales (Open Graph para Facebook, LinkedIn, etc.) -->
    <meta property="og:title" content="Crear System">
    <meta property="og:description" content="Soluciones digitales en desarrollo web, apps y consultoría tecnológica.">
    <meta property="og:image" content="{{ asset('images/logo-crear-system.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Animaciones de Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/685744ea19acdf191aa6527a/1iuaead4r';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->

                <!-- Banner de cookies -->
        <div id="cookie-banner" class="position-fixed bottom-0 start-0 w-100 bg-dark text-white p-3 shadow" style="z-index: 1050; display: none;">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="mb-2 mb-md-0">
                    Usamos cookies para mejorar tu experiencia. Al continuar, aceptas nuestra
                    <a href="{{ route('terminos') }}" class="text-warning text-decoration-underline">política de privacidad y términos</a>.
                </div>
                <button id="aceptar-cookies" class="btn btn-outline-light btn-sm">Aceptar</button>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const banner = document.getElementById("cookie-banner");
                const botonAceptar = document.getElementById("aceptar-cookies");

                // Mostrar si no está aceptado
                if (!localStorage.getItem("cookies_aceptadas")) {
                    banner.style.display = "block";
                }

                botonAceptar.addEventListener("click", function () {
                    localStorage.setItem("cookies_aceptadas", true);
                    banner.style.display = "none";
                });
            });
        </script>


<body class="bg-light" class="m-0 p-0 bg-light">
    <div class="min-vh-100">
        @include('layouts.navigation')

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="container py-4">
                    {{ $header }}
                </div>
            </header>
        @endif


        

        <main class="container my-4">
            @yield('content')
        </main> 

        

    </div>

    @include('layouts.footer')


        <!-- Botón flotante de Teléfono -->
<a href="tel:+573001234567"
   class="position-fixed end-0 me-3 btn btn-primary rounded-circle shadow"
   style="bottom: 180px; width: 50px; height: 50px; z-index: 1030;"
   data-bs-toggle="tooltip" title="Llámanos ahora">
    <i class="bi bi-telephone fs-4 text-white d-flex justify-content-center align-items-center h-100"></i>
</a>

<!-- Botón flotante de WhatsApp -->
<a href="https://wa.me/573007654321" target="_blank"
   class="position-fixed end-0 me-3 btn btn-success rounded-circle shadow"
   style="bottom: 110px; width: 50px; height: 50px; z-index: 1030;"
   data-bs-toggle="tooltip" title="Escríbenos por WhatsApp">
    <i class="bi bi-whatsapp fs-4 text-white d-flex justify-content-center align-items-center h-100"></i>
</a>



        <script>
            // Inicializa todos los tooltips de Bootstrap
            document.addEventListener('DOMContentLoaded', function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            });
        </script>



    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
