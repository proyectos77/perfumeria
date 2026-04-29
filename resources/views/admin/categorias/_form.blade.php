<div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 680px;">
    <div class="card-body p-4">
        <label class="form-label fw-semibold">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" class="form-control form-control-lg @error('nombre') is-invalid @enderror" required>
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror

        <div class="d-flex flex-wrap gap-3 mt-4">
            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-4 fw-bold">{{ $submitLabel }}</button>
            <a href="{{ route('admin.categorias.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">Volver</a>
        </div>
    </div>
</div>
