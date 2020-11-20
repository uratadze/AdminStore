<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['ტელეფონი', 'ლეპტოპი'];
        foreach($categories as $category)
        {
            Category::updateOrCreate([
                'name' => $category,
            ]);
        }
    }
}
