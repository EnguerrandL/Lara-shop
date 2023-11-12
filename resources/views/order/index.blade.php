@extends('base')

@section('title', 'Liste des commandes')

@section('content')
    <div class="container">
        <h2>Liste des commandes</h2>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Montant total</th>
                    <th scope="col">Produits commandés</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }} </td>
                        <td>{{ 'Date de la commande : ' . $order->order_date }}</td>
                        <td>{{ $order->total_amount . ' €' }}</td>
                        <td>
                            <ul class="list-group-item list-group-item-action list-group-item-dark">
                                @foreach ($order->orderItems as $orderItem)
                                    <li class="list-group-item">{{ $orderItem }} - {{ 'Quantité(s) : ' .  $orderItem->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td style="width: 20%;">
                            <div class="d-flex">
                                <div>
                                    <button class="btn btn-success">Voir la facture</button>
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
