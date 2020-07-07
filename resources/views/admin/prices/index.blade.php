@extends('layouts.backend.master')
@section('titile','All Price')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
    @if(session('Price_add_msg'))
        <div class='alert alert-success'> 
            {{session('Price_add_msg')}}
        </div>
    @endif
    @if(session('Price_update_msg'))
        <div class='alert alert-success'> 
            {{session('Price_update_msg')}}
        </div>
    @endif
    <a href="{{route('price.create')}}" class='btn btn-primary mb-3'>Add Price</a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                All Price
                <span class="badge badge-info" >{{$price_all->count()}}</span>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Old Price</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($price_all as $key=>$price)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$price->old_price}}</td>
                            <td>{{$price->price}}</td>
                            <td>{{$price->unit}}</td>
                            <td>{{$price->created_at->todatestring()}}</td>
                            <td>
                                <a class='btn btn-primary' href='{{route("price.edit",$price->id)}}'>Edit</a>
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