<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-10 mx-auto">
        <div class=" text-gray-900">




            <h1 style="font-size:32px" class="mb-5 mt-5 text-center">
                Détails de votre commande </h1>

                <h3 class="mt-5" style="font-size:20px">Date de votre commande : {{ $order->order_date }}</h3>
                <h3 style="font-size:20px">Nom : {{ $user->name }}</h3>
                <h3  style="font-size:20px">Email : {{ $user->email }}</h3>
                <h3  class=" mb-5" style="font-size:20px">Montant total de votre commande: {{ $order->total_amount }} €</h3>
            <table class="table mx-auto">

                <thead class="thead-dark">
                    <tr>

                        <th scope="col">Nom du produit</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix unitaire</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>


                        @foreach ($order->user->orderItems as $order)
                    <tr>

                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->quantity }}</td>

                        <td>{{ $order->price }}</td>

                    </tr>
                    @endforeach

                  
                
                   

                </tbody>
            </table>
            
        </div>
    </div>





</x-app-layout>
