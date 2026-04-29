@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Inventario</span>
            <h1 class="section-heading__title">Editar producto</h1>
        </div>

        @include('admin.partials.navigation')
        @include('admin.productos.partials.alerts')

        <form action="{{ route('admin.productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.productos._form', ['submitLabel' => 'Actualizar producto'])
        </form>
    </div>
</section>
@endsection
