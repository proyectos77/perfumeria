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
                        <i class="bi bi-life-preserver"></i>
                        Recuperacion
                    </span>
                    <h1 class="auth-showcase__title">Recupera el acceso sin perder la linea profesional del panel.</h1>
                    <p class="auth-showcase__text">
                        Si olvidaste tu contrasena, enviaremos un enlace seguro para que restablezcas tu acceso administrativo.
                    </p>

                    <ul class="auth-showcase__list">
                        <li>
                            <i class="bi bi-envelope-paper-heart fs-5"></i>
                            <span>El sistema te envia un enlace de recuperacion al correo asociado a la cuenta.</span>
                        </li>
                        <li>
                            <i class="bi bi-shield-lock fs-5"></i>
                            <span>El flujo mantiene el acceso protegido y evita cambios manuales inseguros.</span>
                        </li>
                        <li>
                            <i class="bi bi-arrow-repeat fs-5"></i>
                            <span>Retoma rapidamente la administracion del sitio sin salirte del mismo estilo visual.</span>
                        </li>
                    </ul>

                    <div class="auth-showcase__stats">
                        <div>
                            <strong>1 correo</strong>
                            <span>Solicitud de enlace</span>
                        </div>
                        <div>
                            <strong>Seguro</strong>
                            <span>Recuperacion protegida</span>
                        </div>
                        <div>
                            <strong>Rapido</strong>
                            <span>Flujo directo</span>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-lg-7 col-xl-6">
                <div class="auth-panel">
                    <span class="auth-panel__eyebrow">
                        <i class="bi bi-unlock"></i>
                        Restablecer acceso
                    </span>
                    <h2 class="auth-panel__title">Recuperar contrasena</h2>
                    <p class="auth-panel__text">
                        Escribe tu correo y te enviaremos un enlace para crear una nueva contrasena.
                    </p>

                    @if (session('status'))
                        <div class="auth-alert mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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
                                >
                                @error('email')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="auth-submit">
                                <i class="bi bi-send"></i>
                                Enviar enlace
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
