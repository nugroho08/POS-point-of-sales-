@extends('main')
 
@section('title', 'Disributor')
 
@section('sidebar')
    @include('admin.layouts.aside')
@endsection
 
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('admin.create_distributor') }}"> Tambah Distributor</a>
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
                                  <th scope="col">ID Distributor</th>
                                  <th scope="col">Nama Distributor</th>
                                  <th scope="col">Alamat</th>
                                  <th scope="col">No.Telp</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                <tbody>
                @foreach ($data as $distri)
                <tr>
                        <td>{{ $distri->id }}</td>
                        <td>{{ $distri->nama_distributor }}</td>
                        <td>{{ $distri->alamat }}</td>
                        <td>{{ $distri->no_tlp }}</td>
                        <td>
                            <form action="#" method="POST">
 
                               
 
                                <a class="btn btn-sm btn-warning" href="{{route ('admin.edit_distributor',$distri->id) }}">Edit</a>
                                <a  class="btn btn-sm btn-danger" href="{{route('admin.destroy_distributor', $distri->id)}}" class="badge badge-danger">Delete</a>
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
@endsection
