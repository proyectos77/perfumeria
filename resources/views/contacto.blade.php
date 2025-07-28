@extends('layouts.app')


@section('content')

<!-- <div class="position-absolute top-0 start-0 w-100 h-45" 
         style="background: url('{{ asset('images/quienes-somos/quienes-somos2.png') }}') center center / cover no-repeat; width 100%; height 40%
                z-index">
      
</div> -->
  
<section class="py-5 contacto-section">
  <div class="container">
    <div class="row g-4 align-items-start">
      <!-- Formulario -->
      <div class="col-md-7">
        <div class="p-4 rounded bg-formulario shadow">
          <h2 class="text-white mb-4">Formulario de Contacto</h2>

          @if (session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form action="{{ route('contacto.enviar') }}" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="nombre" class="form-label text-white">Nombre</label>
                  <input type="text" name="nombre" class="form-control" required>
              </div>

              <div class="mb-3">
                  <label for="correo" class="form-label text-white">Correo electrónico</label>
                  <input type="email" name="correo" class="form-control" required>
              </div>

              <div class="mb-3">
                  <label for="mensaje" class="form-label text-white">Mensaje</label>
                  <textarea name="mensaje" class="form-control" rows="5" required></textarea>
              </div>

              <div class="form-check mt-4">
                  <input class="form-check-input" type="checkbox" name="acepta_terminos" id="acepta_terminos" required>
                  <label class="form-check-label text-dark" for="acepta_terminos">
                      He leído y acepto los <a href="{{ route('terminos') }}" class="text-primary text-decoration-underline" target="_blank">Términos y Condiciones</a> y la <a href="{{ route('privacidad') }}" class="text-primary text-decoration-underline" target="_blank">Política de Privacidad</a>.
                  </label>

                  @error('acepta_terminos')
                      <div class="invalid-feedback d-block">
                          Debes aceptar los términos y condiciones para continuar.
                      </div>
                  @enderror
              </div>



              <button type="submit" class="btn btn-outline-light px-4">Enviar</button>
          </form>
        </div>
      </div>

      <!-- Cards de contacto -->
      <div class="col-md-5 d-flex flex-column gap-3">
        <div class="p-4 bg-info-card rounded shadow text-white">
          <h5><i class="bi bi-telephone-fill me-2"></i> Teléfono</h5>
          <p class="mb-0">312-492-6898</p>
        </div>

        <div class="p-4 bg-info-card rounded shadow text-white">
          <h5><i class="bi bi-envelope-fill me-2"></i> Correo</h5>
          <p class="mb-0">crearsystem@gmail.com</p>
        </div>

        <!-- Botón de WhatsApp -->
        <a href="https://wa.me/573124926898" target="_blank" class="btn btn-success w-100 rounded-pill shadow d-flex align-items-center justify-content-center gap-2">
          <i class="bi bi-whatsapp fs-5"></i> Escríbenos por WhatsApp
        </a>
      </div>
    </div>
  </div>
</section>

@endsection

