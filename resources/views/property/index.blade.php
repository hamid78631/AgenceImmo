@extends('base')
@section('title', 'Tous nos biens')

@section('head')
<style>
    .search-hero {
        padding: 10rem 0 4rem;
        background:
            radial-gradient(ellipse at 50% 0%, rgba(201,168,76,.07) 0%, transparent 60%),
            linear-gradient(180deg, #0d1626 0%, #07090f 100%);
        border-bottom: 1px solid rgba(201,168,76,.1);
        text-align: center;
    }
    .search-hero h1 { font-size: clamp(2rem, 4vw, 3.2rem); }

    .search-form-wrap {
        background: rgba(13,22,38,.8);
        border: 1px solid rgba(201,168,76,.15);
        border-radius: 4px;
        padding: 2rem;
        backdrop-filter: blur(12px);
        max-width: 860px;
        margin: 2.5rem auto 0;
    }

    .search-field label {
        font-size: .68rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--gold);
        margin-bottom: .4rem;
        display: block;
    }
    .search-field input {
        background: rgba(7,9,15,.7);
        border: 1px solid rgba(201,168,76,.2);
        color: var(--cream);
        border-radius: 2px;
        padding: .7rem 1rem;
        width: 100%;
        font-size: .9rem;
        transition: border-color .3s, box-shadow .3s;
        outline: none;
    }
    .search-field input::placeholder { color: var(--muted); }
    .search-field input:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(201,168,76,.1);
    }
    .search-btn {
        background: linear-gradient(135deg, var(--gold), var(--gold-light));
        color: var(--dark);
        border: none;
        border-radius: 2px;
        padding: .7rem 2rem;
        font-size: .75rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 700;
        cursor: pointer;
        transition: transform .3s, box-shadow .3s;
        align-self: flex-end;
        width: 100%;
    }
    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(201,168,76,.35);
    }

    .results-section { padding: 5rem 0; }

    .results-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2.5rem;
        padding-bottom: 1.2rem;
        border-bottom: 1px solid rgba(201,168,76,.1);
    }
    .results-count {
        font-size: .78rem;
        color: var(--muted);
        letter-spacing: 1px;
    }
    .results-count strong { color: var(--gold); }

    .empty-state {
        text-align: center;
        padding: 5rem 1rem;
    }
    .empty-icon {
        width: 80px; height: 80px;
        border-radius: 50%;
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: var(--gold);
    }
    .empty-state h4 { font-size: 1.3rem; color: var(--cream); margin-bottom: .5rem; }
    .empty-state p { color: var(--muted); font-size: .9rem; }
</style>
@endsection

@section('content')

<section class="search-hero">
    <div class="container">
        <p class="eyebrow" data-aos="fade-up">Notre catalogue</p>
        <div class="gold-sep" data-aos="fade-up"></div>
        <h1 class="section-title mt-2" data-aos="fade-up" data-aos-delay="80">Tous nos biens</h1>

        <form action="" method="get" class="search-form-wrap" data-aos="fade-up" data-aos-delay="150">
            <div class="row g-3 align-items-end">
                <div class="col-md-3 col-6 search-field">
                    <label>Surface min (m²)</label>
                    <input type="number" name="surface" min="0"
                           value="{{ $input['surface'] ?? '' }}" placeholder="Ex: 50">
                </div>
                <div class="col-md-3 col-6 search-field">
                    <label>Pièces min</label>
                    <input type="number" name="rooms" min="0"
                           value="{{ $input['rooms'] ?? '' }}" placeholder="Ex: 3">
                </div>
                <div class="col-md-3 col-6 search-field">
                    <label>Budget max (€)</label>
                    <input type="number" name="price" min="0"
                           value="{{ $input['price'] ?? '' }}" placeholder="Ex: 300000">
                </div>
                <div class="col-md-3 col-6 search-field">
                    <label>Mot-clé</label>
                    <input type="text" name="title"
                           value="{{ $input['title'] ?? '' }}" placeholder="Appartement, villa…">
                </div>
                <div class="col-12">
                    <button type="submit" class="search-btn">
                        <i class="fa-solid fa-magnifying-glass me-2"></i> Rechercher
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="results-section">
    <div class="container">
        <div class="results-header" data-aos="fade-up">
            <span class="section-title" style="font-size:1.6rem;">Résultats</span>
            <span class="results-count">
                <strong>{{ $properties->total() }}</strong> bien(s) trouvé(s)
            </span>
        </div>

        @forelse($properties as $property)
            @if($loop->first)
                <div class="row g-4">
            @endif
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 70 }}">
                    @include('property.card')
                </div>
            @if($loop->last)
                </div>
            @endif
        @empty
            <div class="empty-state" data-aos="fade-up">
                <div class="empty-icon"><i class="fa-solid fa-house-circle-xmark"></i></div>
                <h4>Aucun bien trouvé</h4>
                <p>Aucun bien ne correspond à votre recherche. Modifiez vos filtres.</p>
                <a href="{{ route('property.index') }}" class="btn-outline-gold mt-3">
                    Réinitialiser la recherche
                </a>
            </div>
        @endforelse

        @if($properties->hasPages())
            <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                {{ $properties->withQueryString()->links() }}
            </div>
        @endif
    </div>
</section>

@endsection