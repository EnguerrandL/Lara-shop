@extends('base')


@section('title', 'Administration de vos produits')

@section('content')

    <div class="container-fluid col-10 mx-auto mt-5 ">
        <h2>Administration de vos produits</h2>







     
        <div class="container ">

            @if ($productStockNotification != null)
          <div class="alert alert-danger  text-center">
          

                <h2 class="text-center">Produits en ruptures de stock</h2>
                <div class="row mt-5 mb-5">

                    @foreach ($productStockNotification as $notification)
                        <div class="col-sm h5 ">
                            {{ $notification['product_name'] }}
                        </div>
                        <div class="col-sm h5">
                            {{ $notification['product_out_of_stock_date'] }}
                        </div>
                    @endforeach
                </div>

            @endif

        </div>
      

        <table class="table table-dark table-hover">
            <a href="{{ route('products.create') }}" class=" btn btn-primary">Ajouter un produit</a>

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
                        <td> <img width="50px" src="{{ $product->imgUrl() }}" alt=""></td>


                        <td>{{ $product->name }} </td>
                        <th>{{ $product->price }}</th>
                        <th>{{ $product->quantity }}</th>
                        <td style="width: 20%;">
                            <div class="d-flex">
                                <div>

                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                                        Éditer le produit</a>
                                </div>
                                <div>
                                    <form action=" {{ route('products.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')


                                        <button class="btn btn-danger">Supprimer</button>
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
