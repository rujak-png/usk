<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $primaryKey = 'idpesanan';
    protected $fillable = [
        'idpelanggan',
        'idmeja',
        'tglpesan',
        'total',
        'status'
    ];
    
    public function pelanggan(){
        return this->belongsTo(Pelanggan::class, 'idpelanggan','idpelanggan');
    }

    public function meja(){
        return this->belongsTo(Meja::class, 'idmeja','idmeja');
    }

    public function User(){
        return this->belongsTo(User::class, 'iduser','iduser');
    }

    public function detailPesanan(){
        return this->hasMany(DetailPesanan::class, 'idpesanan','idpesanan');
    }

    public function transaksi(){
        return this->hasOne(Transaksi::class, 'idpesanan','idpesanan');
    }
}
