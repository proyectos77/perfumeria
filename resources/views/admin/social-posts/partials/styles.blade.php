<style>
    .social-editor-page {
        background:
            radial-gradient(circle at top left, rgba(37, 99, 235, 0.16), transparent 28%),
            radial-gradient(circle at right center, rgba(124, 58, 237, 0.12), transparent 22%),
            linear-gradient(180deg, #060b16 0%, #0a1324 52%, #0b1627 100%);
    }

    .social-editor-shell {
        max-width: 1760px;
    }

    .social-editor-header__eyebrow {
        display: inline-flex;
        padding: 0.42rem 0.9rem;
        border-radius: 999px;
        background: rgba(59, 130, 246, 0.12);
        border: 1px solid rgba(96, 165, 250, 0.16);
        color: #93c5fd;
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .social-editor-header__title {
        margin: 0.85rem 0 0.8rem;
        color: #f8fafc;
        font-size: clamp(2rem, 2.8vw, 3rem);
        font-weight: 900;
        letter-spacing: -0.05em;
    }

    .social-editor-header__text {
        max-width: 760px;
        margin: 0;
        color: #8ea3bd;
        line-height: 1.8;
    }

    .social-editor-alert {
        border: 1px solid rgba(74, 222, 128, 0.16);
        border-radius: 20px;
        background: rgba(4, 120, 87, 0.14);
        color: #d1fae5;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.18);
    }

    .admin-switcher .btn {
        min-width: 180px;
        border-radius: 999px;
    }

    .admin-switcher .btn-outline-primary,
    .admin-switcher .btn-outline-primary:hover {
        color: #dbeafe;
        border-color: rgba(96, 165, 250, 0.18);
        background: rgba(12, 20, 36, 0.8);
    }

    .admin-switcher .btn-primary {
        border-color: transparent;
        background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 50%, #06b6d4 100%);
        box-shadow: 0 18px 30px rgba(29, 78, 216, 0.22);
    }

    .social-editor-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.35fr) minmax(300px, 0.65fr);
        gap: 1.25rem;
        align-items: start;
    }

    .social-editor-card,
    .social-log-card {
        border: 1px solid rgba(148, 163, 184, 0.12);
        border-radius: 28px;
        background: linear-gradient(180deg, rgba(10, 16, 29, 0.96) 0%, rgba(5, 9, 18, 0.98) 100%);
        box-shadow: 0 24px 65px rgba(0, 0, 0, 0.26);
    }

    .social-editor-card {
        padding: 1.35rem;
    }

    .social-form-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(290px, 0.8fr);
        gap: 1.2rem;
    }

    .social-form-panel {
        display: grid;
        gap: 1rem;
    }

    .social-form-panel__section {
        padding: 1rem;
        border-radius: 22px;
        background: rgba(15, 23, 42, 0.74);
        border: 1px solid rgba(148, 163, 184, 0.08);
    }

    .social-form-panel__summary h3,
    .social-log-card__head h2 {
        margin: 0 0 0.75rem;
        color: #f8fafc;
        font-size: 1.2rem;
        font-weight: 900;
    }

    .social-form-panel__summary p,
    .social-form-panel__summary ul,
    .social-log-card__head p {
        margin: 0;
        color: #8ea3bd;
        line-height: 1.75;
    }

    .social-form-panel__summary ul {
        padding-left: 1.15rem;
        margin-top: 0.8rem;
    }

    .social-form-control,
    .social-form-control:focus {
        min-height: 52px;
        color: #e2e8f0;
        border-color: rgba(148, 163, 184, 0.18);
        background: rgba(9, 15, 27, 0.9);
    }

    textarea.social-form-control {
        min-height: auto;
    }

    .social-form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(34, 211, 238, 0.12);
        border-color: rgba(34, 211, 238, 0.36);
    }

    .social-platform-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.8rem;
    }

    .social-platform-option {
        display: flex;
        gap: 0.75rem;
        align-items: center;
        padding: 0.85rem 0.95rem;
        border-radius: 16px;
        background: rgba(9, 15, 27, 0.9);
        border: 1px solid rgba(148, 163, 184, 0.14);
        color: #e2e8f0;
        cursor: pointer;
    }

    .social-platform-option input {
        accent-color: #22d3ee;
    }

    .social-ai-status {
        display: inline-flex;
        align-items: center;
        min-height: 40px;
        color: #8ea3bd;
        font-size: 0.92rem;
        line-height: 1.5;
    }

    .social-ai-status--loading {
        color: #7dd3fc;
    }

    .social-ai-status--success {
        color: #86efac;
    }

    .social-ai-status--error {
        color: #fca5a5;
    }

    .social-log-card {
        padding: 1.2rem;
    }

    .social-pill {
        display: inline-flex;
        padding: 0.42rem 0.9rem;
        border-radius: 999px;
        background: rgba(59, 130, 246, 0.12);
        border: 1px solid rgba(96, 165, 250, 0.16);
        color: #93c5fd;
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .social-log-list {
        display: grid;
        gap: 0.8rem;
        margin-top: 1rem;
    }

    .social-log-item,
    .social-log-empty {
        padding: 0.95rem 1rem;
        border-radius: 18px;
        background: rgba(15, 23, 42, 0.72);
        border: 1px solid rgba(148, 163, 184, 0.08);
    }

    .social-log-item strong {
        display: block;
        color: #f8fafc;
        margin-bottom: 0.35rem;
    }

    .social-log-item p,
    .social-log-item small,
    .social-log-empty {
        color: #8ea3bd;
        margin: 0;
        line-height: 1.7;
    }

    @media (max-width: 1199.98px) {
        .social-editor-layout,
        .social-form-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767.98px) {
        .social-platform-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
