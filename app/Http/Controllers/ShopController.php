<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{



    public function index()
    {


        return view('shop.index', [
            'products' =>  Product::orderBy('updated_at', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->get(),
            'product' => Product::all()
        
        ]);
    }



    public function show(string $slug, Product $product)
    {

        $availableQuantities = $product->getCurrentQuantity();

       
        $checkSlug = $product->slug;

        if ($slug != $checkSlug) {
            return redirect()->route('shop.index', ['slug' => $checkSlug, 'product' => $product]);
        }

        return view('shop.product', [
            'slug' => $checkSlug,
            'product' => $product,
            'availableQuantities' => $availableQuantities
        ]);
    }
}
