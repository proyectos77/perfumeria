@extends('layouts.app')

@section('content')

<!-- Sección de Misión, Visión, Historia -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <article class="p-4 bg-white shadow rounded h-100 animate__animated animate__fadeInUp card-hover">
          <h3 class="text-primary fw-bold text-center titulo-hover">Misión</h3>
          <p>Nuestra misión es impulsar empresas con soluciones digitales innovadoras y a la medida.</p>
        </article>
      </div>
      <div class="col-md-4">
        <article class="p-4 bg-white shadow rounded h-100 animate__animated animate__fadeInUp card-hover" style="animation-delay: 0.1s;">
          <h3 class="text-primary fw-bold text-center titulo-hover">Visión</h3>
          <p>Ser líderes en tecnología brindando calidad, confianza y resultados excepcionales a nuestros clientes.</p>
        </article>
      </div>
      <div class="col-md-4">
        <article class="p-4 bg-white shadow rounded h-100 animate__animated animate__fadeInUp card-hover" style="animation-delay: 0.2s;">
          <h3 class="text-primary fw-bold text-center titulo-hover">Nuestra Historia</h3>
          <p>Crear System nació con la pasión de transformar ideas en realidades digitales. Descubre cómo hemos crecido contigo.</p>
        </article>
      </div>
    </div>
  </div>
</section>



<!-- <section class="full-screen-img">
  <img src="{{ asset('images/quienes-somos/quienes-somos1.png') }}" alt="Quienes Somos Banner">
</section> -->



<!-- Sección Equipo de Trabajo -->

@php
  $equipo = [
    [
      'nombre' => 'Geovanni Pérez',
      'perfil' => 'Fundador y SEO, crear system',
      'foto' => 'images/equipo/geovanni.png',
      'cv' => 'hoja-vida/Acta_Implementacion_SEO_CrearSystem.pdf'
    ],
    [
      'nombre' => 'María Gómez',
      'perfil' => 'Diseñadora UX/UI',
          'foto' => 'images/equipo/geovanni.png',
      'cv' => 'hoja-vida/Acta_Implementacion_SEO_CrearSystem.pdf'
    ],

    [
      'nombre' => 'María Gómez',
      'perfil' => 'Diseñadora UX/UI',
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
            <button class="btn btn-naranja ver-cv" data-cv="{{ $miembro['cv'] }}">Ver Hoja de Vida</button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="modal fade" id="modalCV" tabindex="-1" aria-hidden="true">
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
</div>



<script>
  document.querySelectorAll('.ver-cv').forEach(button => {
    button.addEventListener('click', function() {
      document.getElementById('cvFrame').src = this.dataset.cv;
      new bootstrap.Modal(document.getElementById('modalCV')).show();
    });
  });
</script>

@endsection
