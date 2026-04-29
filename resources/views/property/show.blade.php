@extends('base')
@section('title', $property->title)

@section('head')
<style>
    .show-hero {
        min-height: 55vh;
        background:
            radial-gradient(ellipse at 60% 40%, rgba(201,168,76,.08) 0%, transparent 55%),
            linear-gradient(145deg, #ffffff 0%, #f8fafc 60%, #f0f4f8 100%);
        display: flex;
        align-items: flex-end;
        padding-top: 9rem;
        padding-bottom: 3.5rem;
        border-bottom: 1px solid rgba(201,168,76,.15);
        position: relative;
        overflow: hidden;
    }
    .show-hero-grid {
        position: absolute; inset: 0;
        background-image:
            linear-gradient(rgba(201,168,76,.07) 1px, transparent 1px),
            linear-gradient(90deg, rgba(201,168,76,.07) 1px, transparent 1px);
        background-size: 60px 60px;
        pointer-events: none;
    }
    .show-breadcrumb {
        font-size: .72rem;
        letter-spacing: 1px;
        color: var(--muted);
        margin-bottom: 1.2rem;
    }
    .show-breadcrumb a { color: var(--gold); text-decoration: none; }
    .show-breadcrumb a:hover { text-decoration: underline; }

    .show-title {
        font-size: clamp(1.8rem, 4vw, 3.5rem);
        line-height: 1.1;
        margin-bottom: 1rem;
        color: #1e2235;
    }
    .show-location {
        font-size: .9rem;
        color: var(--muted);
    }
    .show-location i { color: var(--gold); margin-right: .4rem; }

    .show-price-tag {
        background: linear-gradient(135deg, var(--gold), var(--gold-light));
        color: var(--dark);
        border-radius: 3px;
        padding: .6rem 1.4rem;
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        display: inline-block;
    }

    .sold-ribbon {
        display: inline-block;
        background: #ef4444;
        color: #fff;
        font-size: .65rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 700;
        padding: .3rem .9rem;
        border-radius: 2px;
        margin-left: .8rem;
        vertical-align: middle;
    }

    /* GALLERY PLACEHOLDER */
    .gallery-section { padding: 3rem 0; }
    .gallery-main {
        height: 400px;
        background: linear-gradient(135deg, #eef1f6, #e2e8f0);
        border-radius: 4px;
        display: flex; align-items: center; justify-content: center;
        font-size: 5rem;
        color: rgba(201,168,76,.3);
        border: 1px solid rgba(201,168,76,.15);
    }
    .gallery-thumbs { display: flex; gap: .8rem; margin-top: .8rem; }
    .gallery-thumb {
        flex: 1;
        height: 100px;
        background: linear-gradient(135deg, #eef1f6, #e2e8f0);
        border-radius: 3px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem;
        color: rgba(201,168,76,.25);
        border: 1px solid rgba(201,168,76,.12);
        cursor: pointer;
        transition: border-color .3s;
    }
    .gallery-thumb:hover { border-color: rgba(201,168,76,.45); }

    /* DETAILS */
    .details-section { padding: 4rem 0 5rem; }

    .info-block {
        background: #ffffff;
        border: 1px solid rgba(201,168,76,.2);
        border-radius: 4px;
        padding: 2rem;
    }

    .info-block h3 {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        padding-bottom: .9rem;
        border-bottom: 1px solid rgba(201,168,76,.12);
        color: #1e2235;
    }

    .spec-grid { display: grid; grid-template-columns: 1fr 1fr; gap: .8rem; }
    .spec-item {
        background: #f8fafc;
        border: 1px solid rgba(201,168,76,.1);
        border-radius: 3px;
        padding: .9rem 1rem;
        display: flex; align-items: center; gap: .8rem;
    }
    .spec-icon {
        width: 36px; height: 36px;
        background: rgba(201,168,76,.1);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: var(--gold);
        font-size: .9rem;
        flex-shrink: 0;
    }
    .spec-label { font-size: .65rem; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; display: block; }
    .spec-value { font-size: .95rem; color: #1e2235; font-weight: 500; display: block; margin-top: .1rem; }

    .desc-text {
        color: rgba(30,34,53,.75);
        line-height: 1.9;
        font-size: .95rem;
    }

    .option-tag {
        background: rgba(201,168,76,.1);
        border: 1px solid rgba(201,168,76,.25);
        color: var(--gold);
        font-size: .7rem;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: .35rem .9rem;
        border-radius: 2px;
        display: inline-block;
        margin: .25rem;
    }

    /* CONTACT CARD */
    .contact-card {
        background: #ffffff;
        border: 1px solid rgba(201,168,76,.2);
        border-radius: 4px;
        padding: 2rem;
        position: sticky;
        top: 90px;
    }
    .contact-card h4 { font-size: 1.3rem; margin-bottom: .5rem; color: #1e2235; }
    .contact-card p { color: var(--muted); font-size: .88rem; margin-bottom: 1.5rem; }

    .contact-input {
        background: #f8fafc;
        border: 1px solid rgba(201,168,76,.2);
        color: #1e2235;
        border-radius: 2px;
        padding: .7rem 1rem;
        width: 100%;
        font-size: .88rem;
        margin-bottom: .8rem;
        outline: none;
        transition: border-color .3s;
        font-family: 'Inter', sans-serif;
    }
    .contact-input::placeholder { color: var(--muted); }
    .contact-input:focus { border-color: var(--gold); }

    .contact-submit {
        background: linear-gradient(135deg, var(--gold), var(--gold-light));
        color: var(--dark);
        border: none;
        border-radius: 2px;
        padding: .8rem;
        width: 100%;
        font-size: .75rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 700;
        cursor: pointer;
        transition: transform .3s, box-shadow .3s;
    }
    .contact-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(201,168,76,.3);
    }

    .agent-badge {
        display: flex; align-items: center; gap: 1rem;
        padding-top: 1.2rem;
        margin-top: 1.2rem;
        border-top: 1px solid rgba(201,168,76,.1);
    }
    .agent-avatar {
        width: 48px; height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--gold), var(--gold-light));
        display: flex; align-items: center; justify-content: center;
        color: var(--dark);
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    .agent-name { font-weight: 600; color: #1e2235; font-size: .9rem; }
    .agent-title { font-size: .72rem; color: var(--muted); }
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="show-hero">
    <div class="show-hero-grid"></div>
    <div class="container position-relative w-100">
        <div class="show-breadcrumb" data-aos="fade-up">
            <a href="/">Accueil</a> &nbsp;/&nbsp;
            <a href="{{ route('property.index') }}">Nos Biens</a> &nbsp;/&nbsp;
            <span style="color:#1e2235">{{ Str::limit($property->title, 40) }}</span>
        </div>

        <div class="row align-items-end g-4">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="80">
                <h1 class="show-title">
                    {{ $property->title }}
                    @if($property->sold)
                        <span class="sold-ribbon">Vendu</span>
                    @endif
                </h1>
                <p class="show-location">
                    <i class="fa-solid fa-location-dot"></i>
                    {{ $property->address }}, {{ $property->postal_code }} {{ $property->city }}
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-up" data-aos-delay="140">
                <div class="show-price-tag">
                    {{ number_format($property->price, 0, ',', ' ') }}&nbsp;€
                </div>
            </div>
        </div>
    </div>
</section>

{{-- GALLERY --}}
<section class="gallery-section">
    <div class="container" data-aos="fade-up">
        <div class="gallery-main">
            <i class="fa-solid fa-building"></i>
        </div>
        <div class="gallery-thumbs">
            @for($i = 0; $i < 4; $i++)
                <div class="gallery-thumb"><i class="fa-solid fa-image"></i></div>
            @endfor
        </div>
    </div>
</section>

{{-- DETAILS --}}
<section class="details-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">

                {{-- SPECS --}}
                <div class="info-block mb-4" data-aos="fade-up">
                    <h3>Caractéristiques</h3>
                    <div class="spec-grid">
                        <div class="spec-item">
                            <div class="spec-icon"><i class="fa-solid fa-ruler-combined"></i></div>
                            <div>
                                <span class="spec-label">Surface</span>
                                <span class="spec-value">{{ $property->surface }} m²</span>
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="fa-solid fa-door-open"></i></div>
                            <div>
                                <span class="spec-label">Pièces</span>
                                <span class="spec-value">{{ $property->rooms }}</span>
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="fa-solid fa-bed"></i></div>
                            <div>
                                <span class="spec-label">Chambres</span>
                                <span class="spec-value">{{ $property->bedrooms }}</span>
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="fa-solid fa-stairs"></i></div>
                            <div>
                                <span class="spec-label">Étage</span>
                                <span class="spec-value">
                                    {{ $property->floor == 0 ? 'Rez-de-chaussée' : $property->floor . 'ᵉ étage' }}
                                </span>
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="fa-solid fa-city"></i></div>
                            <div>
                                <span class="spec-label">Ville</span>
                                <span class="spec-value">{{ $property->city }}</span>
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="fa-solid fa-map-pin"></i></div>
                            <div>
                                <span class="spec-label">Code postal</span>
                                <span class="spec-value">{{ $property->postal_code }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DESCRIPTION --}}
                <div class="info-block mb-4" data-aos="fade-up" data-aos-delay="80">
                    <h3>Description</h3>
                    <p class="desc-text">{{ $property->description }}</p>
                </div>

                {{-- OPTIONS --}}
                @if($property->options->isNotEmpty())
                    <div class="info-block" data-aos="fade-up" data-aos-delay="120">
                        <h3>Équipements &amp; Options</h3>
                        <div>
                            @foreach($property->options as $option)
                                <span class="option-tag">
                                    <i class="fa-solid fa-check me-1"></i> {{ $option->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            {{-- SIDEBAR: CONTACT --}}
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="160">
                <div class="contact-card">
                    <h4>Demande d'information</h4>
                    <p>Intéressé par ce bien ? Remplissez le formulaire, nous vous recontacterons rapidement.</p>

                    <form>
                        <input class="contact-input" type="text" placeholder="Votre nom">
                        <input class="contact-input" type="email" placeholder="Votre e-mail">
                        <input class="contact-input" type="tel" placeholder="Votre téléphone">
                        <textarea class="contact-input" rows="3"
                                  placeholder="Votre message…" style="resize:none;"></textarea>
                        <button type="submit" class="contact-submit">
                            <i class="fa-solid fa-paper-plane me-2"></i> Envoyer ma demande
                        </button>
                    </form>

                    <div class="agent-badge">
                        <div class="agent-avatar"><i class="fa-solid fa-user-tie"></i></div>
                        <div>
                            <div class="agent-name">Sophie Martin</div>
                            <div class="agent-title">Conseillère Immobilière — LuxImmo</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5" data-aos="fade-up">
            <a href="{{ route('property.index') }}" class="btn-outline-gold">
                <i class="fa-solid fa-arrow-left me-2"></i> Retour aux biens
            </a>
        </div>
    </div>
</section>

@endsection