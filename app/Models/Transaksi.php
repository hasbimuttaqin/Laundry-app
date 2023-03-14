<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $table = 'transaksis';

    protected $fillable = [
        'code',
        'id_outlet',
        'id_pelanggan',
        'id_paket',
        'harga',
        'qty',
        'tgl',
        'batas_waktu',
        'tgl_bayar',
        'biaya_tambahan',
        'diskon',
        'pajak',
        'status',
        'dibayar',
        'total',
        'keterangan',
    ];

    public function outlets()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }

    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function pakets()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function getTotalHargaAttribute()
    {
        return $this->pakets->harga * $this->qty;
    }

    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => 'INV.?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
