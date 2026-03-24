<footer class="site-footer">
    <div class="container">
        <div class="site-footer__panel">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-7">
                    <div class="site-footer__brand">
                        <span class="site-footer__eyebrow">CrearSystem</span>

                        <div class="site-footer__logo-group">
                            <img src="{{ asset('images/logo-crear-system-4.png') }}" alt="Logo de Crear System" class="site-footer__logo">
                            <div>
                                <h2>Crear System</h2>
                                <p>Desarrollo web, software y automatizacion para empresas que necesitan una presencia digital clara, util y profesional.</p>
                            </div>
                        </div>

                        <p class="site-footer__summary">
                            Creamos soluciones digitales bien presentadas, faciles de usar y alineadas con objetivos reales de negocio.
                        </p>

                        <div class="site-footer__actions">
                            <a href="{{ route('contacto') }}" class="btn btn-warning btn-lg px-4 fw-bold">
                                <i class="bi bi-chat-dots me-2"></i>Solicitar asesoria
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="site-footer__block">
                        <h3>Lo necesario</h3>
                        <p>Accesos directos y canales listos para conversar contigo.</p>
                        <div class="site-footer__essential-grid">
                            <a href="{{ route('servicios') }}" class="site-footer__essential-link">
                                <span class="site-footer__contact-icon"><i class="bi bi-grid"></i></span>
                                <span>Servicios</span>
                            </a>
                            <a href="{{ route('contacto') }}" class="site-footer__essential-link">
                                <span class="site-footer__contact-icon"><i class="bi bi-chat-dots-fill"></i></span>
                                <span>Contacto</span>
                            </a>
                            <a href="tel:+573124926898" class="site-footer__essential-link">
                                <span class="site-footer__contact-icon"><i class="bi bi-telephone-fill"></i></span>
                                <span>+57 312 492 6898</span>
                            </a>
                            <a href="mailto:crearsystem@gmail.com" class="site-footer__essential-link">
                                <span class="site-footer__contact-icon"><i class="bi bi-envelope-fill"></i></span>
                                <span>crearsystem@gmail.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-footer__prebottom">
                <span class="site-footer__social-label">Redes sociales</span>
                <div class="site-footer__social">
                    <a href="#" aria-label="LinkedIn de Crear System">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="#" aria-label="Instagram de Crear System">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" aria-label="Facebook de Crear System">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" aria-label="TikTok de Crear System">
                        <i class="bi bi-tiktok"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="site-footer__bottom">
            <p>&copy; {{ date('Y') }} Crear System. Todos los derechos reservados.</p>
            <div class="site-footer__bottom-links">
                <a href="{{ route('privacidad') }}">Privacidad</a>
                <a href="{{ route('terminos') }}">Terminos</a>
            </div>
        </div>
    </div>
</footer>
