@extends('base')
@section('title', 'Accueil')

@section('head')
<style>
    /* ── HERO ── */
    .hero {
        min-height: 100vh;
        background:
            radial-gradient(ellipse at 65% 50%, rgba(201,168,76,.07) 0%, transparent 55%),
            radial-gradient(ellipse at 15% 80%, rgba(201,168,76,.05) 0%, transparent 50%),
            linear-gradient(145deg, #07090f 0%, #0d1626 55%, #152035 100%);
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }
    .hero-grid {
        position: absolute; inset: 0;
        background-image:
            linear-gradient(rgba(201,168,76,.035) 1px, transparent 1px),
            linear-gradient(90deg, rgba(201,168,76,.035) 1px, transparent 1px);
        background-size: 65px 65px;
        pointer-events: none;
    }
    .hero-ornament {
        position: absolute;
        right: -10vw; top: 50%;
        transform: translateY(-50%);
        width: 55vw; height: 55vw;
        max-width: 700px; max-height: 700px;
        border-radius: 50%;
        border: 1px solid rgba(201,168,76,.07);
        box-shadow: inset 0 0 80px rgba(201,168,76,.04);
        pointer-events: none;
    }
    .hero-ornament::after {
        content: '';
        position: absolute; inset: 40px;
        border-radius: 50%;
        border: 1px solid rgba(201,168,76,.06);
    }

    .hero h1 {
        font-size: clamp(2.6rem, 5.5vw, 5rem);
        line-height: 1.08;
        font-weight: 700;
        color: var(--cream);
        letter-spacing: -.5px;
    }
    .hero h1 em { font-style: italic; color: var(--gold); }
    .hero-desc {
        color: rgba(240,236,227,.6);
        font-size: 1rem;
        line-height: 1.85;
        max-width: 500px;
    }
    .hero-badge-wrap { display: flex; flex-direction: column; gap: 1rem; }
    .hero-badge {
        background: rgba(201,168,76,.07);
        border: 1px solid rgba(201,168,76,.2);
        border-radius: 3px;
        padding: 1.1rem 1.6rem;
        display: flex;
        align-items: center;
        gap: 1.4rem;
        backdrop-filter: blur(8px);
    }
    .hb-num {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        color: var(--gold);
        font-weight: 700;
        line-height: 1;
    }
    .hb-label {
        font-size: .7rem;
        color: rgba(240,236,227,.55);
        text-transform: uppercase;
        letter-spacing: 1.2px;
    }
    .hb-div { width: 1px; height: 36px; background: rgba(201,168,76,.25); flex-shrink: 0; }

    /* ── STATS ── */
    .stats-bar {
        background: #0a0e1a;
        border-top: 1px solid rgba(201,168,76,.1);
        border-bottom: 1px solid rgba(201,168,76,.1);
        padding: 0;
    }
    .stat-col {
        padding: 2.5rem 1rem;
        text-align: center;
        position: relative;
    }
    .stat-col::after {
        content: '';
        position: absolute;
        right: 0; top: 20%; bottom: 20%;
        width: 1px;
        background: rgba(201,168,76,.12);
    }
    .stat-col:last-child::after { display: none; }
    .stat-num {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        color: var(--gold);
        font-weight: 700;
        line-height: 1;
        display: block;
    }
    .stat-label {
        font-size: .68rem;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--muted);
        margin-top: .45rem;
        display: block;
    }

    /* ── PROPERTIES ── */
    .latest-section { padding: 7rem 0; }
    .cta-section {
        padding: 6rem 0;
        background: linear-gradient(135deg, rgba(201,168,76,.06), rgba(201,168,76,.02));
        border-top: 1px solid rgba(201,168,76,.1);
        border-bottom: 1px solid rgba(201,168,76,.1);
        text-align: center;
    }
    .cta-section h2 { font-size: clamp(1.8rem, 3vw, 2.6rem); }
</style>
@endsection

@section('content')

{{-- ── HERO ── --}}
<section class="hero">
    <div class="hero-grid"></div>
    <div class="hero-ornament"></div>

    <div class="container position-relative" style="padding-top:9rem; padding-bottom:6rem;">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <p class="eyebrow mb-3" data-aos="fade-up">Agence Immobilière de Prestige</p>
                <h1 data-aos="fade-up" data-aos-delay="80">
                    L'immobilier<br>
                    d'exception,<br>
                    <em>à votre service.</em>
                </h1>
                <div class="gold-sep left my-4" data-aos="fade-up" data-aos-delay="130"></div>
                <p class="hero-desc mb-5" data-aos="fade-up" data-aos-delay="180">
                    Depuis plus de 20 ans, nous accompagnons nos clients dans leurs projets immobiliers avec rigueur et expertise. Découvrez notre sélection exclusive de biens d'exception.
                </p>
                <div class="d-flex gap-3 flex-wrap" data-aos="fade-up" data-aos-delay="230">
                    <a href="{{ route('property.index') }}" class="btn-gold">Découvrir nos biens</a>
                    <a href="#derniers-biens" class="btn-outline-gold">Nouveautés</a>
                </div>
            </div>

            <div class="col-lg-4 offset-lg-1" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-badge-wrap">
                    <div class="hero-badge">
                        <div>
                            <div class="hb-num">500+</div>
                            <div class="hb-label">Biens vendus</div>
                        </div>
                        <div class="hb-div"></div>
                        <div>
                            <div class="hb-num">98%</div>
                            <div class="hb-label">Clients satisfaits</div>
                        </div>
                    </div>
                    <div class="hero-badge">
                        <div>
                            <div class="hb-num">20</div>
                            <div class="hb-label">Ans d'expertise</div>
                        </div>
                        <div class="hb-div"></div>
                        <div>
                            <div class="hb-num">50+</div>
                            <div class="hb-label">Villes couvertes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── STATS BAR ── --}}
<div class="stats-bar">
    <div class="container">
        <div class="row g-0">
            <div class="col-6 col-md-3 stat-col" data-aos="fade-up">
                <span class="stat-num">500+</span>
                <span class="stat-label">Biens Vendus</span>
            </div>
            <div class="col-6 col-md-3 stat-col" data-aos="fade-up" data-aos-delay="80">
                <span class="stat-num">20</span>
                <span class="stat-label">Ans d'Expérience</span>
            </div>
            <div class="col-6 col-md-3 stat-col" data-aos="fade-up" data-aos-delay="160">
                <span class="stat-num">50+</span>
                <span class="stat-label">Villes</span>
            </div>
            <div class="col-6 col-md-3 stat-col" data-aos="fade-up" data-aos-delay="240">
                <span class="stat-num">98%</span>
                <span class="stat-label">Satisfaction</span>
            </div>
        </div>
    </div>
</div>

{{-- ── DERNIERS BIENS ── --}}
<section class="latest-section" id="derniers-biens">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <p class="eyebrow">Sélection exclusive</p>
            <div class="gold-sep"></div>
            <h2 class="section-title mt-2">Nos dernières acquisitions</h2>
        </div>

        <div class="row g-4">
            @foreach($properties as $property)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 70 }}">
                    @include('property.card')
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('property.index') }}" class="btn-outline-gold">
                Voir tous nos biens &nbsp;&rarr;
            </a>
        </div>
    </div>
</section>

{{-- ── CTA ── --}}
<section class="cta-section">
    <div class="container" data-aos="fade-up">
        <p class="eyebrow">Prêt à concrétiser votre projet ?</p>
        <div class="gold-sep"></div>
        <h2 class="section-title mt-2 mb-3">Un bien à vendre ? Contactez-nous.</h2>
        <p style="color:var(--muted); max-width:500px; margin:0 auto 2rem;">
            Nos experts vous accompagnent de l'estimation à la signature, avec un service personnalisé et transparent.
        </p>
        <a href="mailto:contact@luximmo.fr" class="btn-gold">Nous contacter</a>
    </div>
</section>

@endsection