@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">

                    <!-- Título -->
                    <h2 class="text-center mb-4 fw-bold text-primary">
                        <i class="fas fa-sign-in-alt me-2"></i> Iniciar Sesión
                    </h2>

                    <!-- Mensajes de sesión -->
                    <x-auth-session-status class="mb-3" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope me-1 text-secondary"></i> Correo electrónico
                            </label>
                            <input id="email" type="email"
                                class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
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

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input id="remember_me" type="checkbox" 
                                class="form-check-input" name="remember">
                            <label class="form-check-label small" for="remember_me">
                                Recuérdame
                            </label>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none small" href="{{ route('password.request') }}">
                                    <i class="fas fa-key me-1"></i> ¿Olvidaste tu contraseña?
                                </a>
                            @endif

                            <button type="submit" class="btn btn-primary btn-lg px-4 shadow-sm">
                                <i class="fas fa-sign-in-alt me-1"></i> Entrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Enlace a registro -->
            <p class="text-center text-muted mt-4 small">
                ¿No tienes cuenta? 
                <a href="{{ route('register') }}" class="text-decoration-none">Regístrate aquí</a>.
            </p>
        </div>
    </div>
</div>
@endsection
