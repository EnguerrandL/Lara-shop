<?php

namespace App\Listeners;

use App\Events\UpdateProductQuantityEvent;
use App\Notifications\ProductOutOfStock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Notification;

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


            // Send notification if product out of stock 
            if ($orderItem->product->quantity <= 0) {

             
               
                Notification::route('mail', 'admin@netshop.fr')
       
                ->notify(new ProductOutOfStock($orderItem->product));

                

              
            }
        }




     
           
        }

    }

