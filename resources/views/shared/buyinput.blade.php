




<form class="col-2" action="" method="post">

    <select class="form-select" aria-label="Default select example">
        <option disabled selected>Quantité(s)</option>
        @foreach ($availableQuantities as $quantity)
        <option value="{{ $quantity }}">{{ $quantity }}</option>
             @endforeach
      </select>


    <button class="btn btn-success">
    Acheter
    </button>





</form>
