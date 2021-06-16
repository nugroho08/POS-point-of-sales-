@extends('main')
 
@section('title', 'Merek')
 
@section('sidebar')
    @include('admin.layouts.aside')
@endsection
 
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('admin.create_merek') }}"> Tambah Merek</a>
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
                                  <th scope="col">ID Merek</th>
                                  <th scope="col">Nama Merek</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                <tbody>
                @foreach ($data as $merek)
                <tr>
                        <td>{{ $merek->id }}</td>
                        <td>{{ $merek->nama_merek }}</td>
                        <td>
                            <form action="#" method="POST">
 
                               
 
                                <a class="btn btn-warning btn-sm" href="{{route ('admin.edit_merek',$merek->id) }}">Edit</a>
                                <a  class="btn btn-sm btn-danger" href="{{route('admin.destroy_merek', $merek->id)}}" class="badge badge-danger">Delete</a>
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
