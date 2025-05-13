<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalMenu extends Model
{
    public function menuHarians()
    {
        return $this->hasMany(MenuHarian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
