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
                <form action="{{route('allproduct.store')}}" method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <select name="product_id" id="" class='form-control'>
                                <option value="">---Select a Product Name---</option>
                                @foreach($products as $product)
                                <option value="{{$product->id}}" {{old('product_id')==$product->id?"selected":""}}>{{$product->product_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_id'))
                                <span class='text-danger'>Product Name is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Bazar Name</label>
                            <select name="bazarName_id" id="" class='form-control'>
                                <option value="">---Select a Bazar Name---</option>
                                @foreach($bazarName as $name)
                                <option value="{{$name->id}}" {{old('bazarName_id')==$name->id?"selected":""}}>{{$name->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bazarName_id'))
                                <span class='text-danger'>Bazar Name is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Bazar Location</label>
                            <select name="bazarLocation_id" id="" class='form-control'>
                                <option value="">---Select a Bazar Name---</option>
                                @foreach($bazarLocation as $name)
                                <option value="{{$name->id}}" {{old('bazarLocation_id')==$name->id?"selected":""}}>{{$name->location}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bazarLocation_id'))
                                <span class='text-danger'>Bazar Location is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <select name="price_id" id="" class='form-control'>
                                    <option value="">---Select a Price---</option>
                                    @foreach($prices as $price)
                                    <option value="{{$price->id}}" {{old('price_id')==$price->id?"selected":""}}>{{$price->old_price}}</option>
                                    @endforeach
                            </select>
                            @if($errors->has('price_id'))
                                <span class='text-danger'>Price is Required!</span>
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