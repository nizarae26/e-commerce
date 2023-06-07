<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 20; $i++) { 
            Product::create([
                'id_kategori' => rand(1, 3),
                'id_subkategori' => rand(1, 7),
                'nama_barang' => 'Lorem Ipsum Dolor Sit Amet',
                'harga' => rand(100000, 1000000),
                'diskon' => 0,
                'bahan' => 'Lorxem Ixpsum Dolxor Sit Axmet',
                'tags' => 'Lorem, Ipsum, Dolor, Sit, Amet',
                'sku' => Str::random(8),
                'ukuran' => 'S, M, L ,XL, XXL',
                'warna' => 'Hitam, Putih, Biru, Merah' ,
                'gambar' => 'shop_image_' . $i . '.jpg',
                'deskripsi' => 'Lorem Ipsum Dolor Sit Amet' ,
                'gambar' => 'Lorem Ipsum Dolor Sit Amet'
            ]);
        }
    } 
}
