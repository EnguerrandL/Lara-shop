<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

           


       
            $order =  Order::create([
                'user_id' => $user->id,
                'order_date' => Carbon::now(),
                'payment_status' => true, 
            ]);
    
    
            OrderItem::create([
                'user_id' => $user->id,
                'order_id' =>  $order->id,
                'product_id' => $user->cart->product->id,
                'quantity' => $user->cart->quantity,
                'unit_price' => $user->cart->product->price,
            ]);
    
    
            // OrderItem::create([
            //     'user_id' => $user->id,
            //     'order_id' =>  $order->id,
            //     'product_id' => $product->id,
            //     'quantity' => $user->cart->quantity,
            //     'unit_price' => $product->price,
            // ]);
    


        
            // Récupérez les éléments de commande en attente pour l'utilisateur actuel
            $orderItems = OrderItem::where('user_id',  $user->id)->whereNull('order_id')->get();

        
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
