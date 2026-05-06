@extends('layouts.app')

@section('body_class', 'auth-body')
@section('main_class', 'site-main auth-main')

@section('content')
<section style="position: relative; min-height: 100vh; display: flex; align-items: center; justify-content: center; overflow: hidden; background: linear-gradient(135deg, rgba(33, 27, 24, 0.92), rgba(58, 42, 35, 0.88)), url('{{ asset('images/logo-pagina.png') }}') center/cover no-repeat fixed;">
    
    <!-- Overlay elegante -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at top right, rgba(199, 154, 91, 0.15), transparent 50%), radial-gradient(circle at bottom left, rgba(244, 231, 223, 0.08), transparent 50%); pointer-events: none;"></div>

    <div class="container" style="position: relative; z-index: 10;">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-xl-4">
                <!-- Badge de Acceso Administrativo -->
                <div style="text-align: center; margin-bottom: 3rem;">
                    <div style="display: inline-flex; align-items: center; gap: 0.75rem; background: rgba(199, 154, 91, 0.15); border: 1px solid rgba(199, 154, 91, 0.3); border-radius: 50px; padding: 0.75rem 1.5rem; margin-bottom: 2rem;">
                        <i class="bi bi-shield-lock" style="color: #c79a5b; font-size: 1.2rem;"></i>
                        <span style="color: #f4e7df; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em;">Acceso Administrativo</span>
                    </div>
                </div>

                <!-- Tarjeta de Login -->
                <div style="background: rgba(251, 248, 244, 0.97); backdrop-filter: blur(10px); border: 1px solid rgba(199, 154, 91, 0.2); border-radius: 16px; padding: 2.5rem; box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);">
                    
                    <div style="text-align: center; margin-bottom: 2rem;">
                        <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 0.5rem;">Inicia Sesión</h2>
                        <p style="color: #75655b; font-size: 0.95rem; margin: 0;">Solo administradores y dueños pueden acceder</p>
                    </div>

                    <x-auth-session-status class="mb-4" :status="session('status')" style="background: rgba(37, 211, 102, 0.1); border-left: 4px solid #25d366; color: #25d366; padding: 1rem; border-radius: 8px;" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div style="margin-bottom: 1.5rem;">
                            <label for="email" style="display: block; color: #211b18; font-weight: 600; font-size: 0.9rem; margin-bottom: 0.5rem;">
                                <i class="bi bi-envelope" style="color: #c79a5b;"></i> Correo Electrónico
                            </label>
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="admin@perfumerjyp.test"
                                required
                                autofocus
                                autocomplete="username"
                                style="border: 1px solid rgba(199, 154, 91, 0.3); border-radius: 8px; padding: 0.75rem 1rem; color: #211b18; font-size: 0.95rem;"
                            >
                            @error('email')
                                <div style="color: #dc3545; font-size: 0.85rem; margin-top: 0.5rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div style="margin-bottom: 1.5rem;">
                            <label for="password" style="display: block; color: #211b18; font-weight: 600; font-size: 0.9rem; margin-bottom: 0.5rem;">
                                <i class="bi bi-lock" style="color: #c79a5b;"></i> Contraseña
                            </label>
                            <input
                                id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="Ingresa tu contraseña"
                                required
                                autocomplete="current-password"
                                style="border: 1px solid rgba(199, 154, 91, 0.3); border-radius: 8px; padding: 0.75rem 1rem; color: #211b18; font-size: 0.95rem;"
                            >
                            @error('password')
                                <div style="color: #dc3545; font-size: 0.85rem; margin-top: 0.5rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Recordar y Olvidé Contraseña -->
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                            <label for="remember_me" style="display: flex; align-items: center; gap: 0.5rem; color: #211b18; font-weight: 500; cursor: pointer;">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember" style="cursor: pointer;">
                                <span>Recordar acceso</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="color: #9c7142; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.3s ease;">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>

                        <!-- Botón Entrar -->
                        <button type="submit" class="btn" style="width: 100%; background: #c79a5b; color: #211b18; border: none; font-weight: 800; padding: 0.85rem 1.5rem; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                            <i class="bi bi-arrow-right-circle"></i>
                            Entrar al Panel
                        </button>
                    </form>

                    <!-- Separador -->
                    <div style="margin: 2rem 0; text-align: center; color: #c9b8ad;">
                        <span style="display: inline-block; padding: 0 1rem; background: rgba(251, 248, 244, 0.97); position: relative;">o</span>
                    </div>

                    <!-- Link a Registro -->
                    <p style="text-align: center; color: #75655b; margin: 0;">
                        ¿No tienes cuenta?
                        <a href="{{ route('register') }}" style="color: #c79a5b; text-decoration: none; font-weight: 700; transition: all 0.3s ease;">
                            Crear acceso de administrador
                        </a>
                    </p>
                </div>

                <!-- Footer Info -->
                <div style="text-align: center; margin-top: 2rem;">
                    <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.85rem; margin: 0;">
                        <i class="bi bi-shield-check" style="color: #c79a5b;"></i> 
                        Este acceso está protegido y solo disponible para administradores autorizados
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .auth-body {
        background: transparent !important;
    }

    .site-main.auth-main {
        background: transparent !important;
    }

    .form-control:focus {
        border-color: #c79a5b !important;
        box-shadow: 0 0 0 0.2rem rgba(199, 154, 91, 0.2) !important;
    }

    .form-check-input:checked {
        background-color: #c79a5b !important;
        border-color: #c79a5b !important;
    }

    .form-check-input:focus {
        border-color: #c79a5b !important;
        box-shadow: 0 0 0 0.2rem rgba(199, 154, 91, 0.2) !important;
    }

    .btn:hover {
        background: #9c7142 !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    a[href*="password.request"]:hover,
    a[href*="register"]:hover {
        color: #9c7142 !important;
    }
</style>
@endsection
