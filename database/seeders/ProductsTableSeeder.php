<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 10 ; $i++) { 
            Product::create([
                'name' => $faker->catchPhrase,                
                'details' => $faker->sentence($nbWords = 5),
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min=10, $max = 500), 
                'description' => $faker->sentence($nbWords = 6, $variableNbWords = false)
            ]);
        }
    }
}
