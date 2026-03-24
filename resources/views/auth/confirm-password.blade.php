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
                        Confirmacion segura
                    </span>
                    <h1 class="auth-showcase__title">Protege las acciones sensibles con una validacion adicional.</h1>
                    <p class="auth-showcase__text">
                        Antes de continuar, confirma tu contrasena para mantener la administracion del sitio bajo un acceso seguro.
                    </p>

                    <ul class="auth-showcase__list">
                        <li>
                            <i class="bi bi-person-lock fs-5"></i>
                            <span>Este paso confirma que quien opera el panel sigue siendo el usuario autenticado.</span>
                        </li>
                        <li>
                            <i class="bi bi-shield-check fs-5"></i>
                            <span>Refuerza la seguridad al entrar a secciones sensibles o acciones protegidas.</span>
                        </li>
                        <li>
                            <i class="bi bi-building-lock fs-5"></i>
                            <span>Mantiene el control interno del proyecto con un flujo mas profesional.</span>
                        </li>
                    </ul>
                </aside>
            </div>

            <div class="col-lg-7 col-xl-6">
                <div class="auth-panel">
                    <span class="auth-panel__eyebrow">
                        <i class="bi bi-lock"></i>
                        Confirmar acceso
                    </span>
                    <h2 class="auth-panel__title">Validar contrasena</h2>
                    <p class="auth-panel__text">
                        Esta zona requiere una confirmacion extra antes de continuar.
                    </p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="auth-field">
                            <label for="password" class="auth-field__label">
                                <i class="bi bi-key"></i>
                                Contrasena actual
                            </label>
                            <div class="auth-field__control">
                                <span class="auth-field__icon"><i class="bi bi-shield"></i></span>
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control auth-control @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="Confirma tu contrasena"
                                    required
                                    autocomplete="current-password"
                                >
                                @error('password')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="auth-submit">
                                <i class="bi bi-check2-circle"></i>
                                Confirmar identidad
                            </button>
                        </div>
                    </form>

                    <div class="auth-inline-actions mt-4">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4 fw-semibold">Volver</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold">Cerrar sesion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
