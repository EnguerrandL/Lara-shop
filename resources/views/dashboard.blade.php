@extends('base')


@section('content')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 mx-auto">
                    {{ __("You're logged in!") }}


            
                    <h1 style="font-size:32px" class="mb-5 mt-5 text-center">Historique de vos commandes : </h1>
                  

                    <table class="table mx-auto">
                       
                        <thead class="thead-dark">
                          <tr>

                            <th scope="col">Date</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>


                            @foreach ($user->orders as $order)
                            <tr>

                            <td>{{  $order->order_date  }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>

                                <a href="{{ route('make.invoice', $order) }}" target="_blank" class="btn btn-warning">Voir la facture</a>
                                <a href="" class="btn btn-primary">Détails de ma commande </a>


                            </td>
                        </tr>
                    
                            @endforeach
                          
                       
                          

                    
                        </tbody>
                      </table>
                      
                


                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



    
@endsection