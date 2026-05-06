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

    .perfume-hero__slides {
        position: relative;
        width: min(100%, 440px);
        aspect-ratio: 4 / 5;
        margin-left: auto;
        overflow: hidden;
        border: 1px solid rgba(199, 154, 91, 0.38);
        border-radius: 8px;
        background: rgba(255, 250, 245, 0.08);
        box-shadow: 0 34px 90px rgba(0, 0, 0, 0.28);
    }

    .perfume-hero__slides::after {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 2;
        border: 1px solid rgba(255, 250, 245, 0.16);
        pointer-events: none;
    }

    .perfume-hero__slides img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0;
        transform: scale(1.04);
        animation: hero-fade 25s infinite;
        animation-delay: calc(var(--slide-index) * 5s);
    }

    @keyframes hero-fade {
        0% {
            opacity: 0;
            transform: scale(1.04);
        }

        8%,
        20% {
            opacity: 1;
        }

        28%,
        100% {
            opacity: 0;
            transform: scale(1.12);
        }
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

    .catalog-filter-section {
        padding: 3rem 0;
        background: #fbf8f4;
        border-bottom: 1px solid rgba(199, 154, 91, 0.15);
    }

    .catalog-filter {
        display: flex;
        align-items: flex-end;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .catalog-filter__field {
        flex: 1;
        min-width: 220px;
    }

    .catalog-filter label {
        display: block;
        margin-bottom: 0.75rem;
        color: #211b18;
        font-size: 0.95rem;
        font-weight: 600;
    }

    .catalog-filter label span {
        display: block;
        color: #9c7142;
        font-size: 0.78rem;
        font-weight: 900;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }

    .catalog-filter .form-select {
        border: 1px solid rgba(199, 154, 91, 0.3);
        border-radius: 8px;
        padding: 0.75rem;
        color: #211b18;
        font-weight: 500;
    }

    .perfume-showcase {
        position: relative;
        overflow: hidden;
        padding: 2.4rem 0 2.8rem;
        background:
            linear-gradient(90deg, rgba(33, 27, 24, 0.96), rgba(58, 42, 35, 0.9)),
            #211b18;
        border-top: 1px solid rgba(199, 154, 91, 0.26);
        border-bottom: 1px solid rgba(199, 154, 91, 0.18);
    }

    .perfume-showcase::before,
    .perfume-showcase::after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        z-index: 2;
        width: min(12vw, 180px);
        pointer-events: none;
    }

    .perfume-showcase::before {
        left: 0;
        background: linear-gradient(90deg, #211b18, rgba(33, 27, 24, 0));
    }

    .perfume-showcase::after {
        right: 0;
        background: linear-gradient(270deg, #211b18, rgba(33, 27, 24, 0));
    }

    .perfume-showcase__intro {
        position: relative;
        z-index: 3;
        width: min(100% - 2rem, 1760px);
        margin: 0 auto 1.4rem;
    }

    .perfume-showcase__intro h2 {
        margin: 0;
        color: #fffaf5;
        font-size: clamp(1.6rem, 2.4vw, 2.7rem);
        font-weight: 900;
    }

    .perfume-marquee {
        position: relative;
        z-index: 1;
        width: 100%;
    }

    .perfume-marquee__track {
        display: flex;
        width: max-content;
        gap: 1rem;
        animation: perfume-marquee 52s linear infinite;
        will-change: transform;
    }

    .perfume-marquee:hover .perfume-marquee__track {
        animation-play-state: paused;
    }

    .perfume-marquee__item {
        position: relative;
        width: clamp(190px, 15vw, 280px);
        aspect-ratio: 4 / 5;
        flex: 0 0 auto;
        margin: 0;
        overflow: hidden;
        border: 1px solid rgba(199, 154, 91, 0.34);
        border-radius: 8px;
        background: #f4e7df;
        box-shadow: 0 24px 68px rgba(0, 0, 0, 0.22);
    }

    .perfume-marquee__item::after {
        content: "";
        position: absolute;
        inset: 0;
        border: 1px solid rgba(255, 250, 245, 0.22);
        pointer-events: none;
    }

    .perfume-marquee__item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.01);
    }

    @keyframes perfume-marquee {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    .catalog-section {
        padding: 3.5rem 0 4.5rem;
    }

    .catalog-shell {
        width: min(100% - 2rem, 1760px);
        padding-inline: clamp(0.25rem, 2vw, 2rem);
    }

    .catalog-grid {
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap: clamp(1rem, 1.8vw, 1.6rem);
    }

    .perfume-card {
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
        border: 1px solid rgba(58, 42, 35, 0.16);
        border-radius: 8px;
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(255, 250, 245, 0.96)),
            #fff;
        box-shadow: 0 20px 52px rgba(35, 28, 24, 0.09);
        transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease;
    }

    .perfume-card::after {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        border: 1px solid rgba(199, 154, 91, 0.18);
        border-radius: 8px;
    }

    .perfume-card:hover {
        transform: translateY(-5px);
        border-color: rgba(199, 154, 91, 0.46);
        box-shadow: 0 28px 72px rgba(35, 28, 24, 0.14);
    }

    .perfume-card__image {
        display: block;
        aspect-ratio: 1 / 1.08;
        overflow: hidden;
        background: #f2ebe3;
    }

    .perfume-card__image img,
    .perfume-detail__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .perfume-card__image img {
        transition: transform 0.35s ease;
    }

    .perfume-card:hover .perfume-card__image img {
        transform: scale(1.035);
    }

    .perfume-card__body {
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 1rem;
    }

    .perfume-card__category {
        align-self: flex-start;
        padding: 0.28rem 0.65rem;
        border: 1px solid rgba(199, 154, 91, 0.28);
        border-radius: 999px;
        background: rgba(244, 231, 223, 0.72);
        color: #9f704a;
        font-weight: 800;
        font-size: 0.68rem;
        text-transform: uppercase;
    }

    .perfume-card__body h2 {
        margin: 0.65rem 0 0;
        color: #2f241f;
        font-size: clamp(1.02rem, 1.15vw, 1.22rem);
        font-weight: 900;
        line-height: 1.15;
    }

    .perfume-card__body p {
        flex: 1;
        margin: 0.65rem 0 0;
        min-height: 3.2rem;
        color: #6f625a;
        font-size: 0.92rem;
        line-height: 1.45;
    }

    .perfume-card__meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.85rem;
        margin-top: 1rem;
        padding-top: 0.9rem;
        border-top: 1px solid rgba(58, 42, 35, 0.1);
    }

    .perfume-card__meta strong {
        color: #2f241f;
        font-size: 1.1rem;
    }

    .perfume-card__meta small {
        white-space: nowrap;
        font-weight: 800;
    }

    .perfume-card__meta .is-available {
        color: #3c7a4a;
    }

    .perfume-card__meta .is-empty {
        color: #a33a32;
    }

    .perfume-card__discount {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.35rem;
    }

    .perfume-card__discount strong {
        color: #b8865b;
        font-size: 0.9rem;
        text-decoration: line-through;
    }

    .perfume-card__discount span {
        padding: 0.2rem 0.6rem;
        border-radius: 4px;
        background: #a33a32;
        color: #fff;
        font-size: 0.75rem;
        font-weight: 800;
    }

    .perfume-card__price--sale {
        color: #18110e !important;
    }

    .product-detail__old-price {
        color: #8d6a4c;
        font-size: 1.05rem;
        font-weight: 700;
        text-decoration: line-through;
    }

    .product-detail__price {
        display: inline-flex;
        margin: 0.35rem 0 1.2rem;
        color: #18110e;
        font-family: "Playfair Display", Georgia, serif;
        font-size: clamp(2rem, 4vw, 3.2rem);
        font-weight: 900;
        line-height: 1;
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

    .order-summary {
        display: grid;
        gap: 0.65rem;
        padding: 1rem;
        border: 1px solid rgba(199, 154, 91, 0.24);
        border-radius: 8px;
        background: rgba(255, 250, 245, 0.82);
    }

    .order-summary div {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
    }

    .order-summary span,
    .order-summary small {
        color: #75655b;
        font-weight: 700;
    }

    .order-summary strong {
        color: #18110e;
        font-family: "Playfair Display", Georgia, serif;
        font-size: 1.15rem;
        font-weight: 900;
    }

    .order-summary__total {
        padding-top: 0.65rem;
        border-top: 1px solid rgba(58, 42, 35, 0.12);
    }

    .order-summary__total strong {
        font-size: 1.55rem;
    }

    .order-timeline {
        display: grid;
        gap: 1rem;
    }

    .order-timeline__item {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 1rem;
        padding: 1rem;
        border: 1px solid rgba(58, 42, 35, 0.12);
        border-radius: 8px;
        background: rgba(255, 250, 245, 0.72);
    }

    .order-timeline__marker {
        display: inline-grid;
        place-items: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #ece7e2;
        color: #75655b;
    }

    .order-timeline__item strong,
    .order-timeline__item span,
    .order-timeline__item small {
        display: block;
    }

    .order-timeline__item strong {
        color: #211b18;
    }

    .order-timeline__item span,
    .order-timeline__item small {
        color: #75655b;
    }

    .order-timeline__item.is-done .order-timeline__marker {
        background: #c79a5b;
        color: #211b18;
    }

    .order-timeline__item.is-current {
        border-color: rgba(199, 154, 91, 0.54);
        box-shadow: 0 16px 42px rgba(35, 28, 24, 0.08);
    }

    .order-timeline__item.is-cancelled .order-timeline__marker {
        background: #ffe1df;
        color: #aa2f28;
    }

    @media (min-width: 576px) {
        .catalog-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (min-width: 992px) {
        .catalog-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (min-width: 1400px) {
        .catalog-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
    }
</style>
