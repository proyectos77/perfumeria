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
                        <i class="bi bi-key"></i>
                        Nueva clave
                    </span>
                    <h1 class="auth-showcase__title">Define una nueva contrasena y recupera el control del panel.</h1>
                    <p class="auth-showcase__text">
                        Usa el enlace recibido por correo para actualizar tu acceso y volver a administrar el sitio con seguridad.
                    </p>

                    <ul class="auth-showcase__list">
                        <li>
                            <i class="bi bi-envelope-check fs-5"></i>
                            <span>El proceso valida el token enviado al correo para proteger el cambio de acceso.</span>
                        </li>
                        <li>
                            <i class="bi bi-lock-fill fs-5"></i>
                            <span>Crea una nueva contrasena para recuperar el control del panel administrativo.</span>
                        </li>
                        <li>
                            <i class="bi bi-speedometer2 fs-5"></i>
                            <span>Vuelve rapido al dashboard sin salirte de la identidad visual de CrearSystem.</span>
                        </li>
                    </ul>
                </aside>
            </div>

            <div class="col-lg-7 col-xl-6">
                <div class="auth-panel">
                    <span class="auth-panel__eyebrow">
                        <i class="bi bi-shield-check"></i>
                        Restablecer
                    </span>
                    <h2 class="auth-panel__title">Crear nueva contrasena</h2>
                    <p class="auth-panel__text">
                        Completa los campos para restablecer tu acceso con una nueva clave.
                    </p>

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
                                    value="{{ old('email', $request->email) }}"
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
                                Nueva contrasena
                            </label>
                            <div class="auth-field__control">
                                <span class="auth-field__icon"><i class="bi bi-key"></i></span>
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control auth-control @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="Define una nueva contrasena"
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
                                <i class="bi bi-check2-circle"></i>
                                Confirmar contrasena
                            </label>
                            <div class="auth-field__control">
                                <span class="auth-field__icon"><i class="bi bi-shield"></i></span>
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    class="form-control auth-control"
                                    name="password_confirmation"
                                    placeholder="Repite la nueva contrasena"
                                    required
                                    autocomplete="new-password"
                                >
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="auth-submit">
                                <i class="bi bi-arrow-repeat"></i>
                                Restablecer acceso
                            </button>
                        </div>
                    </form>

                    <p class="auth-helper">
                        Ya recordaste tu clave?
                        <a href="{{ route('login') }}" class="auth-link">Vuelve al inicio de sesion</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
