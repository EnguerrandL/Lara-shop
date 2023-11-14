<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
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


    public function cartShow()
    {


        $cartContent = Cart::with('products')->get();
    
      
        // $cartContent = Cart::with('product')->get();
      
        return view('cart.cart', [
            'cartContent' => $cartContent,
            // 'totalAmount' => $totalAmount,
        ]);
    }



    public function deleteItem($id)
    {

        $cartItem = Cart::find($id);
        $cartItem->delete();


        return back()->with(['message' => 'Produit supprimé avec succès', 'class' => 'warning']);
    }
}
