@extends('layouts.app')



@section('content')

<div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: url('{{ asset('images/home/designer.png') }}') center center / cover no-repeat;
                z-index: 0;"></div> 

                


<!--  nuestros servicios -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-primary fw-bold">Nuestros Servicios</h2>
            <p class="text-muted fs-5">Soluciones digitales a la medida para impulsar tu negocio</p>
        </div>

        <div class="row g-4">
            <!-- 1. Desarrollo Web -->
            <div class="col-md-4 animate__animated animate__fadeInUp" >
                <div class="card h-100 shadow-sm border-0 card-hover" >
                    <div class="card-body text-center">
                        <i class="bi bi-code-slash display-4 text-primary mb-3"></i>
                        <h5 class="card-title" >Desarrollo Web</h5>
                        <p class="card-text">Sitios modernos, responsivos y optimizados para buscadores.</p>
                    </div>
                </div>
            </div>
            <!-- 2. Apps móviles -->
            <!-- <div class="col-md-4 animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body text-center">
                        <i class="bi bi-phone display-4 text-success mb-3"></i>
                        <h5 class="card-title">Aplicaciones Móviles</h5>
                        <p class="card-text">Apps intuitivas para Android y iOS, rápidas y seguras.</p>
                    </div>
                </div>
            </div> -->
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


<!-- section, de vista de testimonio de usuario -->
<section id="testimonio-form" class="py-5 bg-white">
  <div class="container" style="max-width: 800px;">
    <h2 class="text-center text-primary fw-bold mb-4">Deja tu testimonio</h2>

    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('testimonios.store') }}" class="row g-3 p-4 border rounded shadow-sm bg-light">
        @csrf

        <div class="col-md-6">
            <label for="nombre" class="form-label">Tu nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ej: Juan Pérez" required>
        </div>

        <div class="col-md-6">
            <label for="empresa" class="form-label">Empresa</label>
            <input type="text" name="empresa" class="form-control" placeholder="Ej: SoftTech S.A.S" required>
        </div>

        <div class="col-md-12">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" name="cargo" class="form-control" placeholder="Ej: Gerente de Tecnología" required>
        </div>

        <div class="col-md-12">
            <label for="comentario" class="form-label">Comentario</label>
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
