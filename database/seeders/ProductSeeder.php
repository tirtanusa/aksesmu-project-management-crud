<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop Asus Vivobook 14',
                'description' => 'Laptop ringan dengan prosesor Intel Core i5, RAM 8GB, SSD 512GB, cocok untuk kerja dan kuliah.',
                'price' => 8500000,
                'stock' => 15,
            ],
            [
                'name' => 'Mouse Wireless Logitech M170',
                'description' => 'Mouse nirkabel dengan konektivitas USB receiver, hemat baterai, cocok untuk penggunaan harian.',
                'price' => 125000,
                'stock' => 50,
            ],
            [
                'name' => 'Keyboard Mechanical RGB',
                'description' => 'Keyboard mechanical dengan lampu RGB, switch blue, cocok untuk gaming dan mengetik.',
                'price' => 350000,
                'stock' => 30,
            ],
            [
                'name' => 'Monitor LED 24 Inch',
                'description' => 'Monitor Full HD 1920x1080, refresh rate 75Hz, cocok untuk kerja dan hiburan.',
                'price' => 1650000,
                'stock' => 10,
            ],
            [
                'name' => 'Headset Gaming Stereo',
                'description' => null,
                'price' => 275000,
                'stock' => 25,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}