@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Inventario</span>
            <h1 class="section-heading__title">Nuevo producto</h1>
        </div>

        @include('admin.partials.navigation')

        <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.productos._form', ['submitLabel' => 'Guardar producto'])
        </form>
    </div>
</section>
@endsection
