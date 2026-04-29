@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Clasificacion</span>
            <h1 class="section-heading__title">Nueva categoria</h1>
        </div>
        @include('admin.partials.navigation')
        <form action="{{ route('admin.categorias.store') }}" method="POST">
            @csrf
            @include('admin.categorias._form', ['submitLabel' => 'Guardar categoria'])
        </form>
    </div>
</section>
@endsection
