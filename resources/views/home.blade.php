@extends('layouts.app')

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


@section('content')

<div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: url('{{ asset('images/home/imagen-home1.png') }}') center center / cover no-repeat;
                z-index: 0;"></div>


<section class="hero-section position-relative text-white" style="height: 100vh; margin-top: 0; padding: 0;">
    <!-- Imagen de fondo -->
    <!-- <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: url('{{ asset('images/home/imagen-home.png') }}') center center / cover no-repeat;
                z-index: 0;"></div> -->

    <!-- Capa oscura para contraste -->
    <!-- <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div> -->

    <!-- Contenido centrado -->
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center position-relative" style="z-index: 2;">
        <h1 class="display-2 fw-bold mb-4 animate__animated animate__fadeInDown">Transformamos tu visión digital</h1>
        <p class="lead mb-4 animate__animated animate__fadeInUp">Creamos soluciones tecnológicas a medida para que tu empresa crezca.</p>
      <a href="{{ route('servicios') }}" 
   class="btn btn-lg text-white" 
   style="background-color: #f57c00; border: none;">
   Ver servicios
</a>

    </div>
</section>



<!--  nuestros servicios -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-primary fw-bold">Nuestros Servicios</h2>
            <p class="text-muted fs-5">Soluciones digitales a la medida para impulsar tu negocio</p>
        </div>

        <div class="row g-4">
            <!-- 1. Desarrollo Web -->
            <div class="col-md-4 animate__animated animate__fadeInUp">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body text-center">
                        <i class="bi bi-code-slash display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Desarrollo Web</h5>
                        <p class="card-text">Sitios modernos, responsivos y optimizados para buscadores.</p>
                    </div>
                </div>
            </div>

            <!-- 2. Apps móviles -->
            <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body text-center">
                        <i class="bi bi-phone display-4 text-success mb-3"></i>
                        <h5 class="card-title">Aplicaciones Móviles</h5>
                        <p class="card-text">Apps intuitivas para Android y iOS, rápidas y seguras.</p>
                    </div>
                </div>
            </div>

            <!-- 3. Mantenimiento -->
            <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body text-center">
                        <i class="bi bi-gear display-4 text-warning mb-3"></i>
                        <h5 class="card-title">Mantenimiento de Software</h5>
                        <p class="card-text">Actualización, soporte y mejoras continuas a tus sistemas.</p>
                    </div>
                </div>
            </div>

            <!-- 4. Consultoría -->
            <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body text-center">
                        <i class="bi bi-people-fill display-4 text-info mb-3"></i>
                        <h5 class="card-title">Consultoría TI</h5>
                        <p class="card-text">Asesoría estratégica para transformación digital y procesos.</p>
                    </div>
                </div>
            </div>

            <!-- 5. Desarrollo a medida -->
            <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body text-center">
                        <i class="bi bi-file-code-fill display-4 text-secondary mb-3"></i>
                        <h5 class="card-title">Software a Medida</h5>
                        <p class="card-text">Soluciones hechas desde cero, según tus requerimientos exactos.</p>
                    </div>
                </div>
            </div>

            <!-- 6. Integraciones API -->
            <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.5s;">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body text-center">
                        <i class="bi bi-plug display-4 text-danger mb-3"></i>
                        <h5 class="card-title">Integraciones API</h5>
                        <p class="card-text">Conectamos tu sistema con pasarelas, CRMs y plataformas externas.</p>
                    </div>
                </div>
            </div>

            <!-- 7. Automatización -->
            <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.6s;">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body text-center">
                        <i class="bi bi-robot display-4 text-dark mb-3"></i>
                        <h5 class="card-title">Automatización de Procesos</h5>
                        <p class="card-text">Ahorra tiempo con bots, scripts o flujos automáticos para tu empresa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- por que elegirnos -->
  <section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="mb-4 text-primary fw-bold animate__animated animate__fadeInUp">¿Por qué elegir Crear System?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <i class="bi bi-lightning-charge-fill text-warning display-4 mb-3"></i>
        <h5 class="fw-semibold">Velocidad & Rendimiento</h5>
        <p class="text-muted">Webs rápidas, optimizadas y listas para posicionarse en Google.</p>
      </div>
      <div class="col-md-4">
        <i class="bi bi-laptop-fill text-success display-4 mb-3"></i>
        <h5 class="fw-semibold">Diseño Responsivo</h5>
        <p class="text-muted">Tu web se adapta perfectamente a móviles, tablets y PCs.</p>
      </div>
      <div class="col-md-4">
        <i class="bi bi-shield-lock-fill text-info display-4 mb-3"></i>
        <h5 class="fw-semibold">Seguridad</h5>
        <p class="text-muted">Proyectos seguros con buenas prácticas y cifrado moderno.</p>
      </div>
    </div>
  </div>
</section>

<!-- section trabajo con nosotros -->
<section class="py-5 bg-primary text-white text-center">
  <div class="container">
    <h2 class="mb-4 fw-bold animate__animated animate__pulse">¿Listo para impulsar tu proyecto?</h2>
    <p class="mb-4">Hablemos de cómo transformar tu idea en una solución real.</p>

    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
      
      <!-- Botón principal -->
      <a href="{{ route('contacto') }}" 
         class="btn btn-lg text-white" 
         style="background-color: #f57c00; border: none;">
        Contáctanos ahora
      </a>
      
      <!-- WhatsApp -->
      <a href="https://wa.me/573124926898" target="_blank" 
         class="btn btn-outline-light btn-lg d-flex align-items-center">
        <i class="bi bi-whatsapp me-2 fs-4" style="color: #f57c00;"></i> 
        Escríbenos por WhatsApp
      </a>

    </div>
  </div>
</section>
<br><br>


<!-- section tesnimonios -->

<section class="py-5" style="background-color:rgb(183, 225, 241);">
  <div class="container text-center text-white">
    <h2 class="fw-bold mb-5 text-info">Lo que opinan nuestros clientes</h2>
    
    <div class="row g-3 justify-content-center">
      @forelse($testimoniosDestacados as $item)
        <div class="col-md-6 col-lg-3 animate__animated animate__fadeInUp">
          <div class="card shadow border-0 h-100">
            <div class="card-body">
              <p class="fst-italic text-dark">“{{ $item->comentario }}”</p>
              <h6 class="fw-bold mb-0 text-primary">{{ $item->nombre }}</h6>
              <small class="text-muted">{{ $item->cargo }} - {{ $item->empresa }}</small>
              <div class="mt-2">
                @for($i = 1; $i <= 5; $i++)
                  <i class="bi bi-star{{ $i <= $item->calificacion ? '-fill text-warning' : '-fill text-secondary' }}"></i>
                @endfor
              </div>
            </div>
          </div>
        </div>
      @empty
        <p class="text-light">Aún no hay testimonios registrados.</p>
      @endforelse
    </div>

    <div class="mt-5">
        <a href="#modalTestimonios" class="btn btn-orange px-4" data-bs-toggle="modal">
            Ver más
        </a>

        <a href="{{ route('servicios') }}#testimonio-form" class="btn btn-orange px-4 ms-3">
            ¿Hacer comentario?
        </a>
    </div>
  </div>
</section>

<!-- Modal testimonios -->
<div class="modal fade" id="modalTestimonios" tabindex="-1" aria-labelledby="modalTestimoniosLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalTestimoniosLabel">Todos los testimonios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">

        <div class="row g-4">
          @forelse($testimoniosRestantes as $item)
            <div class="col-md-6 col-lg-3">
              <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                  <p class="fst-italic">“{{ $item->comentario }}”</p>
                  <h6 class="fw-bold mb-0 text-primary">{{ $item->nombre }}</h6>
                  <small class="text-muted">{{ $item->cargo }} - {{ $item->empresa }}</small>
                  <div class="mt-2">
                    @for($i = 1; $i <= 5; $i++)
                      <i class="bi bi-star{{ $i <= $item->calificacion ? '-fill text-warning' : '-fill text-secondary' }}"></i>
                    @endfor
                  </div>
                </div>
              </div>
            </div>
          @empty
            <p class="text-muted">No hay más testimonios.</p>
          @endforelse
        </div>

        <!-- Paginación -->
        <div class="mt-4 d-flex justify-content-center">
          {{ $testimoniosRestantes->links('pagination::bootstrap-5') }}
        </div>
        
      </div>
    </div>
  </div>
</div>





<!-- section imganes empresas colaoradores-->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-5 animate__fadeInUp">Proyectos Recientes</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <img src="https://sasoftco.com/wp-content/uploads/2022/11/sasoftco_logo_trans-1311x345-1-1024x269.png"  class="img-fluid rounded shadow-sm" alt="Proyecto 1">
      </div>
      <div class="col-md-4">
        <img src="images/logo-crear-system.png" class="img-fluid rounded shadow-sm" alt="Proyecto 2">
      </div>
      <div class="col-md-4">
        <img src="images/logo-crear-system.png" class="img-fluid rounded shadow-sm" alt="Proyecto 3">
      </div>
    </div>
  </div>
</section>


<section class="py-5 animate__animated animate__fadeInUp" style="background: linear-gradient(to bottom, #001f4d, #26c6da);">
  <div class="container-fluid text-center">
    <h2 class="text-white fw-bold mb-5">Aliados que respaldan nuestros servicios</h2>

    <div class="w-100 overflow-hidden position-relative">
      <div id="slider-track" class="d-flex align-items-center gap-5" style="width: max-content; animation: scrollLeft 35s linear infinite;">
        <!-- Aliados SVG -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Red_Hat_logo.svg" alt="Red Hat" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5a/Vmware.svg" alt="VMWare" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/43/Dell_logo_2016.svg" alt="Dell" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/Microsoft_logo.svg" alt="Microsoft" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/Google_2015_logo.svg" alt="Google" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3f/SolarWinds_logo.svg" alt="SolarWinds" style="height: 60px;">
        
        <!-- Duplicados para scroll continuo -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Red_Hat_logo.svg" alt="Red Hat" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5a/Vmware.svg" alt="VMWare" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/43/Dell_logo_2016.svg" alt="Dell" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/Microsoft_logo.svg" alt="Microsoft" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/Google_2015_logo.svg" alt="Google" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3f/SolarWinds_logo.svg" alt="SolarWinds" style="height: 60px;">
      </div>
    </div>
  </div>
</section>
@endsection



