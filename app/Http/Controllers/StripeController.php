<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    

    public function checkout(Order $order, User $user){

        // 
        // Validation paiement
        // Si validé alors on retire des stock les produits achetés 
        // 

    


        $order = Order::create([
            'user_id' => 1,
            'order_date' => now(), 
        ]);


        $cartItems = $user->cart->items;

        foreach ($cartItems as $cartItem) {
            $order->orderItems()->create([
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                
            ]);
        }

        return redirect()->route('order.success')->with(['message' => 'Paiement réussis', 'class' => 'success']);

    }



    public function customerOrder(){



        return view('oder.success', [
            'order' => new Order()
        ]);
    }


}
