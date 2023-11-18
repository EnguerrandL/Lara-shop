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


    public function addToCart(Request $request, $productId)
    {
        $user = User::find(1);

        $productQuantity =  $request->input('quantity');
        $product = Product::find($productId);

        $cartItems = Cart::where('user_id', $user->id)->with('products')->get();


        $cart = new Cart([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $productQuantity,
            'price' => $product->price,
        ]);


        // Prevent buyin multiple time same product 
        foreach($cartItems as $cartItem){
            if ($cartItem->product_id == $cart->product_id){
             return back()->with(['message' => 'Ce produit est déjà dans votre panier', 'class' => 'danger']);
            }
         }
 
        $cart->save();
      
        $user->cart->products()->attach($productId, ['quantity' => $productQuantity]);

        return back()->with(['message' => 'Produit ajouté avec succès', 'class' => 'success']);
    }


    public function cartShow(User $user)
    {

        $user = User::find(1);
        $cartItems = Cart::where('user_id', $user->id)->get();


        $totalAmountWithoutTax = 0;


        foreach ($cartItems as $cartItem) {
            $totalAmountWithoutTax += $cartItem->quantity * $cartItem->product->price;
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
