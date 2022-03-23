<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'NEW2022',
            'value' => 50,
        ]);

        Coupon::create([
            'code' => 'SPRING2022',
            'value' => 150,
        ]);

        Coupon::create([
            'code' => 'SUMMER2022',
            'value' => 200,
        ]);
    }
}
