<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jadwal',
        'tanggal_mulai',
        'tanggal_selesai',
        'poster_url',
        'created_by',
    ];

    public function menuHarians()
    {
        return $this->hasMany(MenuHarian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}