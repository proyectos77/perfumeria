@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">

                    <!-- Título -->
                    <h2 class="fw-bold text-center text-primary mb-3">
                        <i class="fas fa-shield-alt me-2"></i> Confirmar Contraseña
                    </h2>
                    <p class="text-muted text-center mb-4">
                        Esta es un área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.
                    </p>

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                <i class="fas fa-lock me-1 text-secondary"></i> Contraseña
                            </label>
                            <input id="password" type="password"
                                   class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                <i class="fas fa-check-circle me-1"></i> Confirmar
                            </button>
                        </div>
                    </form>

                    <!-- Enlace de regreso -->
                    <p class="text-center text-muted mt-4 small">
                        ¿No eres tú?  
                        <a href="{{ route('logout') }}" class="text-decoration-none">Cerrar sesión</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
