<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function index(){


        // dd(Order::with('orderItems'));

     
     

        return view('order.index', [
            'orders' => Order::with('orderItems')->get()
        ] );



    }


    public function deleteOrder(Order $order){

        $order->delete();

        return back()->with(['message' => 'La commande à été annulée avec succès', 'class' => 'danger']);
    }
}
