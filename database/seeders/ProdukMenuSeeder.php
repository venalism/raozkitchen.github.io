<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProdukMenu;

class ProdukMenuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['menu_harian_id' => 1, 'produk_id' => 1, 'harga_menu' => 17000, 'keterangan_tambahan' => 'Diskon spesial'],
            ['menu_harian_id' => 1, 'produk_id' => 3, 'harga_menu' => 4500,  'keterangan_tambahan' => 'Free refill'],

            ['menu_harian_id' => 2, 'produk_id' => 2, 'harga_menu' => 20000, 'keterangan_tambahan' => 'Pedas manis'],
            ['menu_harian_id' => 2, 'produk_id' => 3, 'harga_menu' => 5000,  'keterangan_tambahan' => 'Es teh manis'],

            ['menu_harian_id' => 3, 'produk_id' => 4, 'harga_menu' => 25000, 'keterangan_tambahan' => 'Iga empuk'],

            ['menu_harian_id' => 4, 'produk_id' => 5, 'harga_menu' => 3000,  'keterangan_tambahan' => '2 pcs per porsi'],

            ['menu_harian_id' => 5, 'produk_id' => 1, 'harga_menu' => 18000, 'keterangan_tambahan' => 'Original recipe'],
        ];

        foreach ($data as $item) {
            ProdukMenu::create($item);
        }
    }
}