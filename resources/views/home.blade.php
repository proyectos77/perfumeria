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


<header class="hero-section position-relative text-white" style="height: 100vh; margin-top: 0; padding: 0;">
    {{-- Imagen de fondo --}}
    {{-- 
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: url('{{ asset('images/home/imagen-home.png') }}') center center / cover no-repeat;
                z-index: 0;"></div> 
    --}}

    {{-- Capa oscura para contraste --}}
    {{-- 
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div> 
    --}}

    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center position-relative" style="z-index: 2;">
        <article>
            <h1 class="display-2 fw-bold mb-4 animate__animated animate__fadeInDown">
                Innovación Digital a tu Medida: Haz Crecer tu Negocio.
            </h1>
            <p class="lead mb-4 animate__animated animate__fadeInUp">
                Soluciones tecnológicas a medida para impulsar el crecimiento y la eficiencia de tu empresa.
            </p>
            <a href="{{ route('servicios') }}" 
               class="btn btn-lg text-white" 
               style="background-color: #f57c00; border: none;">
               Ver servicios
            </a>
        </article>
    </div>
</header>

<!--  nuestros servicios -->
<!-- Nuestros Servicios -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="text-primary fw-bold">Nuestros Servicios</h2>
      <p class="text-muted fs-5">Soluciones digitales a la medida para impulsar tu negocio</p>
    </div>

    <div class="row g-4">
      <!-- 1. Desarrollo Web -->
      <div class="col-md-4 col-sm-6">
        <div class="card-servicio">
          <div class="card-servicio-body text-center p-4">
            <i class="bi bi-code-slash display-4 text-primary mb-3"></i>
            <h5 class="fw-semibold">Desarrollo Web</h5>
            <p class="text-muted">Sitios modernos, responsivos y optimizados para buscadores.</p>
          </div>
          <div class="card-servicio-barra"></div>
        </div>
      </div>

      <!-- 2. Mantenimiento -->
      <div class="col-md-4 col-sm-6">
        <div class="card-servicio">
          <div class="card-servicio-body text-center p-4">
            <i class="bi bi-gear display-4 text-warning mb-3"></i>
            <h5 class="fw-semibold">Mantenimiento de Software</h5>
            <p class="text-muted">Actualización, soporte y mejoras continuas a tus sistemas.</p>
          </div>
          <div class="card-servicio-barra"></div>
        </div>
      </div>

      <!-- 3. Consultoría -->
      <div class="col-md-4 col-sm-6">
        <div class="card-servicio">
          <div class="card-servicio-body text-center p-4">
            <i class="bi bi-people-fill display-4 text-info mb-3"></i>
            <h5 class="fw-semibold">Consultoría TI</h5>
            <p class="text-muted">Asesoría estratégica para transformación digital y procesos.</p>
          </div>
          <div class="card-servicio-barra"></div>
        </div>
      </div>

      <!-- 4. Software a Medida -->
      <div class="col-md-4 col-sm-6">
        <div class="card-servicio">
          <div class="card-servicio-body text-center p-4">
            <i class="bi bi-file-code-fill display-4 text-secondary mb-3"></i>
            <h5 class="fw-semibold">Software a Medida</h5>
            <p class="text-muted">Soluciones hechas desde cero, según tus requerimientos exactos.</p>
          </div>
          <div class="card-servicio-barra"></div>
        </div>
      </div>

      <!-- 5. Integraciones API -->
      <div class="col-md-4 col-sm-6">
        <div class="card-servicio">
          <div class="card-servicio-body text-center p-4">
            <i class="bi bi-plug display-4 text-danger mb-3"></i>
            <h5 class="fw-semibold">Integraciones API</h5>
            <p class="text-muted">Conectamos tu sistema con pasarelas, CRMs y plataformas externas.</p>
          </div>
          <div class="card-servicio-barra"></div>
        </div>
      </div>

      <!-- 6. Automatización -->
      <div class="col-md-4 col-sm-6">
        <div class="card-servicio">
          <div class="card-servicio-body text-center p-4">
            <i class="bi bi-robot display-4 text-dark mb-3"></i>
            <h5 class="fw-semibold">Automatización de Procesos</h5>
            <p class="text-muted">Ahorra tiempo con bots, scripts o flujos automáticos para tu empresa.</p>
          </div>
          <div class="card-servicio-barra"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 overflow-hidden" 
         style="background: linear-gradient(to bottom, #001f4d, #26c6da);"
         role="region" 
         aria-label="Galería de imágenes destacadas">

  <div class="container text-center">
    <!-- <h2 class="text-white fw-bold mb-5 animate__animated animate__fadeInDown">Nuestros aliados y colaboraciones</h2> -->

    <div class="position-relative w-100" style="overflow-x: hidden;">
      <div id="circularSlider" class="d-flex align-items-center gap-4 py-2" 
           style="width: max-content; animation: scrollLeft 40s linear infinite;">
        
        @php
          $imagenes = [
            ['src' => asset('images/home/imagen-home1.png'), 'alt' => 'Aliado estratégico 1', 'link' => 'https://ejemplo1.com'],
            ['src' => asset('images/home/imagen-home2.png'), 'alt' => 'Aliado estratégico 2', 'link' => 'https://ejemplo2.com'],
            ['src' => asset('images/quienes-somos/quienes-somos1.png'), 'alt' => 'Aliado estratégico 3', 'link' => 'https://ejemplo3.com'],
            ['src' => asset('images/home/imagen-home3.png'), 'alt' => 'Aliado estratégico 4', 'link' => 'https://ejemplo4.com'],
            ['src' => asset('images/home/imagen-home2.png'), 'alt' => 'Aliado estratégico 1', 'link' => 'https://ejemplo1.com'],
           ['src' => asset('images/quienes-somos/quienes-somos2.png'),  'alt' => 'Aliado estratégico 2', 'link' => 'https://ejemplo2.com'],
          ];
        @endphp

        @foreach($imagenes as $img)
          <a href="{{ $img['link'] }}" target="_blank" class="text-decoration-none" role="listitem">
            <div class="bg-white rounded-circle overflow-hidden shadow img-hover p-2"
                 style="width: 230px; height: 230px; transition: all 0.3s;">
              <img src="{{ $img['src'] }}" alt="{{ $img['alt'] }}" class="img-fluid w-100 h-100 object-fit-cover rounded-circle" loading="lazy">
            </div>
          </a>
        @endforeach

      </div>
    </div>
  </div>
</section>




<!-- ¿Por qué elegir Crear System? -->
<section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="mb-5 text-primary fw-bold animate__animated animate__fadeInUp">
      ¿Por qué elegir <span class="text-gradient">Crear System</span>?
    </h2>

    <div class="row g-4">
      <!-- 1 -->
      <div class="col-md-4 col-sm-6">
        <div class="card-cascada shadow-sm animate__animated animate__fadeInUp">
          <div class="card-cuerpo text-center p-4">
            <i class="bi bi-lightning-charge-fill display-4 text-warning mb-3"></i>
            <h5 class="fw-semibold">Velocidad y Rendimiento</h5>
            <p class="text-muted">Creamos páginas web que cargan rápido, optimizadas para motores de búsqueda como Google.</p>
          </div>
          <div class="card-borde-inferior"></div>
        </div>
      </div>

      <!-- 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="card-cascada shadow-sm animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
          <div class="card-cuerpo text-center p-4">
            <i class="bi bi-laptop-fill display-4 text-success mb-3"></i>
            <h5 class="fw-semibold">Diseño 100% Adaptable</h5>
            <p class="text-muted">Tu sitio se verá increíble en computadoras, móviles y tablets, sin perder funcionalidad ni estética.</p>
          </div>
          <div class="card-borde-inferior"></div>
        </div>
      </div>

      <!-- 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="card-cascada shadow-sm animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
          <div class="card-cuerpo text-center p-4">
            <i class="bi bi-shield-lock-fill display-4 text-info mb-3"></i>
            <h5 class="fw-semibold">Seguridad Profesional</h5>
            <p class="text-muted">Cifrado moderno, buenas prácticas y protección contra ataques para mantener tu información segura.</p>
          </div>
          <div class="card-borde-inferior"></div>
        </div>
      </div>

      <!-- 4 -->
      <div class="col-md-4 col-sm-6">
        <div class="card-cascada shadow-sm animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
          <div class="card-cuerpo text-center p-4">
            <i class="bi bi-headset display-4 text-primary mb-3"></i>
            <h5 class="fw-semibold">Soporte Continuo</h5>
            <p class="text-muted">Te acompañamos. Brindamos soporte técnico eficiente cuando más lo necesitas.</p>
          </div>
          <div class="card-borde-inferior"></div>
        </div>
      </div>

      <!-- 5 -->
      <div class="col-md-4 col-sm-6">
        <div class="card-cascada shadow-sm animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
          <div class="card-cuerpo text-center p-4">
            <i class="bi bi-sliders2-vertical display-4 text-danger mb-3"></i>
            <h5 class="fw-semibold">Soluciones a la Medida</h5>
            <p class="text-muted">Nos adaptamos a tus necesidades. Desde startups hasta empresas consolidadas.</p>
          </div>
          <div class="card-borde-inferior"></div>
        </div>
      </div>

      <!-- 6 -->
      <div class="col-md-4 col-sm-6">
        <div class="card-cascada shadow-sm animate__animated animate__fadeInUp" style="animation-delay: 0.5s;">
          <div class="card-cuerpo text-center p-4">
            <i class="bi bi-bar-chart-line-fill display-4 text-secondary mb-3"></i>
            <h5 class="fw-semibold">Resultados Reales</h5>
            <p class="text-muted">Creamos proyectos orientados a generar leads, ventas o posicionamiento real para tu empresa.</p>
          </div>
          <div class="card-borde-inferior"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sección: Trabaja con nosotros -->

<div class="fullscreen-wrapper">
  <section class="seccion-hero text-white position-relative">
    <div class="hero-overlay position-absolute w-100 h-100 top-0 start-0"></div>

    <div class="caja-llamada text-center position-relative z-1">
      <h2 class="mb-4 fw-bold animate__animated animate__pulse">¿Listo para impulsar tu proyecto?</h2>
      <p class="mb-4">Hablemos de cómo transformar tu idea en una solución real.</p>

      <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
        <a href="{{ route('contacto') }}" class="btn btn-lg text-white px-4" style="background-color: #f57c00; border: none;">
          Contáctanos ahora
        </a>
        <a href="https://wa.me/573124926898" target="_blank" class="btn btn-outline-light btn-lg d-flex align-items-center">
          <i class="bi bi-whatsapp me-2 fs-4" style="color: #f57c00;"></i> Escríbenos por WhatsApp
        </a>
      </div>
    </div>
  </section>
</div>



<!-- section trabajo con nosotros 
<!-- <section class="py-5 bg-primary text-white text-center">
  <div class="container">
    <h2 class="mb-4 fw-bold animate__animated animate__pulse">¿Listo para impulsar tu proyecto?</h2>
    <p class="mb-4">Hablemos de cómo transformar tu idea en una solución real.</p>

    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
      
      <!-- Botón principal 
      <a href="{{ route('contacto') }}" 
         class="btn btn-lg text-white" 
         style="background-color: #f57c00; border: none;">
        Contáctanos ahora
      </a>
      
      <!-- WhatsApp 
      <a href="https://wa.me/573124926898" target="_blank" 
         class="btn btn-outline-light btn-lg d-flex align-items-center">
        <i class="bi bi-whatsapp me-2 fs-4" style="color: #f57c00;"></i> 
        Escríbenos por WhatsApp
      </a>

    </div>
  </div>
</section> -->
<br><br>


<!-- section tesnimonios -->
<section class="py-5" >
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
        <p class="text-light">Aún no hay comentarios registrados.</p>
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

  <!-- Modal testimonios -->
<div class="modal fade" id="modalTestimonios" tabindex="-1" aria-labelledby="modalTestimoniosLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalTestimoniosLabel">Todos los comentarios</h5>
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
</section>


<!-- section imganes empresas colaoradores-->
<!-- <section class="py-5 bg-light">
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
</section> -->
<br><br>
<!-- <section class="py-5" style="background: linear-gradient(to bottom, #001f4d, #26c6da);">
  <div class="container-fluid text-center">
    <h2 class="text-white fw-bold mb-5">Aliados que respaldan nuestros servicios</h2>

    <article class="mx-auto px-3 py-3 rounded-pill bg-white shadow-lg position-relative overflow-hidden" style="max-width: 95%; height: 100px;">
      <div id="slider-track" class="d-flex align-items-center gap-5" style="width: max-content; animation: scrollLeft 40s linear infinite;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Red_Hat_logo.svg" alt="Red Hat" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5a/Vmware.svg" alt="VMWare" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/43/Dell_logo_2016.svg" alt="Dell" style="height: 60px;">
        <img src="images/logo-crear-system-4.png" alt="Microsoft" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/Google_2015_logo.svg" alt="Google" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3f/SolarWinds_logo.svg" alt="SolarWinds" style="height: 60px;">
        
         Duplicados
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Red_Hat_logo.svg" alt="Red Hat" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5a/Vmware.svg" alt="VMWare" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/43/Dell_logo_2016.svg" alt="Dell" style="height: 60px;">
        <img src="images/logo-crear-system-4.png" alt="Microsoft" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/Google_2015_logo.svg" alt="Google" style="height: 60px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3f/SolarWinds_logo.svg" alt="SolarWinds" style="height: 60px;">
      </div>
    </article>
  </div>


  CTA final -->
    <!-- <div class="mt-5">
      <a href="{{ route('contacto') }}" class="btn btn-light btn-lg text-primary fw-bold shadow-sm">
        ¿Quieres ser nuestro aliado?
</section> -->

@endsection



