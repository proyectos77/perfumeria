<footer class="site-footer">
    <div class="container">
        <div class="site-footer__panel">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-4">
                    <div class="site-footer__brand">
                        <span class="site-footer__eyebrow">{{ $siteSettings->site_name }}</span>

                        <div class="site-footer__logo-group">
                            <img src="{{ $siteSettings->assetUrl($siteSettings->logo_path) }}" alt="Logo de {{ $siteSettings->site_name }}" class="site-footer__logo">
                            <div>
                                <h2>{{ $siteSettings->site_name }}</h2>
                                <p>{{ $siteSettings->site_tagline }}</p>
                            </div>
                        </div>

                        <p class="site-footer__summary">
                            {{ $siteSettings->site_summary }}
                        </p>

                        <div class="site-footer__actions">
                            <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-4 fw-bold">
                                <i class="bi bi-chat-dots me-2"></i>Solicitar diagnóstico
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="site-footer__block">
                        <h3>Navegación</h3>
                        <div class="site-footer__stack">
                            <a href="{{ route('servicios') }}" class="site-footer__essential-link">
                                <span class="site-footer__contact-icon"><i class="bi bi-grid"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>Servicios</strong>
                                </span>
                            </a>

                            <a href="{{ route('quienessomos') }}" class="site-footer__essential-link">
                                <span class="site-footer__contact-icon"><i class="bi bi-buildings"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>Quiénes somos</strong>
                                </span>
                            </a>

                            <a href="{{ route('contacto') }}" class="site-footer__essential-link">
                                <span class="site-footer__contact-icon"><i class="bi bi-chat-dots-fill"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>Formulario de contacto</strong>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="site-footer__block">
                        <h3>Contacto directo</h3>
                        <div class="site-footer__contact-list">
                            <a href="{{ $siteSettings->telUrl() }}" class="site-footer__contact-item">
                                <span class="site-footer__contact-icon"><i class="bi bi-telephone-fill"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>Teléfono</strong>
                                    <small>{{ $siteSettings->contact_phone }}</small>
                                </span>
                            </a>

                            <a href="mailto:{{ $siteSettings->contact_email }}" class="site-footer__contact-item">
                                <span class="site-footer__contact-icon"><i class="bi bi-envelope-fill"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>Correo</strong>
                                    <small>{{ $siteSettings->contact_email }}</small>
                                </span>
                            </a>

                            <a href="{{ $siteSettings->whatsappUrl() }}" target="_blank" rel="noopener" class="site-footer__contact-item">
                                <span class="site-footer__contact-icon"><i class="bi bi-whatsapp"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>WhatsApp</strong>
                                    <small>Escríbenos directamente</small>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-footer__prebottom">
                <span class="site-footer__social-label">Redes sociales</span>
                <div class="site-footer__social">
                    @forelse($siteSettings->socialLinks() as $socialLink)
                        <a href="{{ $socialLink['url'] }}" target="_blank" rel="noopener" aria-label="{{ $socialLink['label'] }} de {{ $siteSettings->site_name }}">
                            <i class="{{ $socialLink['icon'] }}"></i>
                        </a>
                    @empty
                        <span class="text-white-50 small">Actualiza tus redes desde administración.</span>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="site-footer__bottom">
            <p>&copy; {{ date('Y') }} {{ $siteSettings->site_name }}. Todos los derechos reservados.</p>
            <div class="site-footer__bottom-links">
                <a href="{{ route('privacidad') }}">Privacidad</a>
                <a href="{{ route('terminos') }}">Términos</a>
            </div>
        </div>
    </div>
</footer>
