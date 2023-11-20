<?php

namespace App\Notifications;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductOutOfStock extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Product $product)
    {
             
 
    }
    

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Produit en rupture de stock')
            ->line('Le produit ' . $this->product->name . ' est actuellement en rupture de stock.')
            ->action('Voir le produit', route('shop.index', ['slug' => $this->product->slug, 'product' => $this->product]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
           
            'product_out_of_stock_date' => Carbon::now(),
            'product_name' => $this->product->name
           
        ];
    }


}
