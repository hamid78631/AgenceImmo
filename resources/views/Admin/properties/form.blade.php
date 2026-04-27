@extends('admin.admin')
@section('title', $property->exists ? 'Éditer un bien' : 'Créer un bien')

@section('content')

<div class="page-header">
    <div>
        <h1>@yield('title')</h1>
        <p style="color:var(--muted); font-size:.85rem; margin-top:.3rem;">
            Renseignez les informations du bien immobilier
        </p>
    </div>
    <a href="{{ route('admin.property.index') }}" class="btn-admin-outline">
        <i class="fa-solid fa-arrow-left"></i> Retour
    </a>
</div>

<form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}"
      method="post">
    @csrf
    @method($property->exists ? 'put' : 'post')

    <div class="row g-4">

        {{-- LEFT COLUMN --}}
        <div class="col-lg-8">

            <div class="admin-form-card mb-4">
                <h5 style="font-size:1rem; margin-bottom:1.5rem; padding-bottom:.8rem; border-bottom:1px solid rgba(201,168,76,.1);">
                    <i class="fa-solid fa-circle-info me-2" style="color:var(--gold)"></i> Informations générales
                </h5>

                @include('shared.input', ['label' => 'Titre du bien', 'name' => 'title', 'value' => $property->title])

                <div class="row g-3 mt-1">
                    @include('shared.input', ['class' => 'col-md-6', 'label' => 'Surface (m²)', 'name' => 'surface', 'value' => $property->surface])
                    @include('shared.input', ['class' => 'col-md-6', 'label' => 'Prix (€)', 'name' => 'price', 'value' => $property->price])
                </div>

                @include('shared.input', ['type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'value' => $property->description])
            </div>

            <div class="admin-form-card mb-4">
                <h5 style="font-size:1rem; margin-bottom:1.5rem; padding-bottom:.8rem; border-bottom:1px solid rgba(201,168,76,.1);">
                    <i class="fa-solid fa-ruler-combined me-2" style="color:var(--gold)"></i> Caractéristiques
                </h5>
                <div class="row g-3">
                    @include('shared.input', ['class' => 'col-md-4', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
                    @include('shared.input', ['class' => 'col-md-4', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
                    @include('shared.input', ['class' => 'col-md-4', 'label' => 'Étage', 'name' => 'floor', 'value' => $property->floor])
                </div>
            </div>

            <div class="admin-form-card">
                <h5 style="font-size:1rem; margin-bottom:1.5rem; padding-bottom:.8rem; border-bottom:1px solid rgba(201,168,76,.1);">
                    <i class="fa-solid fa-location-dot me-2" style="color:var(--gold)"></i> Localisation
                </h5>
                <div class="row g-3">
                    @include('shared.input', ['class' => 'col-md-6', 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
                    @include('shared.input', ['class' => 'col-md-3', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
                    @include('shared.input', ['class' => 'col-md-3', 'label' => 'Code postal', 'name' => 'postal_code', 'value' => $property->postal_code])
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN --}}
        <div class="col-lg-4">

            <div class="admin-form-card mb-4">
                <h5 style="font-size:1rem; margin-bottom:1.5rem; padding-bottom:.8rem; border-bottom:1px solid rgba(201,168,76,.1);">
                    <i class="fa-solid fa-tags me-2" style="color:var(--gold)"></i> Options & Statut
                </h5>

                @include('shared.select', [
                    'label'    => 'Options / Équipements',
                    'name'     => 'options',
                    'value'    => $property->options()->pluck('id'),
                    'multiple' => true,
                    'options'  => $options
                ])

                <div class="mt-3">
                    @include('shared.checkbox', ['label' => 'Bien vendu', 'name' => 'sold', 'value' => $property->sold])
                </div>
            </div>

            <div class="admin-form-card">
                <button type="submit" class="btn-admin-primary w-100" style="justify-content:center; padding:.85rem;">
                    @if($property->exists)
                        <i class="fa-solid fa-floppy-disk"></i> Enregistrer les modifications
                    @else
                        <i class="fa-solid fa-plus"></i> Créer le bien
                    @endif
                </button>

                @if($property->exists)
                    <div style="margin-top:.8rem; text-align:center;">
                        <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}"
                           target="_blank"
                           style="font-size:.75rem; color:var(--muted); text-decoration:none;">
                            <i class="fa-solid fa-eye me-1"></i> Voir sur le site
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</form>

@endsection