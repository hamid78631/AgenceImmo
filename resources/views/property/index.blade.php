@extends('base')

@section('title' , 'Tous nos biens')

@section('content')

<div class="bg-light p-5 mb-5 text-center">

    <form action="" method="get" class="container d-flex gap-2">
        <input type="number" placeholder="Surface minimale" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
        <input type="number" placeholder="Nombre de pièces minimum" class="form-control" name="rooms" value="{{ $input['rooms'] ?? '' }}">
        <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
</form>

</div>

<div class="container">
    <div class="row">
        @foreach($properties as $property)
            <div class="col-3 mt-5">   
                @include('property.card')
            </div>
        @endforeach
    </div>
</div>
<div class=" container my-4">
    {{ $properties->links()}}
</div>
@endsection