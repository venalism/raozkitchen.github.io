<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public function produkMenus()
    {
        return $this->hasMany(ProdukMenu::class);
    }

}
