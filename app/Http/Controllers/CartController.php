<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function addToCart(Product $product, Request $request)
    {
        $user = User::find(1);

        $productQuantity =  $request->input('quantity');

        Cart::firstOrCreate([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'price' => $product->price
        ], [
            'quantity' => $productQuantity,
        ]);






        return back()->with(['message' => 'Produit ajouté avec succès', 'class' => 'success']);
    }


    public function cartShow(User $user, Cart $cart)
    {

        $user = User::find(1);

        $totalAmountWithoutTax = 0;

        $cartItems = Cart::with('product')->get();




        foreach ($cartItems as $cart) {
            $totalAmountWithoutTax += $cart->quantity * $cart->product->price;
        }

        $totalAmoutWithTax = $totalAmountWithoutTax * 1.20;


        return view('cart.cart', [
            'cartItems' => $cartItems,
            'totalAmountWithoutTax' =>  $totalAmountWithoutTax,
            'totalAmoutWithTax' => $totalAmoutWithTax,
            'user' => $user,
        ]);
    }



    public function deleteItem($id)
    {

        $cartItem = Cart::find($id);
        $cartItem->delete();


        return back()->with(['message' => 'Produit supprimé avec succès', 'class' => 'warning']);
    }
}
