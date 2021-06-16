<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    protected $primaryKey ="id_detail_transaksi";
    protected $fillable = [
        'id_transaksi','id_barang','id_user','qty','hargajual'
    ];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
