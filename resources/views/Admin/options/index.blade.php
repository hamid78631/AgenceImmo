@extends('admin.admin')
@section('title', 'Options & Équipements')

@section('content')

<div class="page-header">
    <div>
        <h1>Options &amp; Équipements</h1>
        <p style="color:var(--muted); font-size:.85rem; margin-top:.3rem;">
            {{ $options->total() }} option(s) disponible(s)
        </p>
    </div>
    <a href="{{ route('admin.option.create') }}" class="btn-admin-primary">
        <i class="fa-solid fa-plus"></i> Ajouter une option
    </a>
</div>

<div class="admin-table-wrap">
    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom de l'option</th>
                <th style="text-align:right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($options as $option)
                <tr>
                    <td style="color:var(--muted); width:60px;">{{ $loop->iteration }}</td>
                    <td class="td-title">
                        <span style="background:rgba(201,168,76,.1); border:1px solid rgba(201,168,76,.25); color:var(--gold); font-size:.72rem; letter-spacing:1.5px; text-transform:uppercase; padding:.3rem .8rem; border-radius:2px;">
                            {{ $option->name }}
                        </span>
                    </td>
                    <td>
                        <div style="display:flex; gap:.5rem; justify-content:flex-end;">
                            <a href="{{ route('admin.option.edit', $option) }}"
                               class="btn-admin-outline">
                                <i class="fa-solid fa-pen-to-square"></i> Éditer
                            </a>
                            <form action="{{ route('admin.option.destroy', $option) }}" method="post"
                                  onsubmit="return confirm('Supprimer cette option ?')">
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
                    <td colspan="3" style="text-align:center; padding:3rem; color:var(--muted);">
                        <i class="fa-solid fa-tags" style="font-size:2rem; display:block; margin-bottom:.8rem; color:rgba(201,168,76,.2)"></i>
                        Aucune option enregistrée.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($options->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $options->links() }}
    </div>
@endif

@endsection