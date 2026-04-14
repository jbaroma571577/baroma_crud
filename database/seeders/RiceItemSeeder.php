<?php

namespace Database\Seeders;

use App\Models\RiceItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiceItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $riceItems = [
            [
                'name' => 'Jasmine Rice',
                'price_per_kg' => 55.00,
                'stock_quantity' => 100,
                'description' => 'Premium jasmine rice with fragrant aroma and sticky texture. Perfect for Asian dishes.',
            ],
            [
                'name' => 'Brown Rice',
                'price_per_kg' => 48.00,
                'stock_quantity' => 75,
                'description' => 'Nutritious brown rice packed with fiber and minerals. Great for health-conscious consumers.',
            ],
            [
                'name' => 'Dinorado Rice',
                'price_per_kg' => 42.00,
                'stock_quantity' => 150,
                'description' => 'Popular Philippine rice variety with excellent cooking quality and taste.',
            ],
            [
                'name' => 'White Long Grain Rice',
                'price_per_kg' => 38.00,
                'stock_quantity' => 200,
                'description' => 'Classic white rice that works well for any meal. Fluffy and easy to cook.',
            ],
            [
                'name' => 'Basmati Rice',
                'price_per_kg' => 65.00,
                'stock_quantity' => 50,
                'description' => 'Premium basmati rice with long grains. Ideal for biryanis and pilafs.',
            ],
            [
                'name' => 'Black Rice (Forbidden Rice)',
                'price_per_kg' => 85.00,
                'stock_quantity' => 30,
                'description' => 'Rare black rice with nutty flavor and antioxidants. Premium choice.',
            ],
        ];

        foreach ($riceItems as $rice) {
            RiceItem::create($rice);
        }
    }
}
