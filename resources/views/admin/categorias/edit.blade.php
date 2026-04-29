@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Clasificacion</span>
            <h1 class="section-heading__title">Editar categoria</h1>
        </div>
        @include('admin.partials.navigation')
        @include('admin.productos.partials.alerts')
        <form action="{{ route('admin.categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.categorias._form', ['submitLabel' => 'Actualizar categoria'])
        </form>
    </div>
</section>
@endsection
