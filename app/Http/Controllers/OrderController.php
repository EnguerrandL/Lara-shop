<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function index()
    {

        return view('order.index', [
            'orders' => Order::with('orderItems.product')->get(),

        ]);
    }


    public function deleteOrder(Order $order)
    {

        $order->delete();

        return back()->with(['message' => 'La commande à été annulée avec succès', 'class' => 'danger']);
    }
}
