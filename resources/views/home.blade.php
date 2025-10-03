@extends('base')

@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h1>
            Agence Lorem ipsum
        </h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis blanditiis, quidem culpa sequi eum laborum?
            Ea, beatae! Vero, nesciunt. Inventore laudantium officiis nulla molestiae sed cum soluta, suscipit iure maiores?
        </p>
    </div>
</div>


<div class="container">
    <h2>Nos derniers biens</h2>

    <div class="row">
        @foreach($properties as $property)
            <div class="col">   
                @include('property.card')
            </div>
        @endforeach
    </div>
</div>
@endsection