@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container-fluid admin-wide-shell px-3 px-lg-4 px-xxl-5">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Administracion web</span>
            <h1 class="section-heading__title">Editar proyecto</h1>
            <p class="section-heading__text">Actualiza informacion, imagen y estado de publicacion del proyecto seleccionado.</p>
        </div>

        @include('admin.partials.navigation')

        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.projects._form', ['submitLabel' => 'Actualizar proyecto'])
        </form>
    </div>
</section>
@endsection
