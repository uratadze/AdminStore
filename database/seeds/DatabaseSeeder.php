<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(ModelPermissionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(SoldProductsSeeder::class);
    }
}
