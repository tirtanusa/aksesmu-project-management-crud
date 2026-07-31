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
        $products = $products = [
            [
                'name' => 'Beras Premium 5 kg',
                'description' => 'Beras putih pulen kualitas premium tanpa pemutih buatan, cocok untuk konsumsi harian keluarga.',
                'price' => 70000,
                'stock' => 25,
            ],
            [
                'name' => 'Minyak Goreng 2 Liter',
                'description' => 'Minyak kelapa sawit jernih kemasan pouch, membuat gorengan lebih renyah dan gurih.',
                'price' => 36000,
                'stock' => 40,
            ],
            [
                'name' => 'Gula Pasir 1 kg',
                'description' => 'Gula pasir putih manis alami yang higienis, cocok untuk pemanis teh, kopi, atau kue.',
                'price' => 17500,
                'stock' => 8, // Stok kurang dari 15
            ],
            [
                'name' => 'Telur Ayam Negeri 1 kg',
                'description' => 'Telur ayam segar pilihan berkualitas tinggi, kaya protein untuk asupan gizi harian.',
                'price' => 28000,
                'stock' => 0, // Stok habis
            ],
            [
                'name' => 'Indomie Goreng Original',
                'description' => 'Mie instan goreng favorit dengan bumbu gurih dan minyak bawang yang lezat.',
                'price' => 3000,
                'stock' => 120, // Stok banyak
            ],
            [
                'name' => 'Teh Celup Melati (isi 25)',
                'description' => null, // Deskripsi null
                'price' => 6500,
                'stock' => 12, // Stok kurang dari 15
            ],
            [
                'name' => 'Kopi Bubuk Hitam 165g',
                'description' => 'Kopi murni pilihan dengan aroma khas yang mantap untuk menemani pagi hari.',
                'price' => 11000,
                'stock' => 30,
            ],
            [
                'name' => 'Susu Kental Manis Putih',
                'description' => 'Susu kental manis kaya vitamin, cocok untuk campuran minuman es, roti, atau kue.',
                'price' => 12500,
                'stock' => 0, // Stok habis
            ],
            [
                'name' => 'Deterjen Bubuk 800g',
                'description' => 'Deterjen cuci pakaian dengan teknologi anti-bau dan busa melimpah, pakaian bersih kilat.',
                'price' => 19000,
                'stock' => 15,
            ],
            [
                'name' => 'Sabun Mandi Batang',
                'description' => 'Sabun mandi antiseptik yang menyegarkan kulit dan membunuh kuman seharian.',
                'price' => 4500,
                'stock' => 55,
            ],
            [
                'name' => 'Tepung Terigu 1 kg',
                'description' => 'Tepung terigu protein sedang serbaguna untuk membuat aneka gorengan, kue, dan roti.',
                'price' => 13000,
                'stock' => 5, // Stok kurang dari 15
            ],
            [
                'name' => 'Garam Halus Beryodium 500g',
                'description' => 'Garam dapur beryodium tinggi untuk menyempurnakan rasa masakan harian.',
                'price' => 5000,
                'stock' => 45,
            ],
            [
                'name' => 'Kecap Manis Botol 520ml',
                'description' => 'Kecap manis kental terbuat dari biji kedelai pilihan berkualitas tinggi.',
                'price' => 21000,
                'stock' => 10, // Stok kurang dari 15
            ],
            [
                'name' => 'Saus Sambal Botol 335ml',
                'description' => null, // Deskripsi null
                'price' => 15000,
                'stock' => 22,
            ],
            [
                'name' => 'Sabun Cuci Piring Cair 750ml',
                'description' => 'Cairan pembersih piring ampuh mengangkat lemak membandel dengan aroma jeruk nipis.',
                'price' => 16500,
                'stock' => 0, // Stok habis
            ],
            [
                'name' => 'Shampoo Sachet (Renceng isi 12)',
                'description' => 'Shampoo perawatan rambut lembut dengan keharuman tahan lama.',
                'price' => 6000,
                'stock' => 35,
            ],
            [
                'name' => 'Pasta Gigi 120g',
                'description' => 'Pasta gigi perlindungan ganda untuk gigi lebih putih dan nafas lebih segar.',
                'price' => 11500,
                'stock' => 14, // Stok kurang dari 15
            ],
            [
                'name' => 'Penyedap Rasa Sapi 100g',
                'description' => 'Bumbu penyedap rasa ekstrak daging sapi pilihan untuk sedapkan setiap masakan.',
                'price' => 6500,
                'stock' => 50,
            ],
            [
                'name' => 'Sarden Kaleng 155g',
                'description' => 'Ikan sarden dalam saus tomat lezat siap saji, praktis dan kaya nutrisi.',
                'price' => 10500,
                'stock' => 4, // Stok kurang dari 15
            ],
            [
                'name' => 'Air Mineral Galon 19 Liter',
                'description' => 'Air mineral pegunungan alami yang segar dan higienis untuk kebutuhan air minum keluarga.',
                'price' => 20000,
                'stock' => 28,
            ],
        ];
        
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}