<?php

use Illuminate\Database\Seeder;
use App\Models\SoldProduct;

class SoldProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SoldProduct::updateOrCreate([
            'product' => 1,
            'quantity' => 2,
            'buyer' => 1
        ]);
    }
}
