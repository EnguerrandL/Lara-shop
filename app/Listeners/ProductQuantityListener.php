<?php

namespace App\Listeners;

use App\Events\UpdateProductQuantityEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductQuantityListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UpdateProductQuantityEvent $event): void
    {


        //    Order détails 
        $orderItems = $event->orderItems;


        foreach ($orderItems as $orderItem) {
            // Quantity update on products

            $orderItem->product->decrement('quantity', $orderItem->quantity);
        }
    }
}
