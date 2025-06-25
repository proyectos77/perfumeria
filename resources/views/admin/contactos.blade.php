@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
@endif



<div class="container mt-4">

    <!-- Título + notificación -->
    <!-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Panel de Contactos</h2>
        <div class="position-relative">
            <i class="bi bi-bell" style="font-size: 1.5rem;"></i>
            @if($nuevos > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $nuevos }}
                </span>
            @endif
        </div>
    </div> -->

    <!-- Tarjetas resumen -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Total mensajes</h5>
                    <p class="card-text fs-4">{{ $total }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Este mes</h5>
                    <p class="card-text fs-4">{{ $delMes }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Hoy</h5>
                    <p class="card-text fs-4">{{ $nuevos }}</p>
                </div>
            </div>
        </div>
    </div>

        <!-- Tabla de mensajes -->
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Mensajes recibidos</h5>
            <table class="table table-hover table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mensajes as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->correo }}</td>
                            <td>{{ Str::limit($item->mensaje, 50) }}</td>
                            <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.contactos.eliminar', $item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este mensaje?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay mensajes.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
