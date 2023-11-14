<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;




    protected $fillable = ['product_id', 'quantity'];



    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function products()
{
    return $this->hasMany(Product::class, 'id', 'product_id');
}


    public function priceByQuantity()
    {
        return $this->product->price * $this->quantity;
    }


    public function totalPriceWithoutTax()
    {
        return $this->products->sum(function ($product) {
            return $product->price * $product->quantity;
        });
    }


    // public function totalPriceWithoutTax()
    // {
    //     $amount = 0;

    //     foreach ($this->product as $product) {

    //         $amount += $product->price * $product->quantity;

    //         return $amount;
    //     }

    //     return $amount;
    // }
}
