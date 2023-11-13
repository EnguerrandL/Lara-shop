@extends('base')

@section('tile', 'Votre panier')


@section('content')

    <div class="container">

        <h3>Votre commande : </h3>


        {{ $cartContent }}



        <div class="container mt-5">



            <h2 class="mb-5 mt-5 text-dark text-center">Net'Shop, le meilleur shop du net</h2>





            <table class="table table-dark table-hover">


                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom du produit</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col">Prix total </th>
                        <th scope="col">TVA</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartContent as $cartItem)
                        <tr>
                            <td> <img width="250px" src="{{ $cartItem->product->image }}" alt=""></td>
                            <td>{{ $cartItem->product->name }}</td>
                            <th>{{ $cartItem->product->quantity }}</th>
                            <th>{{ $cartItem->product->price }} €</th>
                            <th>{{ $cartItem->product->priceByQuantity() }} €</th>
                            <th>€</th>
                            <td style="width: 30%;">
                                <form method="POST" action=" {{ route('item.delete', $cartItem->id) }}">
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
                        <th scope="col">Prix HT</th>
                        <th scope="col">Prix TTC</th>
                        <th scope="col"> <a href="" class="btn btn-warning">téléharger le pdf</a></th>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>HT €</td>
                        <td>TTC €</td>

                        <td> <a href="" class="btn btn-primary">Payer votre commande</a></td>
                    </tr>


                </tbody>
            </table>










        </div>



    @endsection
