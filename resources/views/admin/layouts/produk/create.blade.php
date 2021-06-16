@extends('main')

@section('title', 'Create Produk')

@section('sidebar')
    @include('admin.layouts.aside')
@endsection

@section('create')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            Input Produk<small><code></code></small>
           
        </div>
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
        <div class="card-body card-block">
            <form action="" method="post" class="form-horizontal">
                <div class="row form-group">
               
                    <div class="col-6"><label for="nama_barang" class="form-control-label">Nama Barang</label><input name="nama_barang" id="nama_barang" type="text" placeholder="Masukan Nama Barang" class="form-control"></div>
                    <div class="col-6">
                            <strong>Merek:</strong>
                                <select name="id_merek" id="id_merek" class="form-control">
                                    @foreach ($merek as $data)
                                    <option value="{{ $data->id}}"  >{{$data->nama_merek}}</rayon>
                                    @endforeach
                                </select>
                    </div>
                        
                    <!--<div class="col-6"><label for="id_merek" class="form-control-label">ID Merek</label><input name="id_merek" id="id_merek" type="number" placeholder=".col-4" class="form-control"></div>-->
                </div>
                <div class="row form-group">
                <div class="col-6">
                            <strong>Distributor:</strong>
                                <select name="id_distributor" id="id_distributor" class="form-control">
                                    @foreach ($distributor as $data)
                                    <option value="{{ $data->id}}"  >{{$data->nama_distributor}}</rayon>
                                    @endforeach
                                </select>
                    </div>
                    <div class="col-6"><label for="tanggal_masuk" class="form-control-label">Tanggal Masuk</label><input name="tanggal_masuk" id="tanggal_masuk" type="date"  class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col-6"><label for="harga_barang" class="form-control-label">Harga Beli</label><input name="harga_barang" id="harga_barang" type="number" placeholder="Masukan Harga Barang" class="form-control"></div>
                    <div class="col-6"><label for="hargajual" class="form-control-label">Harga Jual</label><input name="hargajual" id="hargajual" type="number" placeholder="Masukan Harga Jual" class="form-control"></div>
                    <div class="col-6"><label for="stok_barang" class="form-control-label">Stok Barang</label><input name="stok_barang" id="stok_barang" type="number" placeholder="Masukan Stok Barang" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col-6"><label for="keterangan" class="form-control-label">Keterangan</label><input name="keterangan" id="keterangan" type="text" placeholder="Masukan Keterangan" class="form-control"></div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button> 
                    <a class="btn btn-success" href="{{route ('admin.index') }}">Back</a>
                </div>
            </form>
        </div>
        
         
    </div>
</div>
@endsection