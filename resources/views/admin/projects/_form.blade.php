@php
    $isEdit = $project->exists;
@endphp

<div class="row g-4">
    <div class="col-lg-8">
        <div class="admin-form-card h-100">
            <div class="admin-form-card__header">
                <span class="admin-form-card__eyebrow">Proyecto</span>
                <h2>Contenido principal</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-8">
                    <label class="form-label">Titulo</label>
                    <input type="text" name="title" value="{{ old('title', $project->title) }}" class="form-control form-control-lg" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $project->slug) }}" class="form-control" placeholder="opcional">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cliente o categoria</label>
                    <input type="text" name="client_name" value="{{ old('client_name', $project->client_name) }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fecha finalizacion</label>
                    <input type="date" name="completed_at" value="{{ old('completed_at', optional($project->completed_at)->format('Y-m-d')) }}" class="form-control">
                </div>
                <div class="col-12">
                    <label class="form-label">Resumen corto</label>
                    <input type="text" name="summary" value="{{ old('summary', $project->summary) }}" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Descripcion</label>
                    <textarea name="description" rows="6" class="form-control">{{ old('description', $project->description) }}</textarea>
                </div>
                <div class="col-md-7">
                    <label class="form-label">URL del proyecto</label>
                    <input type="url" name="project_url" value="{{ old('project_url', $project->project_url) }}" class="form-control">
                </div>
                <div class="col-md-5">
                    <label class="form-label">Imagen</label>
                    <input type="file" name="image_path" class="form-control" accept="image/*">
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-form-card h-100">
            <div class="admin-form-card__header">
                <span class="admin-form-card__eyebrow">Publicacion</span>
                <h2>Estado y orden</h2>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <label class="form-label">Estado</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $project->status) === 'published')>Publicado</option>
                        <option value="draft" @selected(old('status', $project->status) === 'draft')>Borrador</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Orden</label>
                    <input type="number" name="display_order" min="0" value="{{ old('display_order', $project->display_order ?? 0) }}" class="form-control">
                </div>
                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="is_featured" name="is_featured" @checked(old('is_featured', $project->is_featured))>
                        <label class="form-check-label" for="is_featured">Mostrar en portada</label>
                    </div>
                </div>
                @if($isEdit && $project->image_path)
                    <div class="col-12">
                        <div class="media-preview-card media-preview-card--small">
                            <span>Imagen actual</span>
                            <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}">
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold rounded-pill">{{ $submitLabel }}</button>
                </div>
                <div class="col-12">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary w-100 rounded-pill">Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .admin-form-card {
        padding: 1.5rem;
        border-radius: 28px;
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 28px 80px rgba(0, 31, 77, 0.1);
    }

    .admin-form-card__header {
        margin-bottom: 1.2rem;
    }

    .admin-form-card__header h2 {
        margin: 0.55rem 0 0;
        font-size: 1.45rem;
        font-weight: 900;
        color: #0f2342;
    }

    .admin-form-card__eyebrow {
        display: inline-flex;
        padding: 0.4rem 0.9rem;
        border-radius: 999px;
        background: rgba(13, 71, 161, 0.1);
        color: #0d47a1;
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .media-preview-card {
        display: grid;
        gap: 0.7rem;
        padding: 1rem;
        border-radius: 22px;
        background: linear-gradient(180deg, #f8fbff 0%, #eef5fc 100%);
        border: 1px solid rgba(13, 71, 161, 0.08);
    }

    .media-preview-card span {
        color: #5f6f88;
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .media-preview-card img {
        width: 100%;
        max-height: 240px;
        object-fit: cover;
        border-radius: 18px;
        background: #dbe5f2;
    }
</style>
