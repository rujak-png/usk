<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $primaryKey = 'idtransaksi';
    protected $fillable = [
        'idpesanan',
        'iduser',
        'tanggal',
        'total',
        'bayar',
        'kembalian'
    ];

    public function pesanan(){
        return this->belongsTo(Pesanan::class, 'idpesanan', 'idpesanan');
    }

    public function user(){
        return this->belongsTo(User::class, 'iduser', 'iduser');
    }
}
