@extends('layouts.app')


@section('content')


{{-- ========================= --}}
{{--      TARJETAS + GRÁFICOS --}}
{{-- ========================= --}}
<div class="row g-4 mb-4">

    {{-- GRAFICO 1 --}}
    <div class="col-lg-4 col-md-6">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header text-white rounded-top-4"
                 style="background: linear-gradient(135deg,#3b82f6,#6366f1);">
                <h5 class="card-title mb-0 fw-bold">Mensajes por Mes</h5>
            </div>
            <div class="card-body p-3">
                <canvas id="chartMeses" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>

    {{-- GRAFICO 2 --}}
    <div class="col-lg-4 col-md-6">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header text-white rounded-top-4"
                 style="background: linear-gradient(135deg,#06b6d4,#0891b2);">
                <h5 class="card-title mb-0 fw-bold">Distribución de Mensajes</h5>
            </div>
            <div class="card-body p-3">
                <canvas id="chartDistribucion" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>

    {{-- CARD 3 --}}
    <div class="col-lg-4 col-md-12">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header text-white rounded-top-4"
                 style="background: linear-gradient(135deg,#10b981,#059669);">
                <h5 class="card-title mb-0 fw-bold">Mensajes Totales / Hoy</h5>
            </div>
            <div class="card-body text-center py-4">
                <h3 class="fw-bold text-primary mb-1">{{ $total }}</h3>
                <p class="text-muted mb-3">Total recibidos</p>

                <h4 class="fw-bold text-success mb-1">{{ $nuevos }}</h4>
                <p class="text-muted">Hoy</p>
            </div>
        </div>
    </div>

</div>




{{-- ========================= --}}
{{--      TABLA DE MENSAJES    --}}
{{-- ========================= --}}
<div class="card shadow-lg border-0 rounded-4">
    <div class="card-header bg-dark text-white rounded-top-4">
        <h5 class="card-title mb-0 fw-bold">📨 Mensajes recibidos</h5>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($mensajes as $item)
                        <tr>
                            <td class="fw-bold">{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->correo }}</td>
                            <td>{{ Str::limit($item->mensaje, 60) }}</td>
                            <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                            <td class="text-center">
                                <form action="{{ route('admin.contactos.eliminar', $item->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm rounded-circle"
                                            title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No hay mensajes disponibles.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($mensajes->hasPages())
        <div class="card-footer bg-light rounded-bottom-4">
            <div class="d-flex justify-content-center">
                {{ $mensajes->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif
</div>

{{-- ========================= --}}
{{--        S T Y L E S        --}}
{{-- ========================= --}}
<style>
    .card:hover {
        transform: translateY(-3px);
        transition: .2s ease-in-out;
    }
    .table tbody tr:hover {
        background-color: #f3f4f6 !important;
    }
</style>

{{-- ========================= --}}
{{--      C H A R T . J S      --}}
{{-- ========================= --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const datosMeses = @json($datosMeses ?? []);
    const datosDistribucion = @json($datosDistribucion ?? []);
    const colores = ['#3b82f6','#10b981','#f59e0b','#ef4444','#8b5cf6','#06b6d4'];

    // --- GRAFICO 1 ---
    if (datosMeses.length) {
        new Chart(document.getElementById('chartMeses'), {
            type: 'doughnut',
            data: {
                labels: datosMeses.map(d => d.mes),
                datasets: [{
                    data: datosMeses.map(d => d.cantidad),
                    backgroundColor: colores,
                    borderColor: "#fff",
                    borderWidth: 2
                }]
            }
        });
    }

    // --- GRAFICO 2 ---
    if (datosDistribucion.length) {
        new Chart(document.getElementById('chartDistribucion'), {
            type: 'doughnut',
            data: {
                labels: datosDistribucion.map(d => d.label),
                datasets: [{
                    data: datosDistribucion.map(d => d.cantidad),
                    backgroundColor: colores,
                    borderColor: "#fff",
                    borderWidth: 2
                }]
            }
        });
    }
</script>

@endsection
