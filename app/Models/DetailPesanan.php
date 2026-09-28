<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $table = 'detail_pesanans';
    protected $primaryKey = 'iddetail';
    protected $fillable = [
        'idpesanan',
        'idmenu',
        'jumlah',
        'harga_satuan'
    ];

    public function pesanan(){
        return this->belongsTo(Pesanan::class, 'idpesanan', 'idpesanan');
    }

    public function menu(){
        return this->belongsTo(Menu::class, 'idmenu', 'idmenu');
    }
    
}
