<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    

    public function cart(){




        return view('cart.order', [
            'orderItem' => OrderItem::with('product')->get()
        ]);

    }


}
