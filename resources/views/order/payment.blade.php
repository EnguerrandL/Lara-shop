@extends('base')

@section('title', 'Portail de paiement')


@section('content')


    <div class="container col-10">

        <h3 class="text-center">Paiement de votre commande : </h3>

        <h5>Montant du paiement : {{ $order->total_amount }} € </h5>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('payment.process') }}" id="payment-form">
                        @csrf
                        <div class="form-group">
                            <label for="card-element">Card details</label>

                            <input type="hidden" name="payment_method" id="payment_method">
                            <div id="card-element" class="form-control">
                              
                            </div>
                        </div>

                        <div class="form-group">

                            <div id="card-errors" class="text-danger"></div>
                        </div>

                        <button type="button" id="submit-payment" class="btn btn-primary">Payer</button>
                    </form>
                </div>
            </div>
        </div>



    </div>


@endsection



@section('extra-js')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe(" {{ env('STRIPE_KEY') }} ");

    const elements = stripe.elements();
    const cardElement = elements.create('card', {
        classes: {
            base: 'StripeElement bg-white w-1/2 p-2 my-2 rounded-lg'
        }
    });

    cardElement.mount('#card-element');

    const cardButton = document.getElementById('submit-payment');

    cardButton.addEventListener('click', async(e) => {
        e.preventDefault();

        const { paymentMethod, error } = await stripe.createPaymentMethod(
            'card', cardElement
        );

        if (error) {
            alert(error)
        } else {
            document.getElementById('payment_method').value = paymentMethod.id;
        }

        document.getElementById('payment-form').submit();
    });




</script>
@endsection