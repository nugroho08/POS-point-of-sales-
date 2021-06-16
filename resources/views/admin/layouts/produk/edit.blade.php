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
        <form action="{{ route('admin.update', $data->id) }}" method="POST">
            @csrf
        <div class="card-body card-block">
            <form action="" method="post" class="form-horizontal">
                <div class="row form-group">
               
                    <div class="col-6"><label for="nama_barang" class="form-control-label">Nama Barang</label><input name="nama_barang" id="nama_barang" value="{{ $data->nama_barang }}" type="text" placeholder="Masukan Nama Barang" class="form-control"></div>
                    <div class="col-6">
                    <label for="id_merek">Merek</label>
                        <select name="id_merek" id="id_merek" class="form-control">
                            <option>Pilih</option>
                                @foreach ($merek as $row)
                                <option value="{{ $row->id }}" {{ $data->id_merek == $row->id ? 'selected':'' }}>{{ $row->nama_merek }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                    <label for="id_distributor">Distributor</label>
                        <select name="id_distributor" id="id_distributor" class="form-control">
                            <option>Pilih</option>
                                @foreach ($distributor as $row)
                                <option value="{{ $row->id }}" {{ $data->id_distributor == $row->id ? 'selected':'' }}>{{ $row->nama_distributor }}</option>
                                @endforeach
                        </select>
                    </div>
                    
                    <div class="col-6"><label for="tanggal_masuk" class="form-control-label">Tanggal Masuk</label><input name="tanggal_masuk" id="tanggal_masuk" value="{{ $data->tanggal_masuk }}" type="date"  class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col-6"><label for="harga_barang" class="form-control-label">Harga Barang</label><input name="harga_barang" id="harga_barang" value="{{ $data->harga_barang }}" type="number" placeholder="Masukan Harga Barang" class="form-control"></div>
                    <div class="col-6"><label for="stok_barang" class="form-control-label">Stok Barang</label><input name="stok_barang" id="stok_barang" value="{{ $data->stok_barang }}" type="number" placeholder="Masukan Stok Barang" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col-6"><label for="keterangan" class="form-control-label">Keterangan</label><input name="keterangan" id="keterangan"value="{{ $data->keterangan }}" type="text" placeholder="Masukan Keterangan" class="form-control"></div>
                    
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-danger btn-sm">Update</button>
                    <a class="btn btn-success" href="{{route ('admin.index') }}">Back</a>
                </div>
            </form>
        </div>
        
         
    </div>
</div>
@endsection