@extends('layouts.app')

@section('content')

<div class="position-absolute top-0 start-0 w-100 h-45"
         style="background: url('{{ asset('images/quienes-somos/imagen-gemeni1.png') }}') center center / cover no-repeat; width: 100%; height: 50%;
                z-index: 0;"></div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- Sección de Misión, Visión, Historia -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <article class="p-4 bg-white shadow rounded h-100 animate__animated animate__fadeInUp card-hover">
          <h3 class="text-primary fw-bold text-center titulo-hover">Misión</h3>
          <p style="text-align: justify;">Nuestra misión es impulsar empresas con soluciones digitales innovadoras y a la medida, optimizando sus operaciones
            y potenciando su crecimiento en el entorno digital.</p>
        </article>
      </div>
      <div class="col-md-4">
        <article class="p-4 bg-white shadow rounded h-100 animate__animated animate__fadeInUp card-hover" style="animation-delay: 0.1s;">
          <h3 class="text-primary fw-bold text-center titulo-hover">Visión</h3>
          <p style="text-align: justify;">Ser líderes en tecnología, brindando calidad, confianza y resultados excepcionales a nuestros clientes,
            transformando sus ideas en realidades
            digitales a través de soluciones estratégicas y personalizadas.</p>
        </article>
      </div>
      <div class="col-md-4">
        <article class="p-4 bg-white shadow rounded h-100 animate__animated animate__fadeInUp card-hover" style="animation-delay: 0.2s;">
          <h3 class="text-primary fw-bold text-center titulo-hover">Nuestra Historia</h3>
          <p style="text-align: justify;"> Crear System nació con la pasión de transformar ideas en realidades digitales. Desde nuestros inicios,
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
            <button class="btn btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalHistoria">¿Conocer mi historia?</button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Modal: Ver Hoja de Vida -->
<div class="modal fade modal-elegante" id="modalCV" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-4 overflow-hidden">

      <!-- ENCABEZADO CON FOTO CENTRADA -->
      <div class="modal-header border-0 position-relative p-4 bg-gradient-primary text-white">

        <div class="w-100 text-center">
            <br><br><br>
          <img src="{{ asset('images/equipo/geovanni.png') }}"
               class="foto-modal shadow-lg">
          <h3 class="fw-bold mt-4">Geovanni Pérez</h3>
          <p class="mb-0 opacity-75">Fundador & Desarrollador de Software</p>
        </div>

        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                data-bs-dismiss="modal"></button>
      </div>

      <!-- CONTENIDO -->
      <div class="modal-body p-5">

        <h4 class="titulo-seccion">Resumen Profesional</h4>
        <p class="texto-seccion">
          Estudiante de Ingeniería de Sistemas con experiencia administrativa y habilidades emergentes
          en desarrollo web, automatización y soluciones a medida. Comprometido con la transformación
          digital y la mejora continua.
        </p>

        <h4 class="titulo-seccion mt-4">Habilidades Técnicas</h4>
        <ul class="list-group list-group-flush tarjeta-lista mb-4">
          <li class="list-group-item">✔ Desarrollo Web moderno, responsivo y optimizado</li>
          <li class="list-group-item">✔ Mantenimiento de software y soporte técnico</li>
          <li class="list-group-item">✔ Consultoría en transformación digital</li>
          <li class="list-group-item">✔ Integraciones API con CRMs y plataformas externas</li>
          <li class="list-group-item">✔ Automatización de procesos con bots y scripts</li>
        </ul>

        <h4 class="titulo-seccion mb-3">Formación Académica</h4>

<div class="accordion accordion-flush acordeon-elegante" id="acordeonFormacion">

  <!-- ITEM 1 -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed acordeon-titulo" type="button"
              data-bs-toggle="collapse" data-bs-target="#formacion1">
        🎓 Ingeniería de Sistemas – UNAD
      </button>
    </h2>
    <div id="formacion1" class="accordion-collapse collapse" data-bs-parent="#acordeonFormacion">
      <div class="accordion-body">
        Actualmente cursando Ingeniería de Sistemas en la UNAD, desarrollando habilidades en
        programación, arquitectura de software, análisis de datos y proyectos tecnológicos reales.
      </div>
    </div>
  </div>

  <!-- ITEM 2 -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed acordeon-titulo" type="button"
        data-bs-toggle="collapse" data-bs-target="#formacion2">
        📘 Diplomado en Gerencia de Proyectos – Universidad del Rosario
      </button>
    </h2>
    <div id="formacion2" class="accordion-collapse collapse" data-bs-parent="#acordeonFormacion">
      <div class="accordion-body">
        Formación en planeación estratégica, riesgos, cronogramas, metodologías PMI
        y liderazgo de equipos en proyectos corporativos.
      </div>
    </div>
  </div>

  <!-- ITEM 3 -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed acordeon-titulo" type="button"
              data-bs-toggle="collapse" data-bs-target="#formacion3">
        🔐Diplomado Seguridad de la Información & Ciberseguridad – Universidad del Rosario
      </button>
    </h2>
    <div id="formacion3" class="accordion-collapse collapse" data-bs-parent="#acordeonFormacion">
      <div class="accordion-body">
        Auditor Líder en SGSI, con formación en ISO 27001, gestión de riesgos, medidas de
        seguridad, ciberdefensa y análisis de vulnerabilidades.
      </div>
    </div>
  </div>

  <!-- ITEM 4 -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed acordeon-titulo" type="button"
              data-bs-toggle="collapse" data-bs-target="#formacion4">
        💻 Diplomado PHP & JAVA – Politécnico Colombiano
      </button>
    </h2>
    <div id="formacion4" class="accordion-collapse collapse" data-bs-parent="#acordeonFormacion">
      <div class="accordion-body">
        Formación técnica en programación backend, estructura de datos, programación orientada
        a objetos y desarrollo web con tecnologías modernas.
      </div>
    </div>
  </div>


  <!-- ITEM 5 -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed acordeon-titulo" type="button"
              data-bs-toggle="collapse" data-bs-target="#formacion5">
        💻 He participado en programas de emprendimiento e innovación de la UNAD,
        enfocados en acelerar proyectos
      </button>
    </h2>
    <div id="formacion5" class="accordion-collapse collapse" data-bs-parent="#acordeonFormacion">
      <div class="accordion-body">
        Soy emprendedor en desarrollo de soluciones, con formación en innovación y aceleración de emprendimientos por la UNAD.
      </div>
    </div>
  </div>

</div>


      </div>
    </div>
  </div>
</div>


<!-- Modal: Historia Personal -->
<div class="modal fade modal-elegante" id="modalHistoria" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-4 overflow-hidden">

      <!-- HEADER -->
      <div class="modal-header border-0 position-relative p-4 bg-gradient-success text-white">

        <div class="w-100 text-center">
            <br><br><br>
          <img src="{{ asset('images/equipo/geovanni.png') }}"
               class="foto-modal shadow-lg">
          <h3 class="fw-bold mt-4">Geovanni Pérez</h3>
          <p class="mb-0 opacity-75">Fundador & Desarrollador de Software</p>
        </div>
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                data-bs-dismiss="modal"></button>
      </div>

      <!-- BODY -->
      <div class="modal-body p-5">

        <h4 class="titulo-seccion">Una historia de propósito</h4>

        <p class="texto-seccion">
          Mi camino comenzó sirviendo en el
          <strong>Ejército Nacional de Colombia</strong>, donde desarrollé disciplina y liderazgo.
        </p>

        <p class="texto-seccion">
          A pesar de los desafíos, decidí seguir mi pasión: la tecnología. Estudié en el
          <strong>SENA</strong>, luego inicié <strong>Ingeniería de Sistemas</strong> en la UNAD.
        </p>

        <p class="texto-seccion">
          Entre noches de estudio y trabajo constante, descubrí que podía transformar ideas en soluciones reales.
        </p>

        <blockquote class="blockquote text-center mt-4">
          <p class="fst-italic" style="color: red"> <strong>“No importa de dónde vienes, sino hasta dónde estás dispuesto a llegar.”</strong></p>
        </blockquote>

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
