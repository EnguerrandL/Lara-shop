



@php
    $user = auth()->user();
@endphp


@auth
  
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mon compte
        </button>

       
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('dashboard') }}">Tableau de bord</a>
            <a class="dropdown-item" href="{{ route('profile.edit') }}">Edition du profil</a>
            <form method="POST" class="text-center" action="{{ route('logout') }}">
                @csrf

               
                <button class="btn-secondary ">Se déconnecter</button>
            </form>
           
        </div>
    </div>
@else
 
    <a class="text-white py-2 d-none d-md-inline-block" href="{{ route('login') }}">Se connecter</a>
@endauth

@auth
 
    <a class="btn btn-info py-2 d-none d-md-inline-block" href="{{ route('cart.show', $user) }}">
        Voir le panier
        <span class="badge bg-success">{{ $user->cart ? count($user->cart->products) : '' }}</span>
    </a>
@endauth






