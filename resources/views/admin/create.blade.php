@extends('base')
@section('title', 'Ajouter un nouveau produit')

@section('content')

    <div class="mt-5 container col-10 mx-auto">







        <h2 class="text-white">Ajouter un nouveau produit</h2>






        <div class="mt-5 container">
            <div class="row">
                <form class="row" action="" method="post">

                    @csrf
                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Nom du produit',
                            'name' => 'name',
                            'type' => 'text',
                            'class' => '',
                        ])
                        @include('shared.input', [
                            'label' => 'Prix',
                            'name' => 'price',
                            'type' => 'number',
                            'class' => '',
                        ])
                        @include('shared.input', [
                            'label' => 'Quantité',
                            'name' => 'quantity',
                            'type' => 'number',
                            'class' => '',
                        ])
                        @include('shared.input', [
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'textarea',
                            'class' => '',
                        ])

                    </div>
                    <div class="col">
                        @include('shared.input', [
                            'label' => 'Photo du produit',
                            'name' => 'image',
                            'type' => 'file',
                            'class' => '',
                        ])

                    </div>
                    <button class=" mt-5  btn btn-dark">Ajouter un produit</button>
                </form>
            </div>
        </div>




@endsection
