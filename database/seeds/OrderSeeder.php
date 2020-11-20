<?php

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::updateOrCreate([
            'person' => 1,
            'product' => 1,
            'quantity' => 2,
            'status' => 2,
        ]);

        Order::updateOrCreate([
            'person' => 1,
            'product' => 1,
            'quantity' => 1,
            'status' => 0,
        ]);
    }
}
