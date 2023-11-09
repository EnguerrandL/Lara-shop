@extends('base')

@section('title', 'Tous nos produits')


@section('content')


    <div class="container mt-5">



        <h2 class="text-dark text-center">Liste de nos produits</h2>





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
                        <td> <img src="{{ $product->image }}" alt=""></td>
                        <td>{{ $product->name }} </td>
                        <th>{{ $product->price }}</th>
                        <th>{{ $product->quantity }}</th>
                        <td style="width: 30%;">
                            <div class="d-flex">
                                <div class="container">

                                    <div class="row">
                                        <div class="col">
                                        <a href="" class="btn btn-success">Voir </a>
                                    </div>
                                        <div class="col">
                                        <a href="" class="btn btn-success">Acheter</a>
                                    </div>
                                        <div class="col">
                                         
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                
                                                <option  disabled>Quantité</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                              </select>
                                    </div>

                                    </div>
                                </div>

                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>










    </div>

@endsection
