<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['nombre' => 'GREE', 'slug' => 'gree', 'logo' => 'images/Marcas/gree.jpg', 'activo' => true],
            ['nombre' => 'AIRMAX', 'slug' => 'airmax', 'logo' => 'images/Marcas/AirMax.jpg', 'activo' => true],
            ['nombre' => 'CONFORTMATIC', 'slug' => 'confortmatic', 'logo' => 'images/Marcas/ConforMatic.png', 'activo' => true],
            ['nombre' => 'ROYAL', 'slug' => 'royal', 'logo' => 'images/Marcas/Royal.png', 'activo' => true],
            ['nombre' => 'WESTINTECH', 'slug' => 'westintech', 'logo' => 'images/brands/westintech.svg', 'activo' => true],
            ['nombre' => 'MILEXUS', 'slug' => 'milexus', 'logo' => 'images/brands/milexus.svg', 'activo' => true],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(['slug' => $brand['slug']], $brand);
        }
    }
}
