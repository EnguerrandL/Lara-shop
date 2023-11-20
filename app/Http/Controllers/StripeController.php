<?php

namespace App\Http\Controllers;

use App\Events\UpdateProductQuantityEvent;
use App\Mail\OrderShipped;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{


    public function checkout(Order $order)
    {

        $user = Auth::user();


        
        if ($user->cart->products->isNotEmpty()) {

            $order =  Order::create([
                'user_id' => $user->id,
                'order_date' => Carbon::now(),
                'payment_status' => true,

            ]);


            $cartItems = Cart::where('user_id', $user->id)->get();
            $orderItems = [];


            foreach ($cartItems as $cartItem) {

                $orderItem = OrderItem::create([
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product->id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price,
                    'product_name' => $cartItem->product->name,
                    'image' => $cartItem->product->image,
                ]);

                $orderItems[] = $orderItem;
            }


            event(new UpdateProductQuantityEvent($order->id, $orderItems));


            $orderItem->update(['order_id' => $order->id]);

            $order->update(['total_amount' => $cartItems->sum(function ($item) {
                return $item->quantity * $item->product->price;
            })]);

            $user->cart->delete();


            Mail::send(new OrderShipped($order, $user));

            return redirect()->route('order.success', ['order' => $order->id])->with(['message' => 'Paiement réussi', 'class' => 'success']);
        } else {

            return redirect()->route('cart.show', ['user' => $user->id])->with(['message' => 'Votre panier est vide', 'class' => 'danger']);
        }
    }



    public function customerOrder()
    {
        $user = Auth::user();



        $orderData = Order::where('user_id', $user->id)
            ->latest('order_date')
            ->first();

        $order = Order::where('user_id', $user->id)
            ->latest('order_date')
            ->first();


        return view('order.success', [
            'user' => $user,
            'orderData' =>  $orderData,
            'order' => $order

        ]);
    }
}
