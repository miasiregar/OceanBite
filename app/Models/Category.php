<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nama_kategori'
    ];
}