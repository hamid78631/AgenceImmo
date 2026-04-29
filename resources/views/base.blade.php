<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Accueil') | LuxImmo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --gold:       #c9a84c;
            --gold-light: #e8c97a;
            --gold-dim:   rgba(201,168,76,0.1);
            --dark:       #1a1a2e;
            --navy:       #f0f4f8;
            --card-bg:    #ffffff;
            --card-border:rgba(201,168,76,0.2);
            --cream:      #1e2235;
            --muted:      #6b7280;
            --light-gray: #9ca3af;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #1e2235;
            overflow-x: hidden;
            line-height: 1.7;
        }

        h1,h2,h3,h4,h5,h6 { font-family: 'Playfair Display', serif; }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #f0f0f0; }
        ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 3px; }

        /* ───── NAVBAR ───── */
        #mainNav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.6rem 3rem;
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(201,168,76,.12);
            transition: all .4s ease;
        }
        #mainNav.scrolled {
            background: rgba(255,255,255,.98);
            padding: 1rem 3rem;
            border-bottom: 1px solid rgba(201,168,76,.2);
            box-shadow: 0 2px 20px rgba(0,0,0,.06);
        }

        .nav-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.55rem;
            font-weight: 700;
            color: var(--gold);
            text-decoration: none;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .nav-brand span { color: var(--cream); }

        .nav-links { display: flex; align-items: center; gap: .5rem; }

        .nav-links a {
            color: rgba(30,34,53,.65);
            font-size: .78rem;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            font-weight: 500;
            padding: .5rem 1rem;
            text-decoration: none;
            position: relative;
            transition: color .3s;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 2px; left: 50%;
            transform: translateX(-50%);
            width: 0; height: 1px;
            background: var(--gold);
            transition: width .3s;
        }
        .nav-links a:hover,
        .nav-links a.active { color: var(--gold); }
        .nav-links a:hover::after,
        .nav-links a.active::after { width: 60%; }

        .btn-nav-admin {
            border: 1px solid rgba(201,168,76,.45);
            color: var(--gold) !important;
            border-radius: 2px;
            padding: .45rem 1.1rem !important;
            margin-left: .5rem;
            transition: background .3s, color .3s !important;
        }
        .btn-nav-admin:hover { background: var(--gold); color: #fff !important; }
        .btn-nav-admin::after { display: none !important; }

        /* ───── GLOBAL BUTTONS ───── */
        .btn-gold {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--dark);
            border: none;
            padding: .85rem 2.2rem;
            font-size: .78rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 700;
            border-radius: 2px;
            cursor: pointer;
            transition: transform .3s, box-shadow .3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(201,168,76,.35);
            color: var(--dark);
        }

        .btn-outline-gold {
            background: transparent;
            color: var(--gold);
            border: 1px solid var(--gold);
            padding: .85rem 2.2rem;
            font-size: .78rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 700;
            border-radius: 2px;
            cursor: pointer;
            transition: background .3s, color .3s, transform .3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-outline-gold:hover {
            background: var(--gold);
            color: var(--dark);
            transform: translateY(-3px);
        }

        /* ───── GOLD SEPARATOR ───── */
        .gold-sep {
            width: 55px; height: 2px;
            background: linear-gradient(90deg, var(--gold), transparent);
            margin: .9rem auto;
        }
        .gold-sep.left { margin-left: 0; }

        /* ───── SECTION HEADINGS ───── */
        .eyebrow {
            font-size: .68rem;
            letter-spacing: 4.5px;
            text-transform: uppercase;
            color: var(--gold);
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }
        .section-title {
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            color: #1e2235;
            line-height: 1.15;
        }

        /* ───── PROPERTY CARD ───── */
        .prop-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 4px;
            overflow: hidden;
            transition: transform .4s ease, border-color .4s ease, box-shadow .4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .prop-card:hover {
            transform: translateY(-10px);
            border-color: rgba(201,168,76,.5);
            box-shadow: 0 25px 60px rgba(0,0,0,.1);
        }
        .prop-card-img {
            height: 200px;
            background: linear-gradient(135deg, #eef1f6, #e2e8f0);
            position: relative;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
        }
        .prop-card-img::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(248,250,252,.5) 100%);
        }
        .prop-card-img i {
            font-size: 3.5rem;
            color: rgba(201,168,76,.3);
        }
        .prop-badge {
            position: absolute;
            top: .9rem; left: .9rem;
            background: rgba(201,168,76,.92);
            color: #07090f;
            font-size: .62rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            padding: .28rem .75rem;
            border-radius: 2px;
            z-index: 2;
        }
        .prop-badge-sold {
            position: absolute;
            top: .9rem; right: .9rem;
            background: rgba(239,68,68,.9);
            color: #fff;
            font-size: .62rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            padding: .28rem .75rem;
            border-radius: 2px;
            z-index: 2;
        }
        .prop-card-body {
            padding: 1.4rem;
            display: flex; flex-direction: column; flex: 1;
        }
        .prop-loc {
            font-size: .72rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: .6rem;
        }
        .prop-loc i { color: var(--gold); margin-right: .25rem; }
        .prop-title {
            font-size: 1.05rem;
            margin-bottom: .85rem;
            line-height: 1.3;
            flex: 1;
        }
        .prop-title a { color: #1e2235; text-decoration: none; transition: color .3s; }
        .prop-title a:hover { color: var(--gold); }
        .prop-specs {
            display: flex; gap: 1rem;
            font-size: .8rem;
            color: var(--light-gray);
            margin-bottom: 1.1rem;
            padding-bottom: 1.1rem;
            border-bottom: 1px solid rgba(201,168,76,.1);
        }
        .prop-specs span i { color: var(--gold); margin-right: .3rem; }
        .prop-footer {
            display: flex; align-items: center; justify-content: space-between;
        }
        .prop-price {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: var(--gold);
            font-weight: 700;
        }
        .prop-link {
            font-size: .7rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--gold);
            text-decoration: none;
            border: 1px solid rgba(201,168,76,.3);
            padding: .38rem .85rem;
            border-radius: 2px;
            transition: background .3s, color .3s;
        }
        .prop-link:hover { background: var(--gold); color: var(--dark); }

        /* ───── PAGINATION ───── */
        .pagination .page-link {
            background: #ffffff;
            border-color: rgba(201,168,76,.25);
            color: #1e2235;
            padding: .55rem 1rem;
            transition: background .25s, color .25s;
        }
        .pagination .page-link:hover { background: var(--gold); color: #fff; border-color: var(--gold); }
        .pagination .page-item.active .page-link { background: var(--gold); border-color: var(--gold); color: #fff; }

        /* ───── FOOTER ───── */
        .site-footer {
            background: #f0f4f8;
            border-top: 1px solid rgba(201,168,76,.18);
            padding: 5rem 0 2rem;
            margin-top: 7rem;
        }
        .site-footer .f-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--gold);
            letter-spacing: 2px;
            display: block;
            margin-bottom: .8rem;
        }
        .site-footer p { color: var(--muted); font-size: .9rem; line-height: 1.8; }
        .site-footer h6 {
            color: var(--gold);
            font-size: .68rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 1.3rem;
            font-family: 'Inter', sans-serif;
        }
        .site-footer a {
            color: var(--muted);
            text-decoration: none;
            font-size: .88rem;
            display: block;
            margin-bottom: .45rem;
            transition: color .3s;
        }
        .site-footer a:hover { color: var(--gold); }
        .f-divider { border-color: rgba(201,168,76,.15); margin: 2rem 0 1.5rem; }
        .f-copy { color: var(--muted); font-size: .78rem; }
    </style>

    @yield('head')
</head>
<body>

@php $route = request()->route()->getName(); @endphp

<nav id="mainNav">
    <a href="/" class="nav-brand">Lux<span>Immo</span></a>
    <div class="nav-links">
        <a href="{{ route('property.index') }}" class="{{ str_contains($route, 'property.') ? 'active' : '' }}">Nos Biens</a>
        <a href="{{ route('admin.property.index') }}" class="btn-nav-admin">Admin</a>
    </div>
</nav>

@yield('content')

<footer class="site-footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <span class="f-brand">LuxImmo</span>
                <p>Votre partenaire d'excellence pour l'acquisition et la vente de biens immobiliers d'exception. Nous sélectionnons les meilleures propriétés pour vous.</p>
                <div class="gold-sep left mt-4"></div>
            </div>
            <div class="col-lg-2 col-6">
                <h6>Navigation</h6>
                <a href="/">Accueil</a>
                <a href="{{ route('property.index') }}">Nos Biens</a>
                <a href="#">À Propos</a>
                <a href="#">Contact</a>
            </div>
            <div class="col-lg-3 col-6">
                <h6>Contact</h6>
                <p class="mb-2"><i class="fa-solid fa-location-dot me-2" style="color:var(--gold)"></i>15 Rue de la Paix, Paris</p>
                <p class="mb-2"><i class="fa-solid fa-phone me-2" style="color:var(--gold)"></i>+33 1 23 45 67 89</p>
                <p><i class="fa-solid fa-envelope me-2" style="color:var(--gold)"></i>contact@luximmo.fr</p>
            </div>
            <div class="col-lg-3 col-6">
                <h6>Horaires</h6>
                <p class="mb-2">Lundi – Vendredi<br><strong style="color:#1e2235">9h00 – 19h00</strong></p>
                <p>Samedi<br><strong style="color:#1e2235">10h00 – 17h00</strong></p>
            </div>
        </div>
        <hr class="f-divider">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <p class="f-copy mb-0">© {{ date('Y') }} LuxImmo. Tous droits réservés.</p>
            <p class="f-copy mb-0">Fait avec passion en France 🇫🇷</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 750, once: true, offset: 60 });

    const nav = document.getElementById('mainNav');
    function updateNav() { nav.classList.toggle('scrolled', window.scrollY > 40); }
    window.addEventListener('scroll', updateNav);
    updateNav();
</script>

@yield('scripts')
</body>
</html>