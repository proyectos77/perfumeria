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
                        <i class="bi bi-envelope-check"></i>
                        Verificacion
                    </span>
                    <h1 class="auth-showcase__title">Activa el acceso con una verificacion de correo clara y elegante.</h1>
                    <p class="auth-showcase__text">
                        Confirma tu direccion de correo para completar el alta del usuario y asegurar el acceso administrativo.
                    </p>

                    <ul class="auth-showcase__list">
                        <li>
                            <i class="bi bi-send-check fs-5"></i>
                            <span>Recibes un enlace de verificacion para activar correctamente la cuenta creada.</span>
                        </li>
                        <li>
                            <i class="bi bi-incognito fs-5"></i>
                            <span>Evita accesos incompletos o correos registrados sin validacion real.</span>
                        </li>
                        <li>
                            <i class="bi bi-ui-checks fs-5"></i>
                            <span>Todo el flujo mantiene el mismo tono visual premium del proyecto.</span>
                        </li>
                    </ul>
                </aside>
            </div>

            <div class="col-lg-7 col-xl-6">
                <div class="auth-panel">
                    <span class="auth-panel__eyebrow">
                        <i class="bi bi-envelope-open"></i>
                        Verificar correo
                    </span>
                    <h2 class="auth-panel__title">Confirma tu email</h2>
                    <p class="auth-panel__text">
                        Antes de empezar, revisa tu correo y haz clic en el enlace de verificacion que te enviamos.
                    </p>

                    @if (session('status') == 'verification-link-sent')
                        <div class="auth-alert mb-4">
                            Se envio un nuevo enlace de verificacion a tu correo electronico.
                        </div>
                    @endif

                    <div class="auth-inline-actions">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="auth-submit">
                                <i class="bi bi-send"></i>
                                Reenviar correo
                            </button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold">Cerrar sesion</button>
                        </form>
                    </div>

                    <p class="auth-helper">
                        Cuando completes la verificacion, podras entrar normalmente al panel.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
