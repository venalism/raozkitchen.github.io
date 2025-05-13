<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuHarian;

class MenuHarianSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['jadwal_menu_id' => 1, 'hari' => 'Senin',  'tanggal' => '2025-05-12'],
            ['jadwal_menu_id' => 1, 'hari' => 'Selasa', 'tanggal' => '2025-05-13'],
            ['jadwal_menu_id' => 1, 'hari' => 'Rabu',   'tanggal' => '2025-05-14'],
            ['jadwal_menu_id' => 1, 'hari' => 'Kamis',  'tanggal' => '2025-05-15'],
            ['jadwal_menu_id' => 1, 'hari' => 'Jumat',  'tanggal' => '2025-05-16'],
        ];

        foreach ($data as $item) {
            MenuHarian::create($item);
        }
    }
}