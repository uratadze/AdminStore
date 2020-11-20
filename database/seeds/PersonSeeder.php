<?php

use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::updateOrCreate([
            'user' => 1,
            'passport' => 12345678901,
            'first_name' => 'TestName',
            'last_name' => 'TestLastName',
            'Address' => 'test address 1#1',
            'city' => 'Tbilisi',
            'number' => 555112233,
        ]);
    }
}
