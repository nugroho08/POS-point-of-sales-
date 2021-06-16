<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey ="id_transaksi";
    protected $fillable = [
        'total_barang','total_bayar','total_harga','kembalian','tanggal_beli'
    ];
    public function barang()
    {
        return $this->belongsTo(Produk::class, 'id_barang');
    }
}
