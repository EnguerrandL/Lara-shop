@extends('base')


@section('title', 'Administration de vos produits')

@section('content')

    <div class="container-fluid col-10 mx-auto mt-5 ">
        <h2>Administration de vos produits</h2>
     
        <table class="table table-dark table-hover">
            <a href="{{ route('products.create')}}"  class=" btn btn-primary">Ajouter un produit</a>

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
                        <td style="width: 20%;">
                            <div class="d-flex">
                                <div >
                                    <button class="btn btn-warning">Éditer le produit</button>
                                </div>
                                <div >
                                    <form action="" method="post">
                                        <a href="" class="btn btn-danger">Supprimer</a>
                                    </form>
                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

@endsection
