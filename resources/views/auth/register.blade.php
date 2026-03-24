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
                        <i class="bi bi-person-plus"></i>
                        Nuevo acceso
                    </span>
                    <h1 class="auth-showcase__title">Crea una cuenta administrativa con la misma linea visual del proyecto.</h1>
                    <p class="auth-showcase__text">
                        Registra un nuevo usuario para gestionar mensajes, comentarios y el rendimiento del sitio con un acceso controlado.
                    </p>

                    <ul class="auth-showcase__list">
                        <li>
                            <i class="bi bi-person-vcard fs-5"></i>
                            <span>Configura un acceso claro para el equipo que administra contenidos y oportunidades.</span>
                        </li>
                        <li>
                            <i class="bi bi-ui-checks-grid fs-5"></i>
                            <span>Mantiene el flujo de autenticacion limpio, consistente y alineado con la marca.</span>
                        </li>
                        <li>
                            <i class="bi bi-shield-check fs-5"></i>
                            <span>Protege el acceso al panel con credenciales y verificacion del correo.</span>
                        </li>
                    </ul>

                    <div class="auth-showcase__stats">
                        <div>
                            <strong>1 cuenta</strong>
                            <span>Alta rapida</span>
                        </div>
                        <div>
                            <strong>Panel</strong>
                            <span>Gestion central</span>
                        </div>
                        <div>
                            <strong>Control</strong>
                            <span>Acceso autorizado</span>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-lg-7 col-xl-6">
                <div class="auth-panel">
                    <span class="auth-panel__eyebrow">
                        <i class="bi bi-person-badge"></i>
                        Registro
                    </span>
                    <h2 class="auth-panel__title">Crear cuenta</h2>
                    <p class="auth-panel__text">
                        Completa los datos del usuario para habilitar un nuevo acceso administrativo.
                    </p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="auth-field">
                            <label for="name" class="auth-field__label">
                                <i class="bi bi-person"></i>
                                Nombre
                            </label>
                            <div class="auth-field__control">
                                <span class="auth-field__icon"><i class="bi bi-person-fill"></i></span>
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control auth-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Nombre del administrador"
                                    required
                                    autofocus
                                >
                                @error('name')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

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
                                    placeholder="usuario@crearsystem.com"
                                    required
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
                                    placeholder="Crea una contrasena segura"
                                    required
                                    autocomplete="new-password"
                                >
                                @error('password')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="auth-field">
                            <label for="password_confirmation" class="auth-field__label">
                                <i class="bi bi-shield-check"></i>
                                Confirmar contrasena
                            </label>
                            <div class="auth-field__control">
                                <span class="auth-field__icon"><i class="bi bi-check2-circle"></i></span>
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    class="form-control auth-control"
                                    name="password_confirmation"
                                    placeholder="Repite la contrasena"
                                    required
                                    autocomplete="new-password"
                                >
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="auth-submit">
                                <i class="bi bi-person-check"></i>
                                Registrar usuario
                            </button>
                        </div>
                    </form>

                    <p class="auth-helper">
                        Ya tienes una cuenta?
                        <a href="{{ route('login') }}" class="auth-link">Inicia sesion aqui</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
