@extends('layouts.app')

@section('body_class', 'auth-body')
@section('main_class', 'site-main auth-main')

@section('content')
<section class="auth-shell">
    <div class="container auth-shell__container">
        <div class="row g-4 align-items-stretch justify-content-center">
            <div class="col-lg-5">
                <aside class="auth-showcase">
                    <span class="auth-badge">
                        <i class="bi bi-shield-lock"></i>
                        Acceso interno
                    </span>
                    <h1 class="auth-showcase__title">Gestiona CrearSystem con una experiencia clara y profesional.</h1>
                    <p class="auth-showcase__text">
                        Ingresa al panel para revisar mensajes, comentarios y el comportamiento comercial del sitio desde un solo lugar.
                    </p>

                    <ul class="auth-showcase__list">
                        <li>
                            <i class="bi bi-graph-up-arrow fs-5"></i>
                            <span>Consulta el dashboard administrativo con metricas de visitas, mensajes y conversion.</span>
                        </li>
                        <li>
                            <i class="bi bi-chat-square-text fs-5"></i>
                            <span>Modera comentarios y revisa el flujo de contactos con una interfaz mas ordenada.</span>
                        </li>
                        <li>
                            <i class="bi bi-stars fs-5"></i>
                            <span>Mantiene la misma identidad visual elegante y consistente con el resto del sitio.</span>
                        </li>
                    </ul>

                    <div class="auth-showcase__stats">
                        <div>
                            <strong>24/7</strong>
                            <span>Acceso al panel</span>
                        </div>
                        <div>
                            <strong>1 vista</strong>
                            <span>Control centralizado</span>
                        </div>
                        <div>
                            <strong>Seguro</strong>
                            <span>Ingreso autenticado</span>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-lg-7 col-xl-6">
                <div class="auth-panel">
                    <span class="auth-panel__eyebrow">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Bienvenido
                    </span>
                    <h2 class="auth-panel__title">Inicia sesion</h2>
                    <p class="auth-panel__text">
                        Accede con tu correo y contrasena para entrar al panel administrativo de CrearSystem.
                    </p>

                    <x-auth-session-status class="mb-4 auth-alert" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="auth-field">
                            <label for="email" class="auth-field__label">
                                <i class="bi bi-envelope"></i>
                                Correo electronico
                            </label>
                            <div class="auth-field__control">
                                <span class="auth-field__icon"><i class="bi bi-at"></i></span>
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control auth-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="admin@crearsystem.com"
                                    required
                                    autofocus
                                    autocomplete="username"
                                >
                                @error('email')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="auth-field">
                            <label for="password" class="auth-field__label">
                                <i class="bi bi-lock"></i>
                                Contrasena
                            </label>
                            <div class="auth-field__control">
                                <span class="auth-field__icon"><i class="bi bi-key"></i></span>
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control auth-control @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="Ingresa tu contrasena"
                                    required
                                    autocomplete="current-password"
                                >
                                @error('password')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="auth-actions">
                            <label for="remember_me" class="auth-check">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <span>Recordar acceso</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="auth-link" href="{{ route('password.request') }}">
                                    Olvidaste tu contrasena?
                                </a>
                            @endif
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="auth-submit">
                                <i class="bi bi-arrow-right-circle"></i>
                                Entrar al panel
                            </button>
                        </div>
                    </form>

                    <p class="auth-helper">
                        No tienes cuenta?
                        <a href="{{ route('register') }}" class="auth-link">Crea tu acceso aqui</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
