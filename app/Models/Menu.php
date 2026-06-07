<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'MENU';
    protected $primaryKey = 'ID_MENU';
    public $timestamps = false;

    protected $fillable = [
        'ID_KATEGORI',
        'NAMA_MENU',
        'HARGA',
        'STOK',
        'DESKRIPSI',
        'GAMBAR'
    ];
}