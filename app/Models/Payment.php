<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;

    protected $fillable = [
        'id_pesanan',
        'metode_pembayaran',
        'bukti_bayar',
        'status_verifikasi'
    ];

    public function pesanan()
    {
        return $this->belongsTo(Order::class, 'id_pesanan', 'id_pesanan');
    }
}