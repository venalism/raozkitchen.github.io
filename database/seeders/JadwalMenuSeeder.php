<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalMenu;

class JadwalMenuSeeder extends Seeder
{
    public function run(): void
    {
        JadwalMenu::create([
            'nama_jadwal' => 'Minggu Ke-2 Mei 2025',
            'tanggal_mulai' => '2025-05-12',
            'tanggal_selesai' => '2025-05-17',
            'created_by' => 1,
        ]);
    }
}
