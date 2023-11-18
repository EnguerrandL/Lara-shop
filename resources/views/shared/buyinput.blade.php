<form class="mt-2 mb-2" action="{{ route('cart.addToCart', ['product' => $product]) }}" method="post">

    @csrf

    @method('POST')

    @if ($product->quantity >= 1)

        <select name="quantity" class="form-select" aria-label="Default select example">
            <option value="1" selected>1</option @foreach ($product->availableQuantities as $quantity)
            <option value="{{ $quantity }}">{{ $quantity }}</option>
    @endforeach
    </select>
    <button class="btn btn-success">Ajouter au panier</button>


@else
<p class="alert alert-warning">Ce produit n'est plus en stock</p>

@endif
</form>