@extends('layouts.app')

@section('content')
<section class="template-admin-page py-5">
    <div class="container-fluid template-admin-shell px-3 px-lg-4 px-xxl-5">
        <div class="template-admin-header mb-4">
            <div>
                <span class="template-admin-header__eyebrow">Panel de disenos</span>
                <h1 class="template-admin-header__title">Plantillas para crear y luego publicar</h1>
                <p class="template-admin-header__text">
                    Entra a cada plantilla, cambia los textos y crea un borrador listo dentro del modulo de publicaciones.
                </p>
            </div>
        </div>

        @include('admin.partials.navigation')

        <div class="row g-4">
            @foreach($templates as $template)
                <div class="col-md-6 col-xl-4">
                    <article class="template-card h-100">
                        <div class="template-card__preview">
                            <img src="{{ asset($template['preview']) }}" alt="{{ $template['name'] }}" class="template-card__image">
                        </div>

                        <div class="template-card__body">
                            <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                                <div>
                                    <span class="template-chip">{{ $template['format'] }}</span>
                                    <h2>{{ $template['name'] }}</h2>
                                </div>
                                <span class="template-chip template-chip--soft">{{ $template['accent'] }}</span>
                            </div>

                            <p>{{ $template['description'] }}</p>

                            <div class="d-flex flex-wrap gap-2 mt-4">
                                <a href="{{ route('admin.social-templates.show', $template['slug']) }}" class="btn btn-primary rounded-pill px-4 fw-semibold">
                                    <i class="bi bi-pencil-square me-2"></i>Editar
                                </a>
                                <a href="{{ asset($template['preview']) }}" target="_blank" class="btn btn-outline-light rounded-pill px-4 fw-semibold">
                                    <i class="bi bi-eye me-2"></i>Ver base
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .template-admin-page {
        background:
            radial-gradient(circle at top left, rgba(245, 124, 0, 0.15), transparent 26%),
            radial-gradient(circle at top right, rgba(38, 198, 218, 0.14), transparent 24%),
            linear-gradient(180deg, #07111f 0%, #0a172b 48%, #0d1b31 100%);
        min-height: calc(100vh - 120px);
    }

    .template-admin-shell {
        max-width: 1760px;
    }

    .template-admin-header__eyebrow {
        display: inline-flex;
        padding: 0.42rem 0.9rem;
        border-radius: 999px;
        background: rgba(245, 124, 0, 0.14);
        border: 1px solid rgba(245, 124, 0, 0.18);
        color: #ffd2a3;
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .template-admin-header__title {
        margin: 0.9rem 0 0.8rem;
        color: #f8fafc;
        font-size: clamp(2rem, 2.9vw, 3rem);
        font-weight: 900;
        letter-spacing: -0.05em;
    }

    .template-admin-header__text {
        max-width: 760px;
        margin: 0;
        color: #93a8c4;
        line-height: 1.8;
    }

    .template-card {
        height: 100%;
        overflow: hidden;
        border-radius: 28px;
        border: 1px solid rgba(148, 163, 184, 0.14);
        background: rgba(6, 15, 28, 0.88);
        box-shadow: 0 22px 50px rgba(0, 0, 0, 0.22);
    }

    .template-card__preview {
        padding: 1.2rem;
        background: linear-gradient(180deg, rgba(13, 27, 49, 0.96) 0%, rgba(8, 20, 37, 0.92) 100%);
    }

    .template-card__image {
        width: 100%;
        border-radius: 22px;
        border: 1px solid rgba(255, 255, 255, 0.06);
        background: #fff;
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.28);
    }

    .template-card__body {
        padding: 1.4rem 1.4rem 1.6rem;
    }

    .template-card__body h2 {
        margin: 0.7rem 0 0;
        color: #f8fafc;
        font-size: 1.45rem;
        font-weight: 800;
    }

    .template-card__body p {
        margin: 0;
        color: #8ea3bd;
        line-height: 1.75;
    }

    .template-chip {
        display: inline-flex;
        align-items: center;
        padding: 0.45rem 0.85rem;
        border-radius: 999px;
        background: rgba(37, 99, 235, 0.16);
        color: #bfdbfe;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.04em;
    }

    .template-chip--soft {
        background: rgba(245, 124, 0, 0.14);
        color: #ffd9b0;
    }
</style>
@endsection
