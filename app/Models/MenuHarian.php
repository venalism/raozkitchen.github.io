<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuHarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_menu_id',
        'hari',
        'tanggal',
    ];

    public function jadwalMenu()
    {
        return $this->belongsTo(JadwalMenu::class);
    }

    public function produkMenus()
    {
        return $this->hasMany(ProdukMenu::class);
    }
}