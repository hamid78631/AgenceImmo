@extends('admin.admin')
@section('title', 'Biens Immobiliers')

@section('content')

<div class="page-header">
    <div>
        <h1>Biens Immobiliers</h1>
        <p style="color:var(--muted); font-size:.85rem; margin-top:.3rem;">
            {{ $properties->total() }} bien(s) au total
        </p>
    </div>
    <a href="{{ route('admin.property.create') }}" class="btn-admin-primary">
        <i class="fa-solid fa-plus"></i> Ajouter un bien
    </a>
</div>

<div class="admin-table-wrap">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Statut</th>
                <th style="text-align:right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($properties as $property)
                <tr>
                    <td class="td-title">{{ $property->title }}</td>
                    <td>{{ $property->surface }} m²</td>
                    <td class="td-price">{{ number_format($property->price, 0, ',', ' ') }} €</td>
                    <td>{{ $property->city }}</td>
                    <td>
                        @if($property->sold)
                            <span style="background:rgba(239,68,68,.15); color:#f87171; font-size:.65rem; letter-spacing:1.5px; text-transform:uppercase; padding:.25rem .7rem; border-radius:2px; border:1px solid rgba(239,68,68,.3);">Vendu</span>
                        @else
                            <span style="background:rgba(34,197,94,.12); color:#4ade80; font-size:.65rem; letter-spacing:1.5px; text-transform:uppercase; padding:.25rem .7rem; border-radius:2px; border:1px solid rgba(34,197,94,.25);">Disponible</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:.5rem; justify-content:flex-end;">
                            <a href="{{ route('admin.property.edit', $property) }}"
                               class="btn-admin-outline">
                                <i class="fa-solid fa-pen-to-square"></i> Éditer
                            </a>
                            <form action="{{ route('admin.property.destroy', $property) }}" method="post"
                                  onsubmit="return confirm('Supprimer ce bien ?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-admin-danger">
                                    <i class="fa-solid fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:3rem; color:var(--muted);">
                        <i class="fa-solid fa-building" style="font-size:2rem; display:block; margin-bottom:.8rem; color:rgba(201,168,76,.2)"></i>
                        Aucun bien enregistré pour le moment.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($properties->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $properties->links() }}
    </div>
@endif

@endsection