@extends('layouts.backend.master')
@section('title','Create Product')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Create Product</h3>
                </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                <form action="{{route('product.store')}}" method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" value="{{old('product_name')}}" name='product_name' placeholder="Enter Product Name">
                            @if($errors->has('product_name'))
                                <span class='text-danger'>Product Name is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Product Image</label>
                            <input type="file" file="{{old('image')}}" name='image'>
                            @if($errors->has('image'))
                                <span class='text-danger'>Product image is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Date</label>
                            <input type="date" value="{{old('created_at')}}" name='created_at'>
                            @if($errors->has('created_at'))
                                <span class='text-danger'>Date is Required!</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection