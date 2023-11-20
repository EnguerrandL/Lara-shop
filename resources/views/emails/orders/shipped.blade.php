<div class="container col-10 mx-auto">

<h1 class="text-center">Concernant votre commande</h1>


<p>Vous avez effectuez une commande chez nous le : {{$order->order_date }}</p>


<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Nom du produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix unitaire HT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $orderItem)
                <tr>
                    <td>{{ $orderItem->product_name }}</td>
                    <td>{{ $orderItem->quantity }}</td>
                    <td>{{ $orderItem->price }} €</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2" class="text-end">Prix TTC :</td>
                <td>{{ $order->total_amount }} €</td>
            </tr>
        </tbody>
    </table>
</div>




</div>