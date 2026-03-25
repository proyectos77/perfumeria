@extends('layouts.app')

@section('content')
<section class="social-editor-page py-5">
    <div class="container-fluid social-editor-shell px-3 px-lg-4 px-xxl-5">
        <div class="social-editor-header mb-4">
            <div>
                <span class="social-editor-header__eyebrow">Panel social</span>
                <h1 class="social-editor-header__title">Crear publicacion social</h1>
                <p class="social-editor-header__text">
                    Registra el contenido base, selecciona las redes y deja la publicacion en borrador o aprobada.
                </p>
            </div>
        </div>

        @include('admin.partials.navigation')

        <form action="{{ route('admin.social-posts.store') }}" method="POST" class="social-editor-card">
            @csrf
            @include('admin.social-posts._form', ['submitLabel' => 'Guardar publicacion'])
        </form>
    </div>
</section>

@include('admin.social-posts.partials.styles')
@endsection
