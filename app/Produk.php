<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "barang";
    protected $primarykey = "id";
    protected $fillable = ['nama_barang','id_merek','id_distributor','tanggal_masuk','harga_barang','hargajual','stok_barang','keterangan'];

    public function merek()
    {
        return $this->belongsTo('App\Merek', 'id_merek');
    }

    public function distributor()
    {
        return $this->belongsTo('App\Distri', 'id_distributor');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi', 'id_barang');
    }
}
