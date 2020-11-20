<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'name' => 'test',
            'email'=> 'test@example.com',
            'password' => '$2y$10$jlOqPKlLzuVPyGpJkWqlVuJkwZ8kdZWwcubkWfStwDFX02D9qx6lq',
        ]);
    }
}
