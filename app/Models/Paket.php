<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'pakets';

    protected $fillable = [
        'id_outlet',
        'nama_paket',
        'jenis',
        'harga'
    ];

    public function outlets()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_paket');
    }
}
