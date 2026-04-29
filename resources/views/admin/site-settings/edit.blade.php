@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container-fluid px-0">
        <div class="section-heading admin-section-heading text-center mb-4">
            <span class="section-heading__eyebrow">Administracion web</span>
            <h1 class="section-heading__title">Configuracion general del sitio</h1>
            <p class="section-heading__text">Desde aqui puedes actualizar marca, contacto, redes, textos clave, imagenes y el perfil principal de la pagina sin tocar codigo.</p>
        </div>
    </div>

    <div class="container-fluid admin-wide-shell px-3 px-lg-4 px-xxl-5">
        @include('admin.partials.navigation')

        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
                <strong>Revisa los datos marcados e intenta nuevamente.</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.site-settings.update') }}" method="POST" enctype="multipart/form-data" class="site-settings-grid">
            @csrf
            @method('PUT')

            <div class="site-settings-main">
                <section class="admin-form-card">
                    <div class="admin-form-card__header">
                        <span class="admin-form-card__eyebrow">Marca</span>
                        <h2>Identidad del sitio</h2>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Nombre del sitio</label>
                            <input type="text" name="site_name" value="{{ old('site_name', $settings->site_name) }}" class="form-control form-control-lg @error('site_name') is-invalid @enderror">
                                @error('site_name')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tagline</label>
                            <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings->site_tagline) }}" class="form-control form-control-lg @error('site_tagline') is-invalid @enderror">
                                @error('site_tagline')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Resumen corto</label>
                            <textarea name="site_summary" rows="3" class="form-control @error('site_summary') is-invalid @enderror">{{ old('site_summary', $settings->site_summary) }}</textarea>
                                @error('site_summary')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-lg-7">
                            <label class="form-label">Logo principal</label>
                            <input type="file" name="logo_path" class="form-control @error('logo_path') is-invalid @enderror" accept="image/*">
                                @error('logo_path')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-lg-5">
                            <div class="media-preview-card">
                                <span>Logo actual</span>
                                <img src="{{ $settings->assetUrl($settings->logo_path) }}" alt="Logo actual del sitio">
                            </div>
                        </div>
                    </div>
                </section>

                <section class="admin-form-card">
                    <div class="admin-form-card__header">
                        <span class="admin-form-card__eyebrow">Contacto</span>
                        <h2>Canales y redes sociales</h2>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Telefono</label>
                            <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings->contact_phone) }}" class="form-control @error('contact_phone') is-invalid @enderror">
                                @error('contact_phone')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Correo publico</label>
                            <input type="email" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}" class="form-control @error('contact_email') is-invalid @enderror">
                                @error('contact_email')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">WhatsApp con indicativo</label>
                            <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $settings->whatsapp_number) }}" class="form-control @error('whatsapp_number') is-invalid @enderror">
                                @error('whatsapp_number')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Correo para notificaciones</label>
                            <input type="email" name="admin_notification_email" value="{{ old('admin_notification_email', $settings->admin_notification_email) }}" class="form-control @error('admin_notification_email') is-invalid @enderror">
                                @error('admin_notification_email')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">LinkedIn</label>
                            <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $settings->linkedin_url) }}" class="form-control @error('linkedin_url') is-invalid @enderror">
                                @error('linkedin_url')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Instagram</label>
                            <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings->instagram_url) }}" class="form-control @error('instagram_url') is-invalid @enderror">
                                @error('instagram_url')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Facebook</label>
                            <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings->facebook_url) }}" class="form-control @error('facebook_url') is-invalid @enderror">
                                @error('facebook_url')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">TikTok</label>
                            <input type="url" name="tiktok_url" value="{{ old('tiktok_url', $settings->tiktok_url) }}" class="form-control @error('tiktok_url') is-invalid @enderror">
                                @error('tiktok_url')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                </section>

                <section class="admin-form-card">
                    <div class="admin-form-card__header">
                        <span class="admin-form-card__eyebrow">Inicio</span>
                        <h2>Portada y seccion de proyectos</h2>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <label class="form-label">Badge principal</label>
                            <input type="text" name="home_hero_badge" value="{{ old('home_hero_badge', $settings->home_hero_badge) }}" class="form-control @error('home_hero_badge') is-invalid @enderror">
                                @error('home_hero_badge')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Titulo principal</label>
                            <input type="text" name="home_hero_title" value="{{ old('home_hero_title', $settings->home_hero_title) }}" class="form-control @error('home_hero_title') is-invalid @enderror">
                                @error('home_hero_title')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descripcion principal</label>
                            <textarea name="home_hero_description" rows="3" class="form-control @error('home_hero_description') is-invalid @enderror">{{ old('home_hero_description', $settings->home_hero_description) }}</textarea>
                                @error('home_hero_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Titulo de proyectos</label>
                            <input type="text" name="home_projects_title" value="{{ old('home_projects_title', $settings->home_projects_title) }}" class="form-control @error('home_projects_title') is-invalid @enderror">
                                @error('home_projects_title')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion de proyectos</label>
                            <textarea name="home_projects_description" rows="3" class="form-control @error('home_projects_description') is-invalid @enderror">{{ old('home_projects_description', $settings->home_projects_description) }}</textarea>
                                @error('home_projects_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        @foreach ([1, 2, 3, 4] as $slide)
                            @php $field = "home_slide_{$slide}_path"; @endphp
                            <div class="col-lg-6">
                                <label class="form-label">Imagen slide {{ $slide }}</label>
                                <input type="file" name="{{ $field }}" class="form-control @error('{{ $field }}') is-invalid @enderror" accept="image/*">
                                @error('{{ $field }}')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                                <div class="media-preview-card media-preview-card--small mt-3">
                                    <span>Vista previa</span>
                                    <img src="{{ $settings->assetUrl($settings->{$field}) }}" alt="Slide {{ $slide }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="admin-form-card">
                    <div class="admin-form-card__header">
                        <span class="admin-form-card__eyebrow">Paginas</span>
                        <h2>Servicios, contacto y quienes somos</h2>
                    </div>

                    <div class="row g-4">
                        <div class="col-12">
                            <h3 class="admin-form-subtitle">Servicios</h3>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Titulo servicios</label>
                            <input type="text" name="services_hero_title" value="{{ old('services_hero_title', $settings->services_hero_title) }}" class="form-control @error('services_hero_title') is-invalid @enderror">
                                @error('services_hero_title')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion servicios</label>
                            <textarea name="services_hero_description" rows="3" class="form-control @error('services_hero_description') is-invalid @enderror">{{ old('services_hero_description', $settings->services_hero_description) }}</textarea>
                                @error('services_hero_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Imagen hero servicios</label>
                            <input type="file" name="services_hero_image_path" class="form-control @error('services_hero_image_path') is-invalid @enderror" accept="image/*">
                                @error('services_hero_image_path')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            <div class="media-preview-card media-preview-card--small mt-3">
                                <span>Hero servicios</span>
                                <img src="{{ $settings->assetUrl($settings->services_hero_image_path) }}" alt="Hero servicios">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Imagen bloque servicios</label>
                            <input type="file" name="services_feature_image_path" class="form-control @error('services_feature_image_path') is-invalid @enderror" accept="image/*">
                                @error('services_feature_image_path')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            <div class="media-preview-card media-preview-card--small mt-3">
                                <span>Bloque servicios</span>
                                <img src="{{ $settings->assetUrl($settings->services_feature_image_path) }}" alt="Bloque servicios">
                            </div>
                        </div>
                        @foreach (range(1, 6) as $serviceIndex)
                            <div class="col-12">
                                <div class="service-card">
                                    <h4 class="h6 fw-bold mb-3">Servicio {{ $serviceIndex }}</h4>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Titulo</label>
                                            <input type="text" name="service_{{ $serviceIndex }}_title" value="{{ old("service_{$serviceIndex}_title", $settings->{"service_{$serviceIndex}_title"}) }}" class="form-control @error('service_'.$serviceIndex.'_title') is-invalid @enderror">
                                @error('service_'.$serviceIndex.'_title')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Items del servicio</label>
                                            <textarea name="service_{{ $serviceIndex }}_items" rows="3" class="form-control @error('service_'.$serviceIndex.'_items') is-invalid @enderror" placeholder="Un item por linea">{{ old("service_{$serviceIndex}_items", $settings->{"service_{$serviceIndex}_items"}) }}</textarea>
                                @error('service_'.$serviceIndex.'_items')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Descripcion</label>
                                            <textarea name="service_{{ $serviceIndex }}_text" rows="3" class="form-control @error('service_'.$serviceIndex.'_text') is-invalid @enderror">{{ old("service_{$serviceIndex}_text", $settings->{"service_{$serviceIndex}_text"}) }}</textarea>
                                @error('service_'.$serviceIndex.'_text')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12">
                            <h3 class="admin-form-subtitle">Contacto</h3>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Titulo contacto</label>
                            <input type="text" name="contact_hero_title" value="{{ old('contact_hero_title', $settings->contact_hero_title) }}" class="form-control @error('contact_hero_title') is-invalid @enderror">
                                @error('contact_hero_title')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion contacto</label>
                            <textarea name="contact_hero_description" rows="3" class="form-control @error('contact_hero_description') is-invalid @enderror">{{ old('contact_hero_description', $settings->contact_hero_description) }}</textarea>
                                @error('contact_hero_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Imagen hero contacto</label>
                            <input type="file" name="contact_hero_image_path" class="form-control @error('contact_hero_image_path') is-invalid @enderror" accept="image/*">
                                @error('contact_hero_image_path')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            <div class="media-preview-card media-preview-card--small mt-3">
                                <span>Hero contacto</span>
                                <img src="{{ $settings->assetUrl($settings->contact_hero_image_path) }}" alt="Hero contacto">
                            </div>
                        </div>

                        <div class="col-12">
                            <h3 class="admin-form-subtitle">Quienes somos</h3>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Titulo quienes somos</label>
                            <input type="text" name="about_hero_title" value="{{ old('about_hero_title', $settings->about_hero_title) }}" class="form-control @error('about_hero_title') is-invalid @enderror">
                                @error('about_hero_title')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion quienes somos</label>
                            <textarea name="about_hero_description" rows="3" class="form-control @error('about_hero_description') is-invalid @enderror">{{ old('about_hero_description', $settings->about_hero_description) }}</textarea>
                                @error('about_hero_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Imagen hero quienes somos</label>
                            <input type="file" name="about_hero_image_path" class="form-control @error('about_hero_image_path') is-invalid @enderror" accept="image/*">
                                @error('about_hero_image_path')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            <div class="media-preview-card media-preview-card--small mt-3">
                                <span>Hero quienes somos</span>
                                <img src="{{ $settings->assetUrl($settings->about_hero_image_path) }}" alt="Hero quienes somos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Imagen bloque quienes somos</label>
                            <input type="file" name="about_feature_image_path" class="form-control @error('about_feature_image_path') is-invalid @enderror" accept="image/*">
                                @error('about_feature_image_path')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            <div class="media-preview-card media-preview-card--small mt-3">
                                <span>Bloque quienes somos</span>
                                <img src="{{ $settings->assetUrl($settings->about_feature_image_path) }}" alt="Bloque quienes somos">
                            </div>
                        </div>
                    </div>
                </section>

                <section class="admin-form-card">
                    <div class="admin-form-card__header">
                        <span class="admin-form-card__eyebrow">Perfil</span>
                        <h2>Presentacion personal y trayectoria</h2>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="about_profile_name" value="{{ old('about_profile_name', $settings->about_profile_name) }}" class="form-control @error('about_profile_name') is-invalid @enderror">
                                @error('about_profile_name')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Rol</label>
                            <input type="text" name="about_profile_role" value="{{ old('about_profile_role', $settings->about_profile_role) }}" class="form-control @error('about_profile_role') is-invalid @enderror">
                                @error('about_profile_role')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Hoja de vida PDF</label>
                            <input type="file" name="about_profile_cv_path" class="form-control @error('about_profile_cv_path') is-invalid @enderror" accept="application/pdf">
                                @error('about_profile_cv_path')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Resumen profesional</label>
                            <textarea name="about_profile_summary" rows="4" class="form-control @error('about_profile_summary') is-invalid @enderror">{{ old('about_profile_summary', $settings->about_profile_summary) }}</textarea>
                                @error('about_profile_summary')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Foto perfil</label>
                            <input type="file" name="about_profile_photo_path" class="form-control @error('about_profile_photo_path') is-invalid @enderror" accept="image/*">
                                @error('about_profile_photo_path')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            <div class="media-preview-card media-preview-card--small mt-3">
                                <span>Foto actual</span>
                                <img src="{{ $settings->assetUrl($settings->about_profile_photo_path) }}" alt="Perfil actual">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mision</label>
                            <textarea name="about_mission" rows="4" class="form-control @error('about_mission') is-invalid @enderror">{{ old('about_mission', $settings->about_mission) }}</textarea>
                                @error('about_mission')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Vision</label>
                            <textarea name="about_vision" rows="4" class="form-control @error('about_vision') is-invalid @enderror">{{ old('about_vision', $settings->about_vision) }}</textarea>
                                @error('about_vision')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Historia corta</label>
                            <textarea name="about_story" rows="3" class="form-control @error('about_story') is-invalid @enderror">{{ old('about_story', $settings->about_story) }}</textarea>
                                @error('about_story')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Historia ampliada</label>
                            <textarea name="about_story_longform" rows="6" class="form-control @error('about_story_longform') is-invalid @enderror">{{ old('about_story_longform', $settings->about_story_longform) }}</textarea>
                                @error('about_story_longform')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                </section>

                <section class="admin-form-card">
                    <div class="admin-form-card__header">
                        <span class="admin-form-card__eyebrow">Legal</span>
                        <h2>Terminos y privacidad</h2>
                    </div>

                    <div class="row g-4">
                        <div class="col-12">
                            <h3 class="admin-form-subtitle">Terminos y condiciones</h3>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Imagen hero terminos</label>
                            <input type="file" name="terms_hero_image_path" class="form-control @error('terms_hero_image_path') is-invalid @enderror" accept="image/*">
                                @error('terms_hero_image_path')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            <div class="media-preview-card media-preview-card--small mt-3">
                                <span>Hero terminos</span>
                                <img src="{{ $settings->assetUrl($settings->terms_hero_image_path) }}" alt="Hero terminos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Titulo hero terminos</label>
                            <input type="text" name="terms_hero_title" value="{{ old('terms_hero_title', $settings->terms_hero_title) }}" class="form-control @error('terms_hero_title') is-invalid @enderror">
                                @error('terms_hero_title')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descripcion hero terminos</label>
                            <textarea name="terms_hero_description" rows="3" class="form-control @error('terms_hero_description') is-invalid @enderror">{{ old('terms_hero_description', $settings->terms_hero_description) }}</textarea>
                                @error('terms_hero_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion resumen terminos</label>
                            <textarea name="terms_summary_description" rows="3" class="form-control @error('terms_summary_description') is-invalid @enderror">{{ old('terms_summary_description', $settings->terms_summary_description) }}</textarea>
                                @error('terms_summary_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion lateral terminos</label>
                            <textarea name="terms_side_description" rows="3" class="form-control @error('terms_side_description') is-invalid @enderror">{{ old('terms_side_description', $settings->terms_side_description) }}</textarea>
                                @error('terms_side_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Etiqueta de version o fecha</label>
                            <input type="text" name="terms_updated_label" value="{{ old('terms_updated_label', $settings->terms_updated_label) }}" class="form-control @error('terms_updated_label') is-invalid @enderror">
                                @error('terms_updated_label')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        @foreach (range(1, 6) as $index)
                            <div class="col-12">
                                <label class="form-label">Texto termino {{ $index }}</label>
                                <textarea name="terms_section_{{ $index }}" rows="3" class="form-control @error('terms_section_'.$index) is-invalid @enderror">{{ old("terms_section_{$index}", $settings->{"terms_section_{$index}"}) }}</textarea>
                                @error('terms_section_'.$index)
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                        <div class="col-md-6">
                            <label class="form-label">Titulo CTA terminos</label>
                            <input type="text" name="terms_cta_title" value="{{ old('terms_cta_title', $settings->terms_cta_title) }}" class="form-control @error('terms_cta_title') is-invalid @enderror">
                                @error('terms_cta_title')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion CTA terminos</label>
                            <textarea name="terms_cta_description" rows="3" class="form-control @error('terms_cta_description') is-invalid @enderror">{{ old('terms_cta_description', $settings->terms_cta_description) }}</textarea>
                                @error('terms_cta_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-12 pt-3">
                            <h3 class="admin-form-subtitle">Politica de privacidad</h3>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Imagen hero privacidad</label>
                            <input type="file" name="privacy_hero_image_path" class="form-control @error('privacy_hero_image_path') is-invalid @enderror" accept="image/*">
                                @error('privacy_hero_image_path')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            <div class="media-preview-card media-preview-card--small mt-3">
                                <span>Hero privacidad</span>
                                <img src="{{ $settings->assetUrl($settings->privacy_hero_image_path) }}" alt="Hero privacidad">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Titulo hero privacidad</label>
                            <input type="text" name="privacy_hero_title" value="{{ old('privacy_hero_title', $settings->privacy_hero_title) }}" class="form-control @error('privacy_hero_title') is-invalid @enderror">
                                @error('privacy_hero_title')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descripcion hero privacidad</label>
                            <textarea name="privacy_hero_description" rows="3" class="form-control @error('privacy_hero_description') is-invalid @enderror">{{ old('privacy_hero_description', $settings->privacy_hero_description) }}</textarea>
                                @error('privacy_hero_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion resumen privacidad</label>
                            <textarea name="privacy_summary_description" rows="3" class="form-control @error('privacy_summary_description') is-invalid @enderror">{{ old('privacy_summary_description', $settings->privacy_summary_description) }}</textarea>
                                @error('privacy_summary_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion lateral privacidad</label>
                            <textarea name="privacy_side_description" rows="3" class="form-control @error('privacy_side_description') is-invalid @enderror">{{ old('privacy_side_description', $settings->privacy_side_description) }}</textarea>
                                @error('privacy_side_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Etiqueta de version o fecha</label>
                            <input type="text" name="privacy_updated_label" value="{{ old('privacy_updated_label', $settings->privacy_updated_label) }}" class="form-control @error('privacy_updated_label') is-invalid @enderror">
                                @error('privacy_updated_label')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        @foreach (range(1, 7) as $index)
                            <div class="col-12">
                                <label class="form-label">Texto privacidad {{ $index }}</label>
                                <textarea name="privacy_section_{{ $index }}" rows="3" class="form-control @error('privacy_section_'.$index) is-invalid @enderror">{{ old("privacy_section_{$index}", $settings->{"privacy_section_{$index}"}) }}</textarea>
                                @error('privacy_section_'.$index)
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                        <div class="col-md-6">
                            <label class="form-label">Titulo CTA privacidad</label>
                            <input type="text" name="privacy_cta_title" value="{{ old('privacy_cta_title', $settings->privacy_cta_title) }}" class="form-control @error('privacy_cta_title') is-invalid @enderror">
                                @error('privacy_cta_title')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion CTA privacidad</label>
                            <textarea name="privacy_cta_description" rows="3" class="form-control @error('privacy_cta_description') is-invalid @enderror">{{ old('privacy_cta_description', $settings->privacy_cta_description) }}</textarea>
                                @error('privacy_cta_description')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                </section>
            </div>

            <aside class="site-settings-sidebar">
                <div class="admin-form-footer">
                    <div class="admin-form-footer__header">
                        <span class="admin-form-footer__eyebrow">Publicar</span>
                        <h2>Guardar cambios</h2>
                    </div>

                    <p class="text-muted mb-4">Aplica los cambios del sitio. Las imagenes nuevas se guardaran en el almacenamiento publico del proyecto.</p>

                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold rounded-pill">
                        <i class="bi bi-save me-2"></i>Actualizar sitio
                    </button>
                </div>
            </aside>
        </form>
    </div>
</section>




</style>
@endsection

<style>
    /* Header full width */
    .admin-section-heading {
        width: 100%;
        max-width: none !important;
        margin: 0;
        padding: 0 2rem;
    }

    .site-settings-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.45fr) 340px;
        gap: 1.5rem;
        align-items: start;
    }

    .site-settings-main {
        display: grid;
        gap: 1.5rem;
    }

    .admin-form-card {
        padding: 2rem;
        border-radius: 28px;
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 28px 80px rgba(0, 31, 77, 0.1);
        border: 1px solid rgba(13, 71, 161, 0.08);
        transition: all 0.3s ease;
    }

    .admin-form-card:hover {
        box-shadow: 0 32px 100px rgba(0, 31, 77, 0.15);
        transform: translateY(-2px);
    }

    .admin-form-card__header {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid rgba(13, 71, 161, 0.1);
    }

    .admin-form-card__header h2 {
        margin: 0.75rem 0 0;
        font-size: 1.75rem;
        font-weight: 900;
        color: #0f2342;
        letter-spacing: -0.02em;
    }

    .admin-form-card__eyebrow {
        display: inline-flex;
        padding: 0.5rem 1rem;
        border-radius: 999px;
        background: linear-gradient(135deg, #0d47a1 0%, #26c6da 100%);
        color: #fff;
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        box-shadow: 0 4px 12px rgba(13, 71, 161, 0.3);
    }

    .admin-form-subtitle {
        margin: 2rem 0 1.5rem;
        font-size: 1.25rem;
        font-weight: 800;
        color: #0f2342;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid rgba(13, 71, 161, 0.15);
    }

    .media-preview-card {
        display: grid;
        gap: 0.8rem;
        padding: 1.25rem;
        min-height: 100%;
        border-radius: 22px;
        background: linear-gradient(180deg, #f8fbff 0%, #eef5fc 100%);
        border: 1px solid rgba(13, 71, 161, 0.08);
        box-shadow: 0 8px 24px rgba(0, 31, 77, 0.06);
        transition: all 0.3s ease;
    }

    .media-preview-card:hover {
        box-shadow: 0 12px 32px rgba(0, 31, 77, 0.1);
        transform: translateY(-1px);
    }

    .media-preview-card span {
        color: #5f6f88;
        font-size: 0.85rem;
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
        border: 1px solid rgba(13, 71, 161, 0.1);
    }

    .media-preview-card--small img {
        max-height: 180px;
    }

    /* Service cards styling */
    .service-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 251, 255, 0.95) 100%);
        border: 1px solid rgba(13, 71, 161, 0.12);
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: 0 12px 32px rgba(0, 31, 77, 0.08);
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
    }

    .service-card:hover {
        box-shadow: 0 20px 48px rgba(0, 31, 77, 0.12);
        transform: translateY(-3px);
        border-color: rgba(13, 71, 161, 0.2);
    }

    .service-card h4 {
        color: #0f2342;
        font-weight: 900;
        margin-bottom: 1.25rem;
        font-size: 1.1rem;
    }

    /* Footer styling */
    .admin-form-footer {
        background: linear-gradient(135deg, #001f4d 0%, #0d47a1 58%, #26c6da 100%);
        border-radius: 28px;
        padding: 2rem;
        margin-top: 2rem;
        box-shadow: 0 28px 80px rgba(0, 31, 77, 0.15);
        border: 1px solid rgba(38, 198, 218, 0.2);
    }

    .admin-form-footer__header {
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .admin-form-footer__eyebrow {
        display: inline-flex;
        padding: 0.5rem 1rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.15);
        color: #fff;
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .admin-form-footer h2 {
        color: #fff;
        font-size: 1.75rem;
        font-weight: 900;
        margin: 0;
        letter-spacing: -0.02em;
    }

    .admin-form-footer p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        margin: 1rem 0 2rem;
        line-height: 1.6;
    }

    .admin-form-footer .btn {
        background: rgba(255, 255, 255, 0.15);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        font-weight: 800;
        font-size: 1.1rem;
        padding: 1rem 2rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 24px rgba(0, 31, 77, 0.2);
    }

    .admin-form-footer .btn:hover {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(0, 31, 77, 0.3);
    }

    /* Form controls enhancement */
    .form-control {
        border: 2px solid rgba(13, 71, 161, 0.15);
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #0d47a1;
        box-shadow: 0 0 0 0.2rem rgba(13, 71, 161, 0.25);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .form-label {
        font-weight: 700;
        color: #0f2342;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        letter-spacing: 0.02em;
    }

    @media (max-width: 1199.98px) {
        .site-settings-grid {
            grid-template-columns: 1fr;
        }

        .admin-section-heading {
            padding: 0 1rem;
        }

        .admin-form-card {
            padding: 1.5rem;
        }

        .admin-form-footer {
            padding: 1.5rem;
        }
    }

    @media (max-width: 767.98px) {
        .admin-section-heading {
            padding: 0 0.75rem;
        }

        .admin-form-card {
            padding: 1.25rem;
            border-radius: 20px;
        }

        .service-card {
            padding: 1.25rem;
        }

        .admin-form-footer {
            padding: 1.25rem;
            border-radius: 20px;
        }
    }
</style>