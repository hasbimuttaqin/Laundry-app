<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlets';

    protected $fillable = [
        'nama_outlet',
        'alamat',
        'no_telp'
    ];

    public function pakets()
    {
        return $this->hasMany(Paket::class, 'id_outlet');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_outlet');
    }
}
