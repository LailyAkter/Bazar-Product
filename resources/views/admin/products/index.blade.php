@extends('layouts.backend.master')
@section('titile','All Product')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
    @if(session('product_add_msg'))
        <div class='alert alert-success'> 
            {{session('product_add_msg')}}
        </div>
    @endif
    @if(session('product_edit_msg'))
        <div class='alert alert-success'> 
            {{session('product_edit_msg')}}
        </div>
    @endif
    <a href="{{route('product.create')}}" class='btn btn-primary mb-3'>Add Product</a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                All Product
                <span class="badge badge-info" >{{$products->count()}}</span>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Freature Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$product->product_name}}</td>
                            <td><img  style="width:100px; heigh:100px;" src="{{asset('storage/product/'.$product->image)}}" alt="product_img"></td>
                            <td>{{$product->created_at->todatestring()}}</td>
                            <td>
                                <a class='btn btn-primary' href='{{route("product.edit",$product->id)}}'>Edit</a>
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