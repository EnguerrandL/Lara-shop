<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;




    protected $fillable = ['user_id', 'product_id', 'quantity'];





    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }



    public function priceByQuantity()
    {
        return $this->product->price * $this->quantity;
    }


    public function priceWithTax()
    {
        $getValue = $this->priceByQuantity() * 1.20;

        return  number_format($getValue, 2, ',', ' ');
    }
}
