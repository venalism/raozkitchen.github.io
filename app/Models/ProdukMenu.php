<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukMenu extends Model
{
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function menuHarian()
    {
        return $this->belongsTo(MenuHarian::class);
    }
}
