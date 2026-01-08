@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">

                    <!-- Título -->
                    <h2 class="text-center mb-4 fw-bold text-primary">
                        <i class="fas fa-unlock-alt me-2"></i> Restablecer Contraseña
                    </h2>

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Token de recuperación -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope me-1 text-secondary"></i> Correo electrónico
                            </label>
                            <input id="email" type="email"
                                class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nueva Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                <i class="fas fa-lock me-1 text-secondary"></i> Nueva Contraseña
                            </label>
                            <input id="password" type="password"
                                class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-semibold">
                                <i class="fas fa-check-circle me-1 text-secondary"></i> Confirmar Contraseña
                            </label>
                            <input id="password_confirmation" type="password"
                                class="form-control form-control-lg rounded-3"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <!-- Botón -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                <i class="fas fa-sync-alt me-1"></i> Restablecer Contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Enlace de regreso -->
            <p class="text-center text-muted mt-4 small">
                ¿Recordaste tu contraseña? 
                <a href="{{ route('login') }}" class="text-decoration-none">Inicia sesión aquí</a>.
            </p>
        </div>
    </div>
</div>
@endsection
