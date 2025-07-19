<footer class="bg-primary text-white pt-5 pb-4 mt-5" style="background: linear-gradient(to bottom, #001f4d, #26c6da);">
    <div class="container">
        <div class="row text-md-start text-center">
            <!-- Logo y descripción -->
            <div class="col-md-4 mb-4 d-flex flex-column align-items-md-start align-items-center">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ asset('images/logo-crear-system-4.png') }}" alt="Logo Crear System" style="height: 60px;" class="me-2">
                    <h4 class="fw-bold mb-0">Crear System</h4>
                   
                </div>
                <p class="small mt-2 text-center text-md-start">
                    Soluciones digitales en desarrollo web, apps, mantenimiento y consultoría TI. Ayudamos a empresas a crecer con tecnología.
                </p>
            </div>

            <!-- Enlaces útiles -->
            <div class="col-md-4 mb-4">
                <h6 class="text-uppercase fw-bold">Enlaces</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white text-decoration-none">Inicio</a></li>
                    <li><a href="{{ route('servicios') }}" class="text-white text-decoration-none">Servicios</a></li>
                    <li><a href="{{ route('contacto') }}" class="text-white text-decoration-none">Contacto</a></li>
                    <li><a href="{{ route('privacidad') }}" class="text-white text-decoration-none">Política de Privacidad</a></li>
                    <li><a href="{{ route('terminos') }}" class="text-white text-decoration-none">Términos y Condiciones</a></li>
                </ul>
            </div>

            <!-- Información de contacto -->
            <div class="col-md-4 mb-4">
                <h6 class="text-uppercase fw-bold">Contacto</h6>
                <p class="mb-1"><i class="bi bi-telephone-fill me-2"></i> +57 312496898</p>
                <p class="mb-1"><i class="bi bi-whatsapp me-2"></i> +57 3124926898</p>
                <p class="mb-1"><i class="bi bi-envelope-fill me-2"></i> contacto@crearsystem.com</p>
                <div class="mt-3">
                    <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-twitter fs-5"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-linkedin fs-5"></i></a>
                </div>
            </div>
        </div>  



        <hr class="bg-light">

        <div class="text-center small">
            &copy; {{ date('Y') }} Crear System. Todos los derechos reservados.
        </div>
    </div>
</footer>
