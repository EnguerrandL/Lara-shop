<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function addToCart(Product $product, Request $request)
    {


        $productQuantity =  $request->input('quantity');

        Cart::updateOrCreate([
            'product_id' => $product->id,
            'price' => $product->price
        ], [
            'quantity' => $productQuantity,
        ]);

        return back()->with(['message' => 'Produit ajouté avec succès', 'class' => 'success']);
    }


    public function cartShow(User $user, Cart $cart, Order $order)
    {

        $order = new Order(); 

        dd($order);

        $user = User::find(1);

        $totalAmountWithoutTax = 0;
      

        $cartItems = Cart::with('product')->get();



       
        foreach($cartItems as $cart){
           $totalAmountWithoutTax += $cart->quantity * $cart->product->price;
        }
      
        $totalAmoutWithTax = $totalAmountWithoutTax * 1.20;

        
    
        return view('cart.cart', [
            'cartItems' => $cartItems,
            'totalAmountWithoutTax' =>  $totalAmountWithoutTax,
            'totalAmoutWithTax' => $totalAmoutWithTax,
            'user' => $user,
            'order' => $order
        ]);
    }



    public function deleteItem($id)
    {

        $cartItem = Cart::find($id);
        $cartItem->delete();


        return back()->with(['message' => 'Produit supprimé avec succès', 'class' => 'warning']);
    }
}
