@extends('admin.admin')
@section('title', $option->exists ? 'Éditer une option' : 'Créer une option')

@section('content')

<div class="page-header">
    <div>
        <h1>@yield('title')</h1>
        <p style="color:var(--muted); font-size:.85rem; margin-top:.3rem;">
            Options disponibles pour les biens immobiliers
        </p>
    </div>
    <a href="{{ route('admin.option.index') }}" class="btn-admin-outline">
        <i class="fa-solid fa-arrow-left"></i> Retour
    </a>
</div>

<div class="row">
    <div class="col-lg-5">
        <div class="admin-form-card">
            <h5 style="font-size:1rem; margin-bottom:1.5rem; padding-bottom:.8rem; border-bottom:1px solid rgba(201,168,76,.1);">
                <i class="fa-solid fa-tag me-2" style="color:var(--gold)"></i>
                {{ $option->exists ? 'Modifier l\'option' : 'Nouvelle option' }}
            </h5>

            <form action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}"
                  method="post">
                @csrf
                @method($option->exists ? 'put' : 'post')

                @include('shared.input', ['label' => 'Nom de l\'option', 'name' => 'name', 'value' => $option->name])

                <div class="mt-4">
                    <button type="submit" class="btn-admin-primary w-100" style="justify-content:center; padding:.85rem;">
                        @if($option->exists)
                            <i class="fa-solid fa-floppy-disk"></i> Enregistrer
                        @else
                            <i class="fa-solid fa-plus"></i> Créer l'option
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection