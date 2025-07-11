@extends('layouts.app')



@section('content')

<!-- Imagen de fondo a pantalla completa -->


<div class="position-absolute top-0 start-0 w-100 h-45" 
         style="background: url('{{ asset('images/quienes-somos/quienes-somos2.png') }}') center center / cover no-repeat; width: 100%; height: 50%;
                z-index: 0;"></div>

            <br><br><br>   <br><br><br>   <br><br><br>   <br><br><br> <br><br><br>

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



<!-- section, de vista de testimonio de usuario -->
<section id="testimonio-form" class="py-5 bg-white">
  <div class="container" style="max-width: 800px;">
    <h2 class="text-center text-white fw-bold mb-4">Deja tu Comentario</h2>

    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('testimonios.store') }}" class="row g-3 p-4 border rounded shadow-sm bg-light">
        @csrf

        <div class="col-md-6">
            <label for="nombre" class="form-label text-black">Tu nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ej: Juan Pérez" required>
        </div>

        <div class="col-md-6">
            <label for="empresa" class="form-label text-black">Empresa</label>
            <input type="text" name="empresa" class="form-control" placeholder="Ej: SoftTech S.A.S" required>
        </div>

        <div class="col-md-12">
            <label for="cargo" class="form-label text-black">Cargo</label>
            <input type="text" name="cargo" class="form-control" placeholder="Ej: Gerente de Tecnología" required>
        </div>

        <div class="col-md-12">
            <label for="comentario" class="form-label text-black ">Comentario</label>
            <textarea name="comentario" class="form-control" placeholder="¿Qué opinas de nuestro servicio?" rows="4" required></textarea>
        </div>

        <!-- Calificación con estrellas -->
        <div class="col-md-12 text-center">
        <label class="form-label d-block mb-2">Calificación:</label>
        <div class="rating-stars d-flex justify-content-center gap-2">
            @for($i = 1; $i <= 5; $i++)
            <input type="radio" name="calificacion" value="{{ $i }}" id="star{{ $i }}" required hidden>
            <label for="star{{ $i }}" class="fs-3 star-label" style="cursor: pointer;">
                <i class="bi bi-star-fill"></i>
            </label>
            @endfor
        </div>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary px-4">Enviar Testimonio</button>
        </div>
    </form>
  </div>
</section>



@endsection
