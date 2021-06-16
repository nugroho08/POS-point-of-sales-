@extends('main')

@section('title', 'Create Distributor')

@section('sidebar')
    @include('admin.layouts.aside')
@endsection

@section('create')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            Input Distributor<small><code></code></small>
        </div>

        <div class="card-body card-block">
            <form action="{{route('admin.store_distributor')}}" method="POST">
                @csrf
                <div class="row form-group">
               
                    <div class="col-6"><label for="nama_distributor" class="form-control-label">Nama Distributor</label><input name="nama_distributor" id="nama_distributor" type="text" placeholder="Masukan Nama Distributor" class="form-control"></div>
                    <div class="col-6"><label for="alamat" class="form-control-label">Alamat</label><input name="alamat" id="alamat" type="textarea" placeholder="Masukan Alamat" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col-6"><label for="no_tlp" class="form-control-label">No.Telp</label><input name="no_tlp" id="no_tlp" type="number" placeholder="Masukan No.Telp" class="form-control"></div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a class="btn btn-dark btn-sm" href="{{route ('admin.distributor') }}">Back</a>
                </div>
            </form>
        </div>

        <form action="{{ route('admin.store_distributor') }}" method="POST">
            @csrf
                
        </form>
        </div>         
    </div>
</div>
@endsection