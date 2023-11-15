<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    

    public function successPayment(){

        // 
        // Validation paiement
        // Si validé alors on retire des stock les produits achetés 
        // 





        return redirect()->route('order.success')->with(['message' => 'Paiement réussis', 'class' => 'success']);

    }



    public function customerOrder(){



        return view('oder.success', [
            ''
        ]);
    }


}
