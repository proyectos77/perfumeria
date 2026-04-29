<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-body p-4">
                @if ($errors->any())
                    <div class="alert alert-danger">Revisa los campos marcados antes de continuar.</div>
                @endif

                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="form-control form-control-lg @error('nombre') is-invalid @enderror" required>
                        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Categoria</label>
                        <select name="categoria_id" class="form-select form-select-lg @error('categoria_id') is-invalid @enderror" required>
                            <option value="">Seleccionar</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" @selected(old('categoria_id', $producto->categoria_id) == $categoria->id)>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Precio</label>
                        <input type="number" name="precio" min="0" step="0.01" value="{{ old('precio', $producto->precio) }}" class="form-control @error('precio') is-invalid @enderror" required>
                        @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Stock</label>
                        <input type="number" name="stock" min="0" value="{{ old('stock', $producto->stock ?? 0) }}" class="form-control @error('stock') is-invalid @enderror" required>
                        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Descripcion</label>
                        <textarea name="descripcion" rows="6" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $producto->descripcion) }}</textarea>
                        @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-body p-4">
                <label class="form-label fw-semibold">Imagen del producto</label>
                <input type="file" name="imagen" accept="image/*" class="form-control @error('imagen') is-invalid @enderror">
                @error('imagen') <div class="invalid-feedback">{{ $message }}</div> @enderror

                <div class="mt-4 rounded-4 overflow-hidden bg-light">
                    <img src="{{ $producto->exists ? $producto->imagenUrl() : asset('images/logo-pagina.png') }}" alt="Vista previa" class="w-100" style="height: 260px; object-fit: cover;">
                </div>

                <div class="d-grid gap-3 mt-4">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold">{{ $submitLabel }}</button>
                    <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-secondary rounded-pill">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
