
@extends('base')

@section('tile', 'Votre commande !')


@section('content')

    <div class="container">




        <div class="container mt-5">



            @if ($orderData->user->orderItems)


                <h2 class="mb-5 mt-5 text-dark text-center alert alert-success">
                    Fécilicitation ! Voici un récapitulatif de votre commande :</h2>


                    <p></p>


                    <div class="card border-light mb-3" >
                        <div class="card-header">Informations clients</div>
                        <div class="card-body">
                          <h5 class="card-title">Nom : {{ $orderData->user->name }}</h5>
                          <p class="card-text">{{ $orderData->user->email }}</p>
                        </div>
                      </div>
            

                <table class="table table-dark table-hover">


                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom du produit</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix unitaire HT</th>
                            <th scope="col">Prix total HT</th>
                         
                   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderData->orderItems as $orderData)
                            <tr>
                                <td> <img width="250px" src="{{  $orderData->image }}" alt=""></td>
                                <td>{{ $orderData->product_name }}</td>
                                <th>{{ $orderData->quantity }}</th>
                                <th>{{ $orderData->price }} €</th>
                                <th> {{ $orderData->price * $orderData->quantity}} €</th>
                                
                               
                             
                       

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
                            <td> {{ $order->total_amount }} €</td>
                            <td>{{  $order->total_amount * 1.20 }} €</td>

                            <td>


                          <a href="" class="btn btn-info">Télécharger la facture</a>



                            </td>
                        </tr>


                    </tbody>
                </table>
            @else
                <h3 class="alert alert-danger">Vous êtes surement perdu</h3>

            @endif



        </div>



    @endsection
