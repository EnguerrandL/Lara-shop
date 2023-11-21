@extends('base')

@section('tile', 'Votre panier')


@section('content')

    <div class="container">




        <div class="container mt-5">



            @if (!$cartItems->isEmpty())


                <h2 class="mb-5 mt-5 text-dark text-center">Net'Shop, le meilleur shop du net</h2>





                <table class="table table-dark table-hover">


                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom du produit</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix unitaire</th>
                            <th scope="col">Prix  HT</th>
                            <th scope="col">Prix TTC</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $cartItem)
                            <tr>
                                <td> <img width="250px" src="{{ $cartItem->product->image }}" alt=""></td>
                                <td>{{ $cartItem->product->name }}</td>
                                <th>{{ $cartItem->quantity }}</th>
                                <th>{{ $cartItem->product->price }} €</th>
                                <th>{{ $cartItem->priceByQuantity() }} €</th>
                                </th>
                                <th>{{ $cartItem->priceWithTax()}} €</th>
                                <td style="width: 30%;">
                                    <form method="POST" action=" {{ route('cart.remove', $cartItem->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">Supprimé</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Prix HT </th>
                            <th scope="col">Prix TTC</th>
                            


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $totalAmountWithoutTax }} €</td>
                            <td>{{ $totalAmoutWithTax }} €</td>

                            
                        </tr>

                      
                    </tbody>
                </table>
                <a class="btn btn-primary"" href="{{ route('checkout') }}">Payer votre commande</a>
            @else
                <h3 class="alert alert-danger">Votre panier est vide</h3>

            @endif








        </div>



    @endsection
