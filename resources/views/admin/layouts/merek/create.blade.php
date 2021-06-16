@extends('main')

@section('title', 'Create Merek')

@section('sidebar')
    @include('admin.layouts.aside')
@endsection

@section('create')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            Input Merek<small><code></code></small>
        </div>

        <div class="card-body card-block">
            <form action="{{route('admin.store_merek')}}" method="POST">
                @csrf
                <div class="row form-group">
               
                    <div class="col-6"><label for="nama_merek" class="form-control-label">Nama Merek</label><input name="nama_merek" id="nama_merek" type="text" placeholder="Masukan Nama Merek" class="form-control"></div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a class="btn btn-success" href="{{route ('admin.merek') }}">Back</a>
                </div>
            </form>
        </div>

        <form action="{{ route('admin.store_merek') }}" method="POST">
            @csrf
                
        </form>
        </div>         
    </div>
</div>
@endsection