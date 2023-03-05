<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'no_tlp'
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan');
    }
}
