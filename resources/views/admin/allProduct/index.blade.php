@extends('layouts.backend.master')
@section('title','Product List')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
            @if(session('product_add_msg'))
                <div class='alert alert-success'> 
                    {{session('product_add_msg')}}
                </div>
            @endif
            <a href="{{route('allproduct.create')}}" class='btn btn-primary mb-3'>Add Product</a>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <div class="find_title text-center mt-3 mb-4 text-primary">Find the All Product</div>
                            </div>
                            <div class="col-12">
                                <div class="find_form_container">
                                    <form action="" method='GET' id="find_form" class="find_form d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-between justify-content-start flex-wrap">
                                        <div class="find_item">
                                            <div class='text-bold'>Product Name</div>
                                            <select name="product_id" id="" class='form-control'>
                                                <option value="">Product Name</option>
                                                @foreach($product as $p)
                                                <option {{$p->product_name==$product_id?"selected":""}} value="{{$p->product_name}}" name="search">{{$p->product_name}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                        <div class="find_item">
                                            <div class='text-bold'>Bazar Location</div>
                                            <select name="bazarLocation_id" id="" class='form-control'>
                                                    <option  value="">Bazar Location</option>
                                                    @foreach($bazarLocation as $bazar)
                                                    <option {{$bazar->id==$bazarLocation_id?"selected":""}} value="{{$bazar->id}}" name="seacrh">{{$bazar->location}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="find_item">
                                            <div class='text-bold'>Bazar Name</div>
                                            <select name="bazarName_id" id="" class='form-control'>
                                                    <option  value="">Bazar Name</option>
                                                    @foreach($bazarName as $bazar)
                                                    <option {{$bazar->id==$bazarName_id?"selected":""}} value="{{$bazar->id}}" name="search">{{$bazar->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="find_item">
                                            <div class='text-bold'>Date</div>
                                            <input class='form-control' type="date" name="search" value="{{$search}}" placeholder="Keyword here">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                                    </form>
                                </div>
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
                                    <th>Freature Image</th>
                                    <th>Product Name</th>
                                    <th>Bazar Name</th>
                                    <th>Bazar Location</th>
                                    <th>Price</th>
                                    <th>Old Price</th>
                                    <th>Unit</th>
                                    <th>Create At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key=>$product)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><img  style="width:100px; heigh:100px;" src="{{asset('storage/product/'.$product->image)}}" alt="product_img"></td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->location}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->old_price}}</td>
                                        <td>{{$product->unit}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>
                                            <a class='btn btn-primary' href='#'>Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    </div>
                    <div class="mt-4">  {{$products->render()}}</div>
                        <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection