@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5 text-center">

                    <!-- Mensaje principal -->
                    <h2 class="fw-bold text-primary mb-3">
                        <i class="fas fa-envelope-open-text me-2"></i> Verifica tu correo
                    </h2>
                    <p class="text-muted mb-4">
                        Gracias por registrarte. Antes de comenzar, por favor confirma tu correo haciendo clic en el enlace que te enviamos.  
                        <br>Si no lo recibiste, podemos enviarte uno nuevo.
                    </p>

                    <!-- Mensaje de éxito -->
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    @endif

                    <!-- Botones -->
                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <!-- Reenviar verificación -->
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary shadow-sm">
                                <i class="fas fa-paper-plane me-1"></i> Reenviar correo
                            </button>
                        </form>

                        <!-- Cerrar sesión -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary">
                                <i class="fas fa-sign-out-alt me-1"></i> Cerrar sesión
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
