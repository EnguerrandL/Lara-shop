<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{



    public function index(Product $product){

        $availableQuantities = $product->getCurrentQuantity();

        return view('shop.index', [
            'products' => Product::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->get(),
            'availableQuantities' => $availableQuantities
        ]);
    }



    public function show(string $slug, Product $product){

        $availableQuantities = $product->getCurrentQuantity();
        $checkSlug = $product->slug;

        if ($slug != $checkSlug) {
            return to_route('shop.index', ['slug' => $checkSlug, 'product' => $product]);
        }

        return view('shop.product', [
            'slug' => $checkSlug,
            'product' => $product,
            'availableQuantities' => $availableQuantities
        ]); 
    }



   

}
