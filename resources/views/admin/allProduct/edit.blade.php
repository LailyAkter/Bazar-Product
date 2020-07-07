@extends('layouts.backend.master')
@section('title','Edit Product')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                <form action="{{route('product.update',$product->id)}}" method='post' enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" value="{{$product->product_name}}" name='product_name' placeholder="Enter Product Name">
                            @if($errors->has('product_name'))
                                <span class='text-danger'>Product Name is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Bazar Name</label>
                            <select name="bazar_id" id="" class='form-control'>
                                <option value="">---Select a Bazar Name---</option>
                                @foreach($bazar_name as $name)
                                <option value="{{$name->id}}" {{$product->bazar_id ==$name->id?"selected":""}}>{{$name->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bazar_id'))
                                <span class='text-danger'>Bazar Name is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Bazar Location</label>
                            <select name="bazar_id" id="" class='form-control'>
                                    <option value="">---Select a Bazar Location---</option>
                                    @foreach($bazar_name as $name)
                                    <option value="{{$name->id}}" {{$product->bazar_id ==$name->id?"selected":""}}>{{$name->location}}</option>
                                    @endforeach
                            </select>
                            @if($errors->has('bazar_id'))
                                <span class='text-danger'>Bazar Location is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Product Image</label>
                            <input type="file" name='image'>
                            @if($errors->has('image'))
                                <span class='text-danger'>Product image is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" class="form-control"  value="{{$product->price}}" name='price' placeholder="Enter Product Price">
                            @if($errors->has('price'))
                                <span class='text-danger'>Product Price is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Old Price</label>
                            <input type="text" class="form-control" value="{{$product->old_price}}"  name='old_price' placeholder="Enter Old Price">
                            @if($errors->has('old_price'))
                                <span class='text-danger'>Old Priceis Required!</span>
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