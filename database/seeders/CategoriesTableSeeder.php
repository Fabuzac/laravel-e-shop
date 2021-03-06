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
        $categories = ['Technology', 'Lifestyle', 'Fashion', 'Art', 'Food', 'Architecture', 'Advanture'];

        for ($i=0; $i < count($categories) ; $i++) { 
            Category::create([
               'label' => $categories[$i]
            ]);
        }
    }
}
