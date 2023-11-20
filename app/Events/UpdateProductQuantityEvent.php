<?php

namespace App\Events;

use App\Models\Product;
use App\Notifications\ProductOutOfStock;
use Illuminate\Foundation\Events\Dispatchable;

use Illuminate\Queue\SerializesModels;

class UpdateProductQuantityEvent
{
    use Dispatchable,  SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public $order, public  $orderItems)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;





    }


}
