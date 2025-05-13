<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::insert([
            ['nama_produk' => 'Nasi Goreng Spesial', 'satuan' => 'porsi', 'harga_default' => 18000, 'keterangan' => 'Pedas, dengan telur'],
            ['nama_produk' => 'Ayam Bakar Madu', 'satuan' => 'porsi', 'harga_default' => 20000, 'keterangan' => 'Bonus sambal & lalap'],
            ['nama_produk' => 'Es Teh Manis', 'satuan' => 'cup', 'harga_default' => 5000, 'keterangan' => 'Manis sedang'],
            ['nama_produk' => 'Sop Iga', 'satuan' => 'porsi', 'harga_default' => 25000, 'keterangan' => 'Termasuk nasi & acar'],
            ['nama_produk' => 'Tahu Isi', 'satuan' => 'pcs', 'harga_default' => 3000, 'keterangan' => 'Tahu isi sayur'],
        ]);
    }
}
