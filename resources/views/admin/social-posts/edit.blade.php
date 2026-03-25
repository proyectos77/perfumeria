@extends('layouts.app')

@section('content')
<section class="social-editor-page py-5">
    <div class="container-fluid social-editor-shell px-3 px-lg-4 px-xxl-5">
        <div class="social-editor-header mb-4">
            <div>
                <span class="social-editor-header__eyebrow">Panel social</span>
                <h1 class="social-editor-header__title">Editar publicacion social</h1>
                <p class="social-editor-header__text">
                    Ajusta contenido, redes, fecha y notas internas. Tambien puedes revisar el historial reciente de estado.
                </p>
            </div>
        </div>

        @include('admin.partials.navigation')

        @if (session('success'))
            <div class="alert social-editor-alert mb-4">{{ session('success') }}</div>
        @endif

        <div class="social-editor-layout">
            <form action="{{ route('admin.social-posts.update', $post) }}" method="POST" class="social-editor-card">
                @csrf
                @method('PUT')
                @include('admin.social-posts._form', ['submitLabel' => 'Actualizar publicacion'])
            </form>

            <aside class="social-log-card">
                <div class="social-log-card__head">
                    <span class="social-pill">Historial</span>
                    <h2>Ultimos eventos</h2>
                    <p>Seguimiento rapido del estado interno de esta publicacion.</p>
                </div>

                <div class="social-log-list">
                    @forelse($post->logs as $log)
                        <article class="social-log-item">
                            <strong>{{ ucfirst($log->status) }}</strong>
                            <p>{{ $log->message ?: 'Sin mensaje adicional.' }}</p>
                            <small>{{ $log->created_at->format('d M Y H:i') }}</small>
                        </article>
                    @empty
                        <div class="social-log-empty">Aun no hay eventos registrados para esta publicacion.</div>
                    @endforelse
                </div>
            </aside>
        </div>
    </div>
</section>

@include('admin.social-posts.partials.styles')
@endsection
