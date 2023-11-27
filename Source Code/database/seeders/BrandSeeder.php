<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mobilePhoneBrands = [
            'Apple',
            'Samsung',
            'Huawei',
            'Xiaomi',
            'OnePlus',
            'Sony',
            'LG',
            'Nokia',
            'Motorola',
            'Google',
        ];

        foreach ($mobilePhoneBrands as $brand) {
            Brands::factory()->create(['name' => $brand]);
        }
    }
}
