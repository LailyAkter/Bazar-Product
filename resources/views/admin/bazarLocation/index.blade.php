@extends('layouts.backend.master')
@section('titile','All Bazar Location')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        @if(session('bazar_add_msg'))
            <div class='alert alert-success'> 
                {{session('bazar_add_msg')}}
            </div>
        @endif
        @if(session('bazar_update_msg'))
            <div class='alert alert-success'> 
                {{session('bazar_update_msg')}}
            </div>
        @endif
        <a href="{{route('bazarlocation.create')}}" class='btn btn-primary mb-3'>Add Bazar Location</a>
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">
                All Bazar Location
                <span class="badge badge-info" >{{$bazar_all->count()}}</span>
            </h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
                </div>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead >
                        <tr>
                            <th>ID</th>
                            <th>Bazar Location</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bazar_all as $key=>$bazar)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$bazar->location}}</td>
                            <td>{{$bazar->created_at}}</td>
                            <td>
                                <a href="{{route('bazarlocation.edit',$bazar->id)}}" class='btn btn-primary'>Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    <!-- /.card -->
    </div>
</div>
@endsection()