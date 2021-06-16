<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksis extends Model
{
    protected $table = "transaksi_detail";

    protected $fillable = ['nama_barang','hargajual','jumlah_beli','total_harga','created_at'];
}
