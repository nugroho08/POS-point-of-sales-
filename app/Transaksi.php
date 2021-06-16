<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
     protected $table = "trans";

    protected $fillable = ['id_transaksi','id_barang','id_user','jumlah_beli','total_harga','tanggal_beli','total_bayar','kembalian'];

    public function barang()
    {
        return $this->belongsTo('App\Produk' , 'id_barang');
    }
}
