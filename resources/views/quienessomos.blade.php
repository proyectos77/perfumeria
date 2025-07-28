@extends('layouts.app')

@section('content')

<div class="position-absolute top-0 start-0 w-100 h-45" 
         style="background: url('{{ asset('images/quienes-somos/imagne.gemeni1.png') }}') center center / cover no-repeat; width: 100%; height: 50%;
                z-index: 0;"></div>
            
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- Sección de Misión, Visión, Historia -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <article class="p-4 bg-white shadow rounded h-100 animate__animated animate__fadeInUp card-hover">
          <h3 class="text-primary fw-bold text-center titulo-hover">Misión</h3>
          <p>Nuestra misión es impulsar empresas con soluciones digitales innovadoras y a la medida, optimizando sus operaciones 
            y potenciando su crecimiento en el entorno digital.</p>
        </article>
      </div>
      <div class="col-md-4">
        <article class="p-4 bg-white shadow rounded h-100 animate__animated animate__fadeInUp card-hover" style="animation-delay: 0.1s;">
          <h3 class="text-primary fw-bold text-center titulo-hover">Visión</h3>
          <p>Ser líderes en tecnología, brindando calidad, confianza y resultados excepcionales a nuestros clientes,
            transformando sus ideas en realidades 
            digitales a través de soluciones estratégicas y personalizadas.</p>
        </article>
      </div>
      <div class="col-md-4">
        <article class="p-4 bg-white shadow rounded h-100 animate__animated animate__fadeInUp card-hover" style="animation-delay: 0.2s;">
          <h3 class="text-primary fw-bold text-center titulo-hover">Nuestra Historia</h3>
          <p> Crear System nació con la pasión de transformar ideas en realidades digitales. Desde nuestros inicios, 
            nos hemos dedicado a ofrecer un abanico de servicios tecnológicos, desde el desarrollo web y software a medida hasta 
            la automatización de procesos, creciendo junto a nuestros clientes y adaptándonos a sus necesidades para impulsarlos hacia el éxito. 
            Descubre cómo hemos crecido contigo.</p>
        </article>
      </div>
    </div>
  </div>
</section>



<!-- Sección Equipo de Trabajo -->

<!-- @php
  $equipo = [
    [
      'nombre' => 'Geovanni Pérez',
      'perfil' => 'Fundador y SEO, crear system',
      'foto' => 'images/equipo/geovanni.png',
      'cv' => 'hoja-vida/Acta_Implementacion_SEO_CrearSystem.pdf'
    ],

    // Más miembros...
  ];
@endphp -->


<!-- <section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-5 titulo-zoom">Nuestro Equipo</h2>
    <div class="row g-4">
      @foreach($equipo as $miembro)
      <div class="col-md-4 animate__animated animate__fadeInUp">
        <div class="card border-0 shadow h-100 equipo-card">
          <img src="{{ asset($miembro['foto']) }}" class="card-img-top mx-auto d-block" style="width: 150px; border-radius: 80px" alt="{{ $miembro['nombre'] }}">
          <div class="card-body">
            <h5 class="fw-bold text-primary titulo-zoom">{{ $miembro['nombre'] }}</h5>
            <p class="text-muted">{{ $miembro['perfil'] }}</p>
            <button class="btn btn-naranja ver-cv" data-cv="{{ $miembro['cv'] }}">Ver Hoja de Vida</button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section> -->

<!-- <div class="modal fade" id="modalCV" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hoja de Vida</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" style="height: 80vh; overflow-y: auto;">
        <iframe id="cvFrame" src="" style="width:100%; height:100%; border:none;"></iframe>
      </div>
    </div>
  </div>
</div> -->


<!-- Sección Equipo de Trabajo -->
@php
  $equipo = [
    [
      'nombre' => 'Geovanni Pérez',
      'perfil' => 'Fundador y SEO, crear system',
      'foto' => 'images/equipo/geovanni.png',
      'cv' => 'hoja-vida/Acta_Implementacion_SEO_CrearSystem.pdf'
    ],
    // Más miembros...
  ];
@endphp

<section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-5 titulo-zoom">Nuestro Equipo</h2>
    <div class="row g-4">
      @foreach($equipo as $miembro)
      <div class="col-md-4 animate__animated animate__fadeInUp">
        <div class="card border-0 shadow h-100 equipo-card">
          <img src="{{ asset($miembro['foto']) }}" class="card-img-top mx-auto d-block" style="width: 150px; border-radius: 80px" alt="{{ $miembro['nombre'] }}">
          <div class="card-body">
            <h5 class="fw-bold text-primary titulo-zoom">{{ $miembro['nombre'] }}</h5>
            <p class="text-muted">{{ $miembro['perfil'] }}</p>
            <button class="btn btn-naranja ver-cv" data-cv="{{ $miembro['cv'] }}">Conoce de mí</button>
            <button class="btn btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalHistoria">¿Quieres conocer mi historia?</button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Modal: Ver Hoja de Vida -->
<!-- Modal: Ver Hoja de Vida -->
<div class="modal fade" id="modalCV" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title">Conoce de mí</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body py-4">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-4 text-center mb-4">
              <img src="{{ asset('images/equipo/geovanni.png') }}" class="img-fluid rounded-circle shadow" style="max-width: 200px;" alt="Geovanni Pérez">
              <h4 class="mt-3 text-primary">Geovanni Pérez</h4>
              <p class="text-muted">Fundador & Desarrollador de Software</p>
            </div>
            <div class="col-md-8">
              <h5 class="text-primary">Resumen Profesional</h5>
              <p>
                Estudiante de Ingeniería de Sistemas con experiencia administrativa y habilidades emergentes en desarrollo web, automatización y soluciones a medida. Comprometido con la transformación digital y la mejora continua.
              </p>
              <h5 class="text-primary mt-4">Habilidades Técnicas</h5>
              <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">✔ Desarrollo Web moderno, responsivo y optimizado</li>
                <li class="list-group-item">✔ Mantenimiento de software y soporte técnico</li>
                <li class="list-group-item">✔ Consultoría en transformación digital</li>
                <li class="list-group-item">✔ Integraciones API con CRMs y plataformas externas</li>
                <li class="list-group-item">✔ Automatización de procesos con bots y scripts</li>
              </ul>
              <h5 class="text-primary">Formación Académica</h5>
              <p><strong>Ingeniería de Sistemas</strong> – UNAD (en curso)<br>Formación técnica – SENA</p>
              <!-- <h5 class="text-primary mt-4">Experiencia</h5>
              <p><strong>Ejército Nacional de Colombia</strong><br>Auxiliar Administrativo – Gestión de documentación y procesos internos.</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal: Historia Personal -->
<div class="modal fade" id="modalHistoria" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-body p-5">
        <div class="text-center">
          <img src="{{ asset('images/equipo/geovanni.png') }}" class="rounded-circle shadow mb-4" style="width: 150px;" alt="Geovanni Pérez">
          <h3 class="fw-bold text-primary">Geovanni Pérez</h3>
          <p class="text-muted mb-4">Fundador & Desarrollador de Software</p>
        </div>
        <div class="px-md-4">
          <h5 class="fw-bold text-secondary mb-3">💡 Una historia de propósito, esfuerzo y visión</h5>
          <p>
            Mi camino comenzó sirviendo con compromiso en el <strong>Ejército Nacional de Colombia</strong>, donde desarrollé disciplina, liderazgo y resiliencia. Sin embargo, dentro de mí crecía una pasión: la tecnología.
          </p>
          <p>
            Sin experiencia previa y con recursos limitados, decidí dar el salto: estudié en el <strong>SENA</strong>, aprendiendo fundamentos administrativos y técnicos, y más adelante inicié la carrera de <strong>Ingeniería de Sistemas</strong> en la <strong>UNAD</strong>, que actualmente curso.
          </p>
          <p>
            Compaginé jornadas laborales con noches de aprendizaje, venciendo obstáculos personales y profesionales, siempre impulsado por una meta: <em>convertirme en un desarrollador que transforme realidades</em>.
          </p>
          <p>
            Hoy creo soluciones digitales, integro sistemas, automatizo procesos y acompaño a empresas en su transformación. Lo que empezó como un sueño, es hoy un proyecto de vida con visión, propósito y ambición.
          </p>
          <blockquote class="blockquote text-center my-4">
            <p class="mb-0 fst-italic">“No importa de dónde vienes, sino hasta dónde estás dispuesto a llegar.”</p>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script para cargar CV PDF -->
<script>
  document.querySelectorAll('.ver-cv').forEach(button => {
    button.addEventListener('click', function () {
      new bootstrap.Modal(document.getElementById('modalCV')).show();
    });
  });
</script>


@endsection
