<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = 'mejas';
    protected $primaryKey = 'idmeja';
    protected $fillable = [
        'nomormeja',
        'kapasitas',
        'status'
    ];

    public function pesanan(){
        return this->hasMany(Pesanan::class, 'idmeja', 'idmeja');
    }
}
