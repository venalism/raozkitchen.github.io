<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalMenu;
use App\Models\MenuHarian;

class MenuKateringController extends Controller
{
    public function index()
    {
        // Ambil jadwal menu terbaru
        $jadwal = JadwalMenu::with(['menuHarians.produkMenus.produk'])
            ->orderByDesc('tanggal_mulai')
            ->first();

        return view('client.menu', compact('jadwal'));
    }
}
