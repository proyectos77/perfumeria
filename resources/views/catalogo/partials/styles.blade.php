<style>
    .perfume-body {
        background: #fbf8f4;
        color: #211b18;
    }

    .perfume-hero {
        padding: 7rem 0 4rem;
        background:
            linear-gradient(120deg, rgba(33, 27, 24, 0.86), rgba(87, 62, 48, 0.72)),
            url("{{ asset('images/logo-pagina.png') }}") center right 12% / min(360px, 58vw) no-repeat,
            #2a201c;
        color: #fff;
    }

    .perfume-hero h1,
    .perfume-detail h1 {
        font-weight: 900;
        letter-spacing: 0;
    }

    .perfume-hero h1 {
        max-width: 760px;
        font-size: clamp(2.25rem, 4vw, 4.6rem);
    }

    .perfume-hero p {
        max-width: 620px;
        color: rgba(255, 255, 255, 0.78);
        font-size: 1.1rem;
    }

    .perfume-eyebrow {
        display: inline-flex;
        margin-bottom: 0.8rem;
        color: #b8865b;
        font-size: 0.78rem;
        font-weight: 900;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }

    .perfume-filter,
    .pedido-box,
    .stock-box {
        padding: 1.25rem;
        border: 1px solid rgba(184, 134, 91, 0.22);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.92);
        color: #211b18;
    }

    .perfume-card {
        overflow: hidden;
        border: 1px solid rgba(86, 64, 54, 0.12);
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 22px 60px rgba(35, 28, 24, 0.08);
    }

    .perfume-card__image {
        display: block;
        aspect-ratio: 4 / 3;
        background: #f2ebe3;
    }

    .perfume-card__image img,
    .perfume-detail__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .perfume-card__body {
        padding: 1.25rem;
    }

    .perfume-card__body span {
        color: #9f704a;
        font-weight: 800;
        font-size: 0.78rem;
        text-transform: uppercase;
    }

    .perfume-card__body h2 {
        margin-top: 0.35rem;
        font-size: 1.25rem;
        font-weight: 900;
    }

    .perfume-card__body p {
        min-height: 3.6rem;
        color: #6f625a;
    }

    .perfume-detail__image {
        aspect-ratio: 1 / 1;
        overflow: hidden;
        border-radius: 8px;
        background: #f2ebe3;
        box-shadow: 0 28px 80px rgba(35, 28, 24, 0.14);
    }

    .stock-box {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
    }
</style>
