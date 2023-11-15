<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function index()
    {

        return view('admin.order', [
            'orders' => Order::with('orderItems.product')->get(),
            'user' => User::find(1)

        ]);
    }


    public function deleteOrder(Order $order)
    {

        $order->delete();

        return back()->with(['message' => 'La commande à été annulée avec succès', 'class' => 'danger']);
    }
}
