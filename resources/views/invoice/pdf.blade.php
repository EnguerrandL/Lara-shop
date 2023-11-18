<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Facture</h2>
            <p>Date de commande: {{ $order->order_date }}</p>
            <p>Nom client: {{ $order->user->name }}</p>
            <p>Email client: {{ $order->user->email }}</p>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire (€)</th>
                    <th>Total (€)</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($order->orderItems as $orderItem)
                    <tr>
                        <td>{{ $orderItem->product_name }}</td>
                        <td>{{ $orderItem->quantity }}</td>
                        <td>{{ $orderItem->price }}</td>
                        <td>{{ $orderItem->price * $orderItem->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <p>Total HT: {{ number_format($order->total_amount, 2, ',', ' ') }} €</p>
            <p>Total TTC: {{ number_format($order->total_amount *1.20, 2, ',', ' ') }} €</p>
           
        </div>
    </div>
</div>

</body>
</html>
