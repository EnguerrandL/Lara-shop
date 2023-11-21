<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

        return view('dashboard.dashboard', [
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    public function orderDetail(Order $order)
    {

        $user = Auth::user();
       

        return view('dashboard.orderdetail', [
            'order' => $order,
            'user' => $user,

        ]);
    }
}
