@extends('base')

@section('title', 'Liste des commandes')
    


@section('content')

<div class="container">

    <h2>Liste des commandes</h2>


    @foreach ($orders as $order)


    <li class="item-list">{{ $order->id }}</li>
    <li class="item-list">{{ 'Date  de la commande :  ' .  $order->order_date }}</li>
    <li class="item-list">{{ $order->total_ammount . ' €'}}</li>
  
        
    @endforeach


</div>
    
@endsection