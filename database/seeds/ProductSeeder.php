<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::updateOrCreate([
            'name' => 'Macbook Air',
            'header_picture_path' => '1605897475.jpeg',
            'price' => 2000,
            'quantity' => 18,
            'category' => 2,
            'status' => 1,
            'description' => 'Macbook Air 2020 256Gb on M1 Chip',
        ]);
    }
}
