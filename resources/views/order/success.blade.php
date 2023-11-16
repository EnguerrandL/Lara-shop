@extends('base')
@section('title', 'Paiement réussi avec succès')

@section('content')

<div class="container col-10 mx-auto">
    <h2 class="display-2">Votre commande </h2>

    @if($latestOrder && $latestOrder->user->cart)
        <h3>Produits dans votre panier :</h3>
        <ul>
            @foreach ($latestOrder->user->cart->products as $product)
                <li>{{ $product->name }} (Quantité: {{ $product->pivot->quantity }})</li>
            @endforeach
        </ul>
    @else
        <p>Aucune commande trouvée pour l'utilisateur.</p>
    @endif
</div>

@endsection
