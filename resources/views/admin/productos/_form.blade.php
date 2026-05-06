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
                        <label class="form-label fw-semibold">Precio en pesos colombianos</label>
                        <input type="text" id="precio" name="precio" inputmode="numeric" value="{{ old('precio', $producto->exists ? number_format((float) $producto->precio, 0, ',', '.') : '') }}" class="form-control @error('precio') is-invalid @enderror" placeholder="Ej: 126.000" required>
                        <small class="text-muted d-block mt-1">Puedes escribir 126000 o 126.000. Se guardara como 126.000 COP.</small>
                        @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Descuento (%)</label>
                        <input type="number" id="descuento" name="descuento" min="0" max="100" step="0.01" value="{{ old('descuento', $producto->descuento ?? 0) }}" class="form-control @error('descuento') is-invalid @enderror">
                        @error('descuento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Costo de envio</label>
                        <input type="text" id="costo_envio" name="costo_envio" inputmode="numeric" value="{{ old('costo_envio', $producto->exists ? number_format((float) $producto->costo_envio, 0, ',', '.') : '') }}" class="form-control @error('costo_envio') is-invalid @enderror" placeholder="Ej: 8.500">
                        <small class="text-muted d-block mt-1">Si el cliente elige envio, este valor se suma al total.</small>
                        @error('costo_envio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Stock</label>
                        <input type="number" name="stock" min="0" value="{{ old('stock', $producto->stock ?? 0) }}" class="form-control @error('stock') is-invalid @enderror" required>
                        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border: 2px solid #c79a5b;">
                            <small class="text-muted d-block mb-3" style="font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">📊 Resumen de Precios</small>
                            <div style="font-size: 1rem;">
                                <div class="d-flex justify-content-between mb-3" style="padding-bottom: 0.75rem;">
                                    <span style="color: #75655b; font-weight: 500;">Precio Original:</span>
                                    <strong id="precioOriginal" style="color: #c79a5b; font-size: 1.1rem;">0 COP</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-3" id="descuentoInfo" style="display: none; padding: 0.75rem; background: rgba(220, 53, 69, 0.08); border-radius: 8px;">
                                    <span style="color: #dc3545; font-weight: 600;">Descuento (monto):</span>
                                    <strong style="color: #dc3545; font-size: 1rem;" id="descuentoMonto">-0 COP</strong>
                                </div>
                                <div class="d-flex justify-content-between" style="border-top: 2px solid #dee2e6; padding-top: 0.75rem;">
                                    <span style="font-weight: 700; color: #211b18;">Precio a Pagar:</span>
                                    <strong id="precioFinal" style="color: #28a745; font-size: 1.3rem;">0 COP</strong>
                                </div>
                            </div>
                        </div>
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
                    <img id="imagenPreview" src="{{ $producto->exists ? $producto->imagenUrl() : asset('images/logo-pagina.png') }}" alt="Vista previa" class="w-100" style="height: 260px; object-fit: cover;">
                </div>

                <div class="d-grid gap-3 mt-4">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold">{{ $submitLabel }}</button>
                    <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-secondary rounded-pill">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function formatearPrecio(valor) {
        const limpio = String(valor || '').replace(/\D/g, '');
        const numero = parseInt(limpio || '0', 10);
        if (!numero) return '0 COP';
        // Formatear con puntos como separador de miles (formato colombiano)
        const formateado = numero.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        return formateado + ' COP';
    }

    function actualizarPrecios() {
        const precioInput = document.getElementById('precio');
        const descuentoInput = document.getElementById('descuento');
        
        const precio = parseInt(String(precioInput.value || '').replace(/\D/g, '') || '0', 10);
        const descuento = parseFloat(descuentoInput.value) || 0;
        
        // Actualizar precio original
        document.getElementById('precioOriginal').textContent = formatearPrecio(precio);
        
        // Calcular y mostrar descuento e información
        if (descuento > 0) {
            const montoDescuento = precio * (descuento / 100);
            const precioFinal = precio - montoDescuento;
            
            document.getElementById('descuentoInfo').style.display = 'flex';
            document.getElementById('descuentoMonto').textContent = '-' + formatearPrecio(montoDescuento);
            document.getElementById('precioFinal').textContent = formatearPrecio(precioFinal);
        } else {
            document.getElementById('descuentoInfo').style.display = 'none';
            document.getElementById('precioFinal').textContent = formatearPrecio(precio);
        }
    }

    // Ejecutar al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        actualizarPrecios();
        
        // Agregar listeners para cambios en tiempo real
        document.getElementById('precio').addEventListener('input', actualizarPrecios);
        document.getElementById('descuento').addEventListener('input', actualizarPrecios);

        document.querySelector('input[name="imagen"]')?.addEventListener('change', function (event) {
            const file = event.target.files?.[0];
            const preview = document.getElementById('imagenPreview');

            if (file && preview) {
                preview.src = URL.createObjectURL(file);
            }
        });
    });
</script>
