<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin') | LuxImmo Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>

    <style>
        :root {
            --gold:        #c9a84c;
            --gold-light:  #e8c97a;
            --sidebar-bg:  #ffffff;
            --content-bg:  #f0f4f8;
            --card-bg:     #ffffff;
            --card-border: rgba(201,168,76,.2);
            --cream:       #1e2235;
            --muted:       #6b7280;
            --light-gray:  #9ca3af;
            --danger:      #ef4444;
            --success:     #22c55e;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--content-bg);
            color: #1e2235;
            display: flex;
            min-height: 100vh;
        }
        h1,h2,h3,h4,h5,h6 { font-family: 'Playfair Display', serif; }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #f0f0f0; }
        ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 2px; }

        /* ── SIDEBAR ── */
        .admin-sidebar {
            width: 260px;
            min-width: 260px;
            background: var(--sidebar-bg);
            border-right: 1px solid rgba(201,168,76,.18);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 100;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 2rem 1.8rem 1.5rem;
            border-bottom: 1px solid rgba(201,168,76,.1);
        }
        .sidebar-brand a {
            font-family: 'Playfair Display', serif;
            font-size: 1.55rem;
            font-weight: 700;
            color: var(--gold);
            text-decoration: none;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .sidebar-brand a span { color: #1e2235; }
        .sidebar-badge {
            font-size: .58rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
            margin-top: .25rem;
            display: block;
        }

        .sidebar-section {
            padding: 1.5rem 1.2rem .5rem;
        }
        .sidebar-section-label {
            font-size: .6rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--muted);
            padding: 0 .6rem;
            margin-bottom: .5rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: .85rem;
            padding: .7rem .9rem;
            border-radius: 3px;
            color: rgba(30,34,53,.6);
            text-decoration: none;
            font-size: .85rem;
            font-weight: 500;
            margin-bottom: .15rem;
            transition: background .25s, color .25s;
            position: relative;
        }
        .sidebar-link .sl-icon {
            width: 32px; height: 32px;
            border-radius: 6px;
            background: rgba(201,168,76,.07);
            display: flex; align-items: center; justify-content: center;
            font-size: .85rem;
            color: var(--muted);
            flex-shrink: 0;
            transition: background .25s, color .25s;
        }
        .sidebar-link:hover,
        .sidebar-link.active {
            background: rgba(201,168,76,.08);
            color: #1e2235;
        }
        .sidebar-link:hover .sl-icon,
        .sidebar-link.active .sl-icon {
            background: rgba(201,168,76,.18);
            color: var(--gold);
        }
        .sidebar-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 20%; bottom: 20%;
            width: 3px;
            background: var(--gold);
            border-radius: 0 2px 2px 0;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 1.5rem 1.2rem;
            border-top: 1px solid rgba(201,168,76,.12);
        }
        .sidebar-footer a {
            display: flex; align-items: center; gap: .7rem;
            color: var(--muted);
            font-size: .82rem;
            text-decoration: none;
            padding: .5rem .6rem;
            border-radius: 3px;
            transition: color .3s;
        }
        .sidebar-footer a:hover { color: var(--gold); }

        /* ── MAIN CONTENT ── */
        .admin-main {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .admin-topbar {
            background: var(--sidebar-bg);
            border-bottom: 1px solid rgba(201,168,76,.1);
            padding: 1.1rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky; top: 0; z-index: 50;
        }

        .topbar-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: #1e2235;
        }

        .topbar-right { display: flex; align-items: center; gap: 1rem; }

        .topbar-user {
            display: flex; align-items: center; gap: .7rem;
        }
        .topbar-avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: .9rem;
            font-weight: 700;
        }
        .topbar-username { font-size: .82rem; color: var(--light-gray); }

        .admin-content {
            padding: 2.5rem;
            flex: 1;
        }

        /* ── ALERTS ── */
        .alert-success-custom {
            background: rgba(34,197,94,.08);
            border: 1px solid rgba(34,197,94,.3);
            color: #16a34a;
            border-radius: 3px;
            padding: .9rem 1.2rem;
            margin-bottom: 1.5rem;
            display: flex; align-items: center; gap: .7rem;
            font-size: .88rem;
        }
        .alert-danger-custom {
            background: rgba(239,68,68,.08);
            border: 1px solid rgba(239,68,68,.3);
            color: #dc2626;
            border-radius: 3px;
            padding: .9rem 1.2rem;
            margin-bottom: 1.5rem;
            font-size: .88rem;
        }
        .alert-danger-custom ul { margin: 0; padding-left: 1.2rem; }

        /* ── ADMIN BUTTONS ── */
        .btn-admin-primary {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: .6rem 1.4rem;
            font-size: .78rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 700;
            cursor: pointer;
            transition: transform .25s, box-shadow .25s;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: .45rem;
        }
        .btn-admin-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(201,168,76,.3);
            color: #fff;
        }

        .btn-admin-outline {
            background: transparent;
            color: var(--gold);
            border: 1px solid rgba(201,168,76,.4);
            border-radius: 3px;
            padding: .5rem 1.2rem;
            font-size: .75rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
            transition: background .25s, color .25s;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: .4rem;
        }
        .btn-admin-outline:hover { background: rgba(201,168,76,.1); color: var(--gold); }

        .btn-admin-danger {
            background: transparent;
            color: #dc2626;
            border: 1px solid rgba(239,68,68,.4);
            border-radius: 3px;
            padding: .5rem 1.1rem;
            font-size: .75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
            transition: background .25s;
            display: inline-flex; align-items: center; gap: .4rem;
        }
        .btn-admin-danger:hover { background: rgba(239,68,68,.08); color: #dc2626; }

        /* ── TABLE ── */
        .admin-table-wrap {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 4px;
            overflow: hidden;
        }
        .admin-table { width: 100%; border-collapse: collapse; }
        .admin-table thead tr {
            background: rgba(201,168,76,.07);
            border-bottom: 1px solid rgba(201,168,76,.15);
        }
        .admin-table thead th {
            padding: 1rem 1.2rem;
            font-size: .68rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold);
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }
        .admin-table tbody tr {
            border-bottom: 1px solid rgba(201,168,76,.06);
            transition: background .2s;
        }
        .admin-table tbody tr:last-child { border-bottom: none; }
        .admin-table tbody tr:hover { background: rgba(201,168,76,.04); }
        .admin-table td {
            padding: .95rem 1.2rem;
            font-size: .88rem;
            color: rgba(30,34,53,.8);
            vertical-align: middle;
        }
        .admin-table .td-title { color: #1e2235; font-weight: 500; }
        .admin-table .td-price { color: var(--gold); font-family: 'Playfair Display', serif; font-size: 1rem; }

        /* ── PAGE HEADER ── */
        .page-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 2rem;
            padding-bottom: 1.2rem;
            border-bottom: 1px solid rgba(201,168,76,.1);
        }
        .page-header h1 { font-size: 1.8rem; color: #1e2235; }

        /* ── FORM STYLES ── */
        .admin-form-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 4px;
            padding: 2rem;
        }

        .admin-field { margin-bottom: 1.2rem; }
        .admin-label {
            font-size: .68rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: .45rem;
            display: block;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }
        .admin-input {
            background: #f8fafc;
            border: 1px solid rgba(201,168,76,.2);
            color: #1e2235;
            border-radius: 2px;
            padding: .75rem 1rem;
            width: 100%;
            font-size: .88rem;
            outline: none;
            transition: border-color .3s, box-shadow .3s;
            font-family: 'Inter', sans-serif;
        }
        .admin-input::placeholder { color: var(--muted); }
        .admin-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,168,76,.1);
        }
        .admin-input.is-invalid { border-color: #ef4444; }
        .admin-invalid-feedback { color: #dc2626; font-size: .78rem; margin-top: .3rem; }

        /* TomSelect override */
        .ts-wrapper .ts-control {
            background: #f8fafc !important;
            border: 1px solid rgba(201,168,76,.2) !important;
            color: #1e2235 !important;
            border-radius: 2px !important;
            min-height: 42px;
        }
        .ts-wrapper.focus .ts-control { border-color: var(--gold) !important; box-shadow: 0 0 0 3px rgba(201,168,76,.1) !important; }
        .ts-dropdown { background: #ffffff !important; border: 1px solid rgba(201,168,76,.2) !important; }
        .ts-dropdown .option { color: rgba(30,34,53,.8) !important; padding: .5rem 1rem; }
        .ts-dropdown .option:hover, .ts-dropdown .option.active { background: rgba(201,168,76,.1) !important; color: #1e2235 !important; }
        .ts-wrapper .item { background: rgba(201,168,76,.12) !important; color: var(--gold) !important; border: 1px solid rgba(201,168,76,.3) !important; border-radius: 2px !important; }
        .ts-wrapper .remove { color: var(--gold) !important; }

        /* Toggle switch */
        .form-check-input:checked { background-color: var(--gold); border-color: var(--gold); }

        /* Pagination */
        .pagination .page-link {
            background: #ffffff; border-color: rgba(201,168,76,.2); color: #1e2235;
        }
        .pagination .page-link:hover { background: var(--gold); color: #fff; border-color: var(--gold); }
        .pagination .page-item.active .page-link { background: var(--gold); border-color: var(--gold); color: #fff; }

        @media (max-width: 768px) {
            .admin-sidebar { display: none; }
            .admin-main { margin-left: 0; }
        }
    </style>

    @yield('admin-head')
</head>
<body>

@php $route = request()->route()->getName(); @endphp

{{-- ── SIDEBAR ── --}}
<aside class="admin-sidebar">
    <div class="sidebar-brand">
        <a href="/"><span>Lux</span>Immo</a>
        <span class="sidebar-badge">Administration</span>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-section-label">Gestion</div>

        <a href="{{ route('admin.property.index') }}"
           class="sidebar-link {{ str_contains($route, 'property.') ? 'active' : '' }}">
            <span class="sl-icon"><i class="fa-solid fa-building"></i></span>
            Biens Immobiliers
        </a>

        <a href="{{ route('admin.option.index') }}"
           class="sidebar-link {{ str_contains($route, 'option.') ? 'active' : '' }}">
            <span class="sl-icon"><i class="fa-solid fa-tags"></i></span>
            Options & Équipements
        </a>
    </div>

    <div class="sidebar-footer">
        <a href="/" target="_blank">
            <i class="fa-solid fa-arrow-up-right-from-square" style="color:var(--gold)"></i>
            Voir le site public
        </a>
    </div>
</aside>

{{-- ── MAIN ── --}}
<div class="admin-main">

    {{-- TOPBAR --}}
    <div class="admin-topbar">
        <span class="topbar-title">@yield('title', 'Tableau de bord')</span>
        <div class="topbar-right">
            <div class="topbar-user">
                <div class="topbar-avatar">A</div>
                <span class="topbar-username">Administrateur</span>
            </div>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="admin-content">

        @if(session('success'))
            <div class="alert-success-custom">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-danger-custom">
                <i class="fa-solid fa-circle-exclamation mb-1"></i>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const selects = document.querySelectorAll('select[multiple]');
    selects.forEach(el => {
        new TomSelect(el, { plugins: { remove_button: { title: 'Retirer' } } });
    });
</script>

@yield('scripts')
</body>
</html>