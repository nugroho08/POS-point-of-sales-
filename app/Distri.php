<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distri extends Model
{
    protected $table = "distributor";
    protected $fillable = ['nama_distributor','alamat','no_tlp'];

    public function barang()
    {
        return $this->hasMany('App/Produk', 'id');
    }
}
