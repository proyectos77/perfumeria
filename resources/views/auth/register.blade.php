@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    
                    <!-- Título -->
                    <h2 class="text-center mb-4 fw-bold text-primary">
                        <i class="fas fa-user-plus me-2"></i> Registro
                    </h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                <i class="fas fa-user me-1 text-secondary"></i> Nombre
                            </label>
                            <input id="name" type="text" 
                                class="form-control form-control-lg rounded-3 @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Correo -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope me-1 text-secondary"></i> Correo electrónico
                            </label>
                            <input id="email" type="email" 
                                class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                <i class="fas fa-lock me-1 text-secondary"></i> Contraseña
                            </label>
                            <input id="password" type="password" 
                                class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror"
                                name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">
                                <i class="fas fa-lock me-1 text-secondary"></i> Confirmar Contraseña
                            </label>
                            <input id="password_confirmation" type="password" 
                                class="form-control form-control-lg rounded-3"
                                name="password_confirmation" required>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="text-decoration-none small" href="{{ route('login') }}">
                                <i class="fas fa-arrow-left me-1"></i> ¿Ya tienes cuenta?
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg px-4 shadow-sm">
                                <i class="fas fa-user-check me-1"></i> Registrarse
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Texto inferior -->
            <p class="text-center text-muted mt-4 small">
                Al registrarte aceptas nuestros 
                <a href="{{ route('terminos') }}" class="text-decoration-none">Términos y Condiciones</a>.
            </p>
        </div>
    </div>
</div>
@endsection
