



<a class="text-white py-2 d-none d-md-inline-block" 
href="{{ Auth::check() ? route('dashboard') : route('login') }}">
{{Auth::check() ? 'Mon compte' : 'Se connecter' }}</a>



@php
    $user = auth()->user();
@endphp


@if ($user)
    


<a class="btn btn-info py-2 d-none d-md-inline-block" href="{{ route('cart.show', $user) }}">Voir le
    panier
   <span class="badge bg-success">{{ $user->cart ? count($user->cart->products) : '' }}</span>
</a>
@endif