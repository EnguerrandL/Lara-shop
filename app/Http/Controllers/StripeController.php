<?php

namespace App\Http\Controllers;

use App\Events\UpdateProductQuantityEvent;
use App\Mail\OrderShipped;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductOutOfStock;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{


    public function checkout()
    {

        $user = Auth::user();

        if ($user->cart->products->isNotEmpty()) {

            $order =  Order::create([
                'user_id' => $user->id,
                'order_date' => Carbon::now(),
                // 'payment_status' => true,

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

            
            $orderItem->update(['order_id' => $order->id]);

            $order->update(['total_amount' => $cartItems->sum(function ($item) {

                    $totalAmount = $item->quantity * $item->product->price;

                return $totalAmount *1.20;
            })]);
        }
   
        return view('order.payment',[
            'order' => $order
        ]);
 
    }

    public function processPayment(Order $order, Request $request){
             $user = Auth::user();


            $order = $user->orders()->latest('created_at')->first();

            $totalAmount = $order->total_amount *1.20;
             $totalAmount = $totalAmount * 100; // Convertir en centimes
             $totalAmount = intval($totalAmount);

         
             $user->charge($totalAmount, $request->payment_method );


            $order->update(['payment_status' => true]);

            $orderItems = $order->orderItems;
 

            event(new UpdateProductQuantityEvent($order->id, $orderItems));
        
            $user->cart->delete();

            Mail::send(new OrderShipped($order, $user));

            return redirect()->route('order.success', ['order' => $order->id])->with(['message' => 'Paiement réussi', 'class' => 'success']);
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
