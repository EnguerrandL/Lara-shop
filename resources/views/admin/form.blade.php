@extends('base')
@section('title', $product->exists ? 'Éditer un produit : ' . $product->title : 'Ajouter un produit')

@section('content')

    <div class="container mx-auto">
        <h2 class="text-white">
            @if ($product->exists)
                Modifier le produit
            @else
                Ajouter un produit
            @endif
        </h2>


        <div class="mt-5 container">
            <div class="row">
                <form class="row" action="{{ route($product->exists ? 'products.update' : 'products.store', ['product' => $product]) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method($product->exists ? 'PATCH' : 'POST')

                    

                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Nom du produit',
                            'name' => 'name',
                            'type' => 'text',
                            'class' => '',
                            'value' => $product->name,
                        ])
                        @include('shared.input', [
                            'label' => 'Prix',
                            'name' => 'price',
                            'type' => 'number',
                            'class' => '',
                            'value' => $product->price,
                        ])
                        @include('shared.input', [
                            'label' => 'Quantité',
                            'name' => 'quantity',
                            'type' => 'number',
                            'class' => '',
                            'value' => $product->quantity,
                        ])
                        @include('shared.input', [
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'textarea',
                            'class' => '',
                            'value' => $product->description,
                        ])

                    </div>
                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Photo du produit',
                            'name' => 'image',
                            'type' => 'file',
                            'class' => '',
                            'value' => $product->image,
                        ])

                    </div>


                    <button class=" mt-5  btn btn-dark">

                        @if ($product->exists)
                            Modifier le produit
                        @else
                            Ajouter un produit
                        @endif

                    </button>
                </form>
            </div>
        </div>

    @endsection
