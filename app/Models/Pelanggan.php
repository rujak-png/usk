<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';
    protected $primaryKey = 'idpelanggan';
    protected $fillable = [
        'nama',
        'jeniskelamin',
        'nohp',
        'alamat'
    ];

    public function pesanan(){
        return this->hasMany(Pesanan::class, 'idpelanggan','idpelanggan');
    }

}
