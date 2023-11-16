@extends('base')
@section('title', 'Paiement réussi avec succès')

@section('content')

<div class="container col-10 mx-auto">
    <h2 class="display-2">Votre commande </h2>

    @if($order)
        @foreach ($order->user->cart as $cartItem)
            <p>{{ $cartItem->product->name }} </p>
        @endforeach
    @else
        <p>Aucune commande trouvée pour l'utilisateur.</p>
    @endif
</div>

@endsection