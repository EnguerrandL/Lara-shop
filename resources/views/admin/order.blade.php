@extends('base')

@section('title', 'Liste des commandes')

@section('content')
    <div class="container-fluid col-10">
        <h2>Liste des commandes</h2>



      

        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nom client</th>
                    <th scope="col">Date</th>
                    <th scope="col">Produits commandés</th>
                    <th scope="col">Montant total HT</th>
                    <th scope="col">Status paiement</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }} </td>
                        <td>{{ $order->user->name }} </td>
                        <td>{{ $order->order_date }}</td>
                        <td>
                            <ul>
                                @foreach ($order->orderItems as $orderItem)
                                    <li>
                                        @if ($orderItem->product)
                                            ({{ $orderItem->quantity }})
                                            {{ $orderItem->product->name }}
                                            || Prix unitaire : {{ $orderItem->price }} €
                                        @else
                                            Produit non trouvé
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $order->total_amount . ' €' }}</td>
                        <td>{{ $order->payment_status ? 'Payée' : 'En attente de paiement' }}</td>


                        <td style="width: 20%;">
                            <div class="d-flex">
                                <div>

                                    <a href="{{ route('make.invoice', $order) }}" class="btn btn-success">Voir la
                                        facture</a>

                                </div>
                                <div>
                                    <form action="{{ route('order.delete', $order) }}" method="post">
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
