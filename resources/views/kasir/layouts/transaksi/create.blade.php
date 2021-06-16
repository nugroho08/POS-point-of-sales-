@extends('main')

@section('title', 'Create Transaksi')

@section('sidebar')
    @include('kasir.layouts.aside')
@endsection

@section('create')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <small><code>Minimal Belanja Hanya 1 Barang</code></small>
        </div>
        <form action="{{ route('kasir.store_transaksi') }}" method="POST">
            @csrf
        <div class="card-body card-block">
            <form action="" method="post" class="form-horizontal">
                <div class="row form-group">
               
                    <div class="col-6"><label for="nama_barang" class="form-control-label">ID Transaksi</label><input name="id_transaksi" id="id_transaksi" type="text" placeholder="Masukan Nama Transaksi" class="form-control"></div>
                    <div class="col-6">
                            <strong>Nama Barang:</strong>
                                <select class="form-control" name="id_barang" id="id_barang">
                                    <option value disable>Pilih Barang</option>
                                    @foreach ($data as $item)
                                    <option value="{{ $item->id }}" data-harga="{{$item->hargajual}}" data-stok="{{$item->stok_barang}}">{{ $item->nama_barang }},Stock: {{ $item->stok_barang }}</option>
                                    @endforeach
                                </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label for="id_user" class="form-control-label">ID User</label><input name="id_user" id="id_user" value="{{auth()->user()->id}}" type="text" placeholder="Masukan User" class="form-control" readonly>
                    </div>
                    <div class="col-6">
                        <label for="jumlah_beli" class="form-control-label">Jumlah Beli</label><input name="jumlah_beli" id="jumlah_beli" type="number" placeholder="Masukan Jumalah Beli" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6"><label for="total_harga" class="form-control-label">Total Harga</label><input name="total_harga" id="total_harga" type="number" placeholder="Total Harga" class="form-control" readonly></div>
                    <div class="col-6"><label for="tanggal_beli" class="form-control-label">Tanggal Beli</label><input name="tanggal_beli" id="tanggal_beli" type="date"  class="form-control"></div>
                    <div class="col-6">
                        <label for="total_bayar" class="form-control-label">Total bayar</label><input name="total_bayar" id="total_bayar" type="number" placeholder="Masukan total bayar" class="form-control">
                    </div>
                    <div class="col-6"><label for="kembalian" class="form-control-label">Kembalian</label><input name="kembalian" id="kembalian" type="number" placeholder="Kembalian" class="form-control"></div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a class="btn btn-success" href="{{route ('kasir.transaksi') }}">Back</a>
                </div>
            </form>
        </div>   
    </div>
</div>
@endsection

@section('js')

<script>
jQuery(document).ready(function(){

    jQuery('select').change(function(){
      let harga = jQuery(this).find(':selected').data('harga');
      let stok = jQuery(this).find(':selected').data('stok');

      jQuery('#jumlah_beli').keyup(function(){
          let jumlah_beli = jQuery('#jumlah_beli').val()
          if(jumlah_beli > stok){
            jQuery('#jumlah_beli').val();
            alert('Stok Tidak Mencukupi');
          }else{
            let total = parseInt(harga) * parseInt(jumlah_beli)

            if (harga == "kosong") {
                total = ""
            }

            if (jumlah_beli == "") {
                total = ""
            }

            console.log(total);
            if(!isNaN(total)){
                jQuery('#total_harga').val(total)
            }
          }
      })
  })
});
</script>
@endsection

