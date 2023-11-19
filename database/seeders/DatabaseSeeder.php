<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

       User::factory()->create([
            'id' => '1',
            'name' => 'Compte client test',
            'email' => 'admin@admin.fr',
            'password' => Hash::make('0000'),
            'isAdmin' => 1,

        ]);

        Product::factory(20)->create();
        Order::factory(10)->create();
        Product::factory(10)->create();
        OrderItem::factory(50)->create();
    }
}
