@extends('base')

@section('tile', 'Votre panier')
    

@section('content')

<div class="container">
<h2>Votre commande :</h2>




@foreach ($orderItem->product as $product)




<p>{{$product->name}}</p>
<p>{{$product->name}}</p>
<p>{{$product->name}}</p>
<p>{{$product->name}}</p>
    
@endforeach




</div>


@endsection