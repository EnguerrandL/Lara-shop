<form class="mt-2 mb-2" action="{{ route('cart.addToCart', ['product' => $product]) }}" method="post">

@csrf
 
@method('POST')

        <select  name="quantity" class="form-select" aria-label="Default select example">
            <option value="1" selected >1</option @foreach ($product->availableQuantities as $quantity)
            <option value="{{ $quantity }}">{{ $quantity }}</option>
            @endforeach
        </select>

 

        <button class="btn btn-success">Acheter</button>



</form>
