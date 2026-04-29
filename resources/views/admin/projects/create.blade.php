@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container-fluid admin-wide-shell px-3 px-lg-4 px-xxl-5">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Administracion web</span>
            <h1 class="section-heading__title">Nuevo proyecto</h1>
            <p class="section-heading__text">Agrega un proyecto para mostrarlo en la portada y mantener actualizado tu portafolio.</p>
        </div>

        @include('admin.partials.navigation')

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.projects._form', ['submitLabel' => 'Guardar proyecto'])
        </form>
    </div>
</section>
@endsection
