<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuHarian extends Model
{
    public function jadwalMenu()
    {
        return $this->belongsTo(JadwalMenu::class);
    }

    public function produkMenus()
    {
        return $this->hasMany(ProdukMenu::class);
    }

}
