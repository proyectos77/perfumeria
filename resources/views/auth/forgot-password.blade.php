@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">

                    <!-- Título -->
                    <h2 class="fw-bold text-center text-primary mb-3">
                        <i class="fas fa-key me-2"></i> ¿Olvidaste tu contraseña?
                    </h2>
                    <p class="text-muted text-center mb-4">
                        No te preocupes. Ingresa tu correo y te enviaremos un enlace para restablecer tu contraseña.
                    </p>

                    <!-- Estado de sesión -->
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope me-1 text-secondary"></i> Correo electrónico
                            </label>
                            <input id="email" type="email"
                                   class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                <i class="fas fa-paper-plane me-1"></i> Enviar enlace de recuperación
                            </button>
                        </div>
                    </form>

                    <!-- Enlace de regreso -->
                    <p class="text-center text-muted mt-4 small">
                        ¿Ya recordaste tu contraseña?
                        <a href="{{ route('login') }}" class="text-decoration-none">Inicia sesión aquí</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
