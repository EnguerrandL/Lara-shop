<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'total_amount',
    ];





    public function getOrderDateAttribute($value)
    {
        Carbon::setLocale('fr');
        return Carbon::createFromFormat($this->getDateFormat(), $value)->format('d F Y \ à H\hi');
    }



    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }



    public function getTotalAmount()
    {
        $totalAmount = 0;

        foreach ($this->orderItems as $orderItem) {
            $totalAmount += $orderItem->quantity * $orderItem->unit_price;
        }
        $this->update(['total_amount' => $totalAmount]);

        return $totalAmount;
    }
}
