<form class="mt-2 mb-2" action="" method="post">


 


        <select class="form-select" aria-label="Default select example">
            <option disabled selected>Quantité(s)</option @foreach ($product->availableQuantities as $quantity)
            <option value="{{ $quantity }}">{{ $quantity }}</option>
            @endforeach
        </select>

        <a href="" class="mt-2 btn btn-success">Acheter</a>



</form>
