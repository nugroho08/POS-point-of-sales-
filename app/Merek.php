<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = "merek";
    protected $primarykey = "id";
    protected $fillable = ['nama_merek'];

    public function barang()
    {
        return $this->hasMany('App/Produk', 'id');
    }
}
