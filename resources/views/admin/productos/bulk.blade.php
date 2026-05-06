@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container-fluid admin-wide-shell px-3 px-lg-4 px-xxl-5">
        <div class="section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Inventario</span>
            <h1 class="section-heading__title">Carga masiva</h1>
            <p class="section-heading__text">Usa las imagenes actuales del proyecto para crear productos o actualizar informacion existente.</p>
        </div>

        @include('admin.partials.navigation')
        @include('admin.productos.partials.alerts')

        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-4">
                Revisa la informacion ingresada. Algunos campos obligatorios no pasaron la validacion.
            </div>
        @endif

        @if (count($imagenes) === 0)
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5 text-center">
                    <h2 class="h4 fw-bold">No hay imagenes disponibles</h2>
                    <p class="text-muted mb-0">Agrega imagenes en <strong>public/images</strong> para poder cargarlas como productos.</p>
                </div>
            </div>
        @else
            <form action="{{ route('admin.productos.bulk.store') }}" method="POST">
                @csrf

                <div class="bulk-toolbar mb-4">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Categoria para todos</label>
                            <select class="form-select" data-bulk-category>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" @selected($categoriaDefault->id === $categoria->id)>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Precio</label>
                            <input type="number" min="0" step="0.01" value="0" class="form-control" data-bulk-price>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Stock</label>
                            <input type="number" min="0" value="0" class="form-control" data-bulk-stock>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-outline-primary" data-apply-bulk>Aplicar a todos</button>
                                <button type="button" class="btn btn-outline-dark" data-select-all>Seleccionar todos</button>
                                <button type="button" class="btn btn-outline-secondary" data-unselect-all>Quitar seleccion</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bulk-grid">
                    @foreach($imagenes as $index => $imagen)
                        @php
                            $oldItem = old("items.{$index}", []);
                            $defaultName = 'Perfume ' . ($index + 1);
                        @endphp

                        <article class="bulk-product-card">
                            <div class="bulk-product-card__media">
                                <img src="{{ $imagen['url'] }}" alt="{{ $defaultName }}">
                            </div>

                            <div class="bulk-product-card__body">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input bulk-check" type="checkbox" value="1" id="selected-{{ $index }}" name="items[{{ $index }}][selected]" @checked(old("items.{$index}.selected", true))>
                                    <label class="form-check-label fw-bold" for="selected-{{ $index }}">Cargar esta imagen</label>
                                </div>

                                <input type="hidden" name="items[{{ $index }}][source]" value="{{ $imagen['path'] }}">

                                <div class="mb-3">
                                    <label class="form-label">Actualizar producto existente</label>
                                    <select name="items[{{ $index }}][producto_id]" class="form-select">
                                        <option value="">Crear nuevo producto</option>
                                        @foreach($productos as $producto)
                                            <option value="{{ $producto->id }}" @selected(($oldItem['producto_id'] ?? '') == $producto->id)>{{ $producto->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" name="items[{{ $index }}][nombre]" value="{{ $oldItem['nombre'] ?? $defaultName }}" class="form-control @error("items.{$index}.nombre") is-invalid @enderror" required>
                                    @error("items.{$index}.nombre") <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Descripcion</label>
                                    <textarea name="items[{{ $index }}][descripcion]" rows="2" class="form-control">{{ $oldItem['descripcion'] ?? 'Fragancia seleccionada disponible en nuestra tienda.' }}</textarea>
                                </div>

                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Categoria</label>
                                        <select name="items[{{ $index }}][categoria_id]" class="form-select bulk-category @error("items.{$index}.categoria_id") is-invalid @enderror" required>
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}" @selected(($oldItem['categoria_id'] ?? $categoriaDefault->id) == $categoria->id)>{{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error("items.{$index}.categoria_id") <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Precio</label>
                                        <input type="text" name="items[{{ $index }}][precio]" inputmode="numeric" value="{{ $oldItem['precio'] ?? 0 }}" class="form-control bulk-price @error("items.{$index}.precio") is-invalid @enderror" placeholder="126.000" required>
                                        @error("items.{$index}.precio") <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Stock</label>
                                        <input type="number" name="items[{{ $index }}][stock]" min="0" value="{{ $oldItem['stock'] ?? 0 }}" class="form-control bulk-stock @error("items.{$index}.stock") is-invalid @enderror" required>
                                        @error("items.{$index}.stock") <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <small class="text-muted d-block mt-3">{{ $imagen['path'] }}</small>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="bulk-submit-bar">
                    <div>
                        <strong>{{ count($imagenes) }} imagenes detectadas</strong>
                        <span class="text-muted d-block">Las filas seleccionadas se guardaran como productos.</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold">
                        <i class="bi bi-cloud-arrow-up me-2"></i>Guardar carga masiva
                    </button>
                </div>
            </form>
        @endif
    </div>
</section>

<style>
    .bulk-toolbar,
    .bulk-submit-bar {
        padding: 1.25rem;
        border: 1px solid rgba(58, 42, 35, 0.14);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow: 0 18px 50px rgba(33, 27, 24, 0.08);
    }

    .bulk-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.25rem;
    }

    .bulk-product-card {
        overflow: hidden;
        border: 1px solid rgba(58, 42, 35, 0.14);
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 22px 60px rgba(33, 27, 24, 0.08);
    }

    .bulk-product-card__media {
        aspect-ratio: 4 / 3;
        background: #f4e7df;
    }

    .bulk-product-card__media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .bulk-product-card__body {
        padding: 1rem;
    }

    .bulk-submit-bar {
        position: sticky;
        bottom: 1rem;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    @media (max-width: 767.98px) {
        .bulk-submit-bar {
            align-items: stretch;
            flex-direction: column;
        }

        .bulk-submit-bar .btn {
            width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bulkCategory = document.querySelector('[data-bulk-category]');
        const bulkPrice = document.querySelector('[data-bulk-price]');
        const bulkStock = document.querySelector('[data-bulk-stock]');

        document.querySelector('[data-apply-bulk]')?.addEventListener('click', function () {
            document.querySelectorAll('.bulk-category').forEach((field) => field.value = bulkCategory.value);
            document.querySelectorAll('.bulk-price').forEach((field) => field.value = bulkPrice.value);
            document.querySelectorAll('.bulk-stock').forEach((field) => field.value = bulkStock.value);
        });

        document.querySelector('[data-select-all]')?.addEventListener('click', function () {
            document.querySelectorAll('.bulk-check').forEach((field) => field.checked = true);
        });

        document.querySelector('[data-unselect-all]')?.addEventListener('click', function () {
            document.querySelectorAll('.bulk-check').forEach((field) => field.checked = false);
        });
    });
</script>
@endsection
