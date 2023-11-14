@extends('base')

@section('title', 'Détail :' . $product->name)


@section('content')

    <div class="container col-10 mx-auto d-bloc">
   
     

            <h5 class="text-dark text-center">{{ $product->name }}</h5>

            <img src="{{ $product->imgUrl() }}" class="img-fluid" alt="...">
            <p>Prix: {{ $product->price . ' €' }}</p>
            <p>{{ $product->description }}</p>
            <p>{{ 'Stock disponible : ' . $product->quantity }}</p>

            @include('shared.buyinput')


        </div>

    


@endsection
