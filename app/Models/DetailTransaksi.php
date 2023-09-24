<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';

    protected $fillable = [
        'barang_id',
        'harga',
        'jumlah',
        'total',
    ];

    public function ref_transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function ref_barang()
    {
        return $this->belongsTo(MstBarangModel::class, 'barang_id', 'id');
    }
}
