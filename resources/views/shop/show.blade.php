@extends('base')

@section('title', 'Détail ' . $product->name)
    

@section('content')


<div class="container mt-5">

    <h5 class="text-dark text-center">{{ $product->name }}</h5>


    <p>{{ $product->price . ' €' }}</p>
    <p>{{ $product->description }}</p>
    <p>{{ 'Stock disponible : ' .  $product->quantity  }}</p>




</div>
    
@endsection