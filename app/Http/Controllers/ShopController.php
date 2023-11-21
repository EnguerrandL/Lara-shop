<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{



    public function index()
    {

        return view('shop.index', [
            'products' =>  Product::orderBy('updated_at', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->get(),    
        
        ]);
    }



    public function show(string $slug, Product $product)
    {
   
       
        $checkSlug = $product->slug;

        if ($slug != $checkSlug) {
            return redirect()->route('shop.index', ['slug' => $checkSlug, 'product' => $product]);
        }

        return view('shop.product', [
            'slug' => $checkSlug,
            'product' => $product,
         
        ]);
    }
}
