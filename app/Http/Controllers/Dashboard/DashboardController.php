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
    $orders = Order::where('user_id', $user->id)->orderBy('order_date', 'DESC')->get();

    return view('dashboard', [
        'user' => $user,
        'orders' => $orders,
    ]);
}
}
