@extends('base')

@section('title', 'Tous nos produits')


@section('content')


    <div class="container mt-5">



        <h2 class="mb-5 mt-5 text-dark text-center">Net'Shop, le meilleur shop du net</h2>





        <table class="table table-dark table-hover">


            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom du produit</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Produits restant</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td> <img width="250px" src="{{$product->imgUrl() }}" alt=""></td>
                        <td>{{ $product->name }} </td>
                        <th>{{ $product->price }}</th>
                        <th>{{ $product->quantity }}</th>
                        <td style="width: 30%;">
                            <div class="d-flex">
                                <div class="container">

                                    <div class="row">
                                        <div class="col">
                                        <a href="{{ route('product.show', ['slug' => $product->slug, 'product' => $product]) }}" class="btn btn-success">Voir </a>
                                    </div>
                                       
                                            @include('shared.buyinput')

                                          

                                 
                                </div>

                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>



        






    </div>

@endsection
