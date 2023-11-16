<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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




    public function getAvailableQuantitiesAttribute()
    {
        return range(1, $this->quantity);
    }



    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function imgUrl(): string
    {
        if (Str::contains($this->image, 'placeholder')) {
            return $this->image;
        } else {

            return asset(Storage::disk('public')->url($this->image));
        }
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
