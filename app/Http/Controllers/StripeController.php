<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StripeController extends Controller
{


    public function checkout(Order $order, User $user, Product $product)
    {
        $user = User::find(1);
      

        if ($user->cart) {

            dd($user->cart());

            $order = Order::create([
                'user_id' => $user->id,
                'payment_status' => 0, 
                'order_date' => now(),
                'total_amount' => 0, 
            ]); 

       
          


        
            // Récupérez les éléments de commande en attente pour l'utilisateur actuel
            $orderItems = OrderItem::where('user_id',  $user->id)->whereNull('order_id')->get();

            dd($orderItems);
        
            // Associez les éléments de commande à la nouvelle commande
            foreach ($orderItems as $orderItem) {
                $orderItem->update(['order_id' => $order->id]);
            }
        
          
            $order->update(['total_amount' => $orderItems->sum('unit_price')]);
        
            
            return redirect()->route('order.success', ['order' => $order->id])->with(['message' => 'Paiement réussi', 'class' => 'success']);
        } else {
          
            return redirect()->route('cart.show', ['user' => $user->id])->with(['message' => 'Votre panier est vide', 'class' => 'danger']);
        }
    }



    public function customerOrder()
    {






        return view('order.success', [
            'user' => User::find(1)
        ]);
    }
}
