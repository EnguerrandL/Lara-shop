<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


     protected $fillable = [
        'name',
        'slug',
        'price',
        'quantity', 
        'image',
        'description'
    ];



    public function priceByQuantity()
    {
        return $this->price * $this->quantity; 
    }


    public function getCurrentQuantity()
    {
     
        $availableQuantities = [];

        for ($i = 1; $i <= $this->quantity; $i++) {
            $availableQuantities[] = $i;
        }
    
        return $availableQuantities;
        
        }

    }

