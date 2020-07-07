@extends('layouts.frontend.master')
@section('title','Home Page')
@section('content')


<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider hero-overly  slider-height d-flex align-items-center" data-background="{{asset('frontend/assets/img/hero/h1_hero.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="hero__caption">
                            <h1>Find your <span>Product</span> </h1>
                        </div>
                    </div>
                </div>
                <!-- Search Box -->
                <div class="row">
                    <div class="col-xl-12 mb-5">
                        <!-- form -->
                        <form action="" method='GET' class="search-box">
                            <div class="select-form mb-30">
                                <div class="select-itms">
                                    <select name="product_id" id="" class='form-control'>
                                        <option value="">Product Name</option>
                                        @foreach($product as $p)
                                        <option {{$p->product_name==$product_id?"selected":""}} value="{{$p->product_name}}" name="search">{{$p->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="select-form mb-30">
                                <div class="select-itms">
                                    <select name="bazarName_id" id="" class='form-control'>
                                        <option value="">Bazar Name</option>
                                        @foreach($bazarName as $bazar)
                                        <option {{$bazar->id==$bazarName_id?"selected":""}} value="{{$bazar->id}}" name="search">{{$bazar->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="select-form mb-30">
                                <div class="select-itms">
                                    <select name="bazarLocation_id" id="select1">
                                        <option  value="">Bazar Location</option>
                                        @foreach($bazarLocation as $bazar)
                                        <option {{$bazar->id==$bazarLocation_id?"selected":""}} value="{{$bazar->id}}" name="search">{{$bazar->location}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="search-form mb-30">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>	
                        </form>	
                    </div>
                
                    <div class="col-xl-12">
                        <table class="table table-head-fixed text-nowrap">
                            <thead class='text-white'>
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
                                </tr>
                            </thead>
                            <tbody class='text-white text-bold'>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection