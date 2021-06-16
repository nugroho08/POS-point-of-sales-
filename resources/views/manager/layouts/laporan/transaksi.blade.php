@extends('main')
 
@section('title', 'Laporan')
 
@section('sidebar')
    @include('manager.layouts.aside')
@endsection
 
@section('content')
<div class="row">
        <div class="col-6 col-md-6 col-lg-6">
                <form action="/laporan/cari" method="GET">
               
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <input type="date" class="form-control @error('startDate') is-invalid @enderror mb-4" name="startDate" id="startDate">
                        @error('starDate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="col-auto">
                        <label class="col-sm-2 mb-3"><b>-</b></label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control @error('endDate') is-invalid @enderror mb-4" name="endDate" id="endDate">
                        @error('endDate')
                        <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-4">Cari</button>
                        <div class="btn btn-primary mb-4" onclick="print()" id="print">Print</div>
                        <a href="/laporanexport_transaksi" class="btn btn-success mb-4" target="_blank">Excel</a>
                     </div>
            </div>
        </div>
        <hr>
    </div>
</form>
<div class="card">
    <div class="card-body">
    <table id="table" class="table table-striped table-bordered table-md">
    <thead>
        <tr>
            <th>No</th>        
            <th>Kode Transaksi</th>
            <th>Nama Barang</th>
            <th>Nama User</th>
            <th>Jumlah Beli</th>
            <th>Total Harga</th>
           	<th>Tanggal Beli</th>
        </tr>
    </thead> 
    <tbody>
        @foreach ($transaksi as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->id_transaksi }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->id_user }}</td>
            <td>{{ $item->jumlah_beli }}</td>
            <td>{{ $item->total_harga }}</td>
            <td>{{ $item->tanggal_beli }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection


