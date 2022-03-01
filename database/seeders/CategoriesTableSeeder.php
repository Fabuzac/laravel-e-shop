<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Sport', 'IT', 'Sciences', 'Physic', 'DEV'];

        for ($i=0; $i < count($categories) ; $i++) { 
            Category::create([
               'label' => $categories[$i]
            ]);
        }
    }
}
