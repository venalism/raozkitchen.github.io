<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'satuan',
        'harga_default',
        'keterangan',
        'jumlah_standar_unit',
        'is_active',
        'created_by',
    ];

    public function produkMenus()
    {
        return $this->hasMany(ProdukMenu::class);
    }
}