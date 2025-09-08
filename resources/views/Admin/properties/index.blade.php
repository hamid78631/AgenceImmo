@extends('admin.admin')

@section('content')

<h1> Les biens </h1>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Action</th>
            <th></th>
        </tr>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{$property->title}}</td>
                    <td>{{$property->surface}} m²</td>
                    <td>{{ number_format($property->price  , thousands_separator : ' ')}}</td>
                    <td>{{$property->city}}</td>
                    <td colspan="2">  </td>
                </tr>
            @endforeach
        </tbody>
    </thead>
</table>

{{ $properties->links()}}
@endsection