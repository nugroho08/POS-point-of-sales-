@extends('main')
 
@section('title', 'Transaksi')
 
@section('sidebar')
    @include('kasir.layouts.aside')
@endsection
 
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('kasir.create_transaksi') }}"> Tambah Transaksi</a>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
 
 
            <div class="card-body">
                <table class="table table-striped table-bordered data">
                <thead>
                                <tr>
                                  <th scope="col">NO</th>
                                  <th scope="col">ID Transaksi</th>
                                  <th scope="col">Nama Barang</th>
                                  <th scope="col">ID User</th>
                                  <th scope="col">Jumlah Beli</th>
                                  <th scope="col">Total Harga</th>
                                  <th scope="col">Tanggal Beli</th>
                                  <th scope="col">Total Bayar</th>
                                  <th scope="col">Kembalian</th>
                                  
                              </tr>
                          </thead>
                <tbody>
                @foreach ($data as $produk)
                <tr>
                        <td>{{ $produk->id }}</td>
                        <td>{{ $produk->id_transaksi }}</td>
                        <td>{{ $produk->barang->nama_barang}}</td>
                        <td>{{ $produk->id_user}}</td>
                        <td>{{ $produk->jumlah_beli }}</td>
                        <td>{{ $produk->total_harga }}</td>
                        <td>{{ $produk->tanggal_beli }}</td>
                        <td>{{ $produk->total_bayar}}</td>
                        <td>{{ $produk->kembalian}}</td>
                        <td>
                            <form action="#" method="POST">
 
                               
 
                                
                                
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.data').DataTable();
    })
@endsection
