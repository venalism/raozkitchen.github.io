<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_harian_id',
        'produk_id',
        'harga_menu',
        'keterangan_tambahan',
    ];

    public function menuHarian()
    {
        return $this->belongsTo(MenuHarian::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}