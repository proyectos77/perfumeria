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
                <!-- Badge de Recuperación -->
                <div style="text-align: center; margin-bottom: 3rem;">
                    <div style="display: inline-flex; align-items: center; gap: 0.75rem; background: rgba(199, 154, 91, 0.15); border: 1px solid rgba(199, 154, 91, 0.3); border-radius: 50px; padding: 0.75rem 1.5rem; margin-bottom: 2rem;">
                        <i class="bi bi-key" style="color: #c79a5b; font-size: 1.2rem;"></i>
                        <span style="color: #f4e7df; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em;">Recuperar Contraseña</span>
                    </div>
                </div>

                <!-- Logo -->
                <div style="text-align: center; margin-bottom: 3rem;">
                    <div style="width: 120px; height: 120px; margin: 0 auto 2rem; background: rgba(255, 250, 245, 0.95); border: 2px solid rgba(199, 154, 91, 0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);">
                        <img src="{{ asset('images/logo-pagina.png') }}" alt="PERFUMERY J & P" style="width: 90%; height: 90%; object-fit: contain;">
                    </div>
                    <h1 style="color: #fff; font-family: 'Playfair Display', Georgia, serif; font-size: 2rem; font-weight: 800; margin-bottom: 0.5rem;">PERFUMERY J &amp; P</h1>
                    <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.95rem;">Panel Administrativo</p>
                </div>

                <!-- Tarjeta de Recuperación -->
                <div style="background: rgba(251, 248, 244, 0.97); backdrop-filter: blur(10px); border: 1px solid rgba(199, 154, 91, 0.2); border-radius: 16px; padding: 2.5rem; box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);">
                    
                    <div style="text-align: center; margin-bottom: 2rem;">
                        <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 0.5rem;">Recuperar Contraseña</h2>
                        <p style="color: #75655b; font-size: 0.95rem; margin: 0;">Te enviaremos un enlace seguro a tu correo</p>
                    </div>

                    @if (session('status'))
                        <div style="background: rgba(37, 211, 102, 0.1); border-left: 4px solid #25d366; color: #25d366; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem;">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email -->
                        <div style="margin-bottom: 2rem;">
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
                                style="border: 1px solid rgba(199, 154, 91, 0.3); border-radius: 8px; padding: 0.75rem 1rem; color: #211b18; font-size: 0.95rem;"
                            >
                            @error('email')
                                <div style="color: #dc3545; font-size: 0.85rem; margin-top: 0.5rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón Enviar -->
                        <button type="submit" class="btn" style="width: 100%; background: #c79a5b; color: #211b18; border: none; font-weight: 800; padding: 0.85rem 1.5rem; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                            <i class="bi bi-send"></i>
                            Enviar Enlace de Recuperación
                        </button>
                    </form>

                    <!-- Separador -->
                    <div style="margin: 2rem 0; text-align: center; color: #c9b8ad;">
                        <span style="display: inline-block; padding: 0 1rem; background: rgba(251, 248, 244, 0.97); position: relative;">o</span>
                    </div>

                    <!-- Link a Login -->
                    <p style="text-align: center; color: #75655b; margin: 0;">
                        ¿Ya recuerdas tu contraseña?
                        <a href="{{ route('login') }}" style="color: #c79a5b; text-decoration: none; font-weight: 700; transition: all 0.3s ease;">
                            Inicia sesión aquí
                        </a>
                    </p>
                </div>

                <!-- Footer Info -->
                <div style="text-align: center; margin-top: 2rem;">
                    <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.85rem; margin: 0;">
                        <i class="bi bi-shield-check" style="color: #c79a5b;"></i> 
                        Proceso seguro y protegido
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

    .btn:hover {
        background: #9c7142 !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    a[href*="login"]:hover {
        color: #9c7142 !important;
    }
</style>
@endsection
