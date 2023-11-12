<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    

    public function cart(Order $order){




        return view('cart.order', [
            'orderItem' => OrderItem::with('product')->get(),
          
        ]);

    }


}
