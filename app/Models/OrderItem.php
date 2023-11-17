<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'order_id', 'product_id', 'price', 'quantity', 'product_name', 'image'];


  

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
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
