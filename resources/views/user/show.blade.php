@extends('layouts.frontend.master')
@section('title','Indivisual Product ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="image-holder">
                <img src="{{asset('frontend/images/registration-form-4.jpg')}}" alt="">
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{url('user/register/list')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}"/>
                <h3 class='text-center text-primary'>All Product</h3>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name='user_name' readonly value="{{$user->user_name}}" placeholder="name" class="form-control">
                </div>
                <div class="form-group">
                    <label class='mt-2'>Product Name</label>
                    <select  name='product_id'  class="form-control" id="exampleFormControlSelect2">
                        <option value="">Select Product Name</option>
                        @foreach($products as $product)
                        <option {{old('product_id')==$product->id?"selected":""}}  value="{{$product->id}}">{{$product->product_name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('product_id'))
                        <span class='text-danger'>Product Name is Required!</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class='mt-2'>Bazar Name</label>
                    <select name='bazarName_id'  class="form-control" disabled id="exampleFormControlSelect2">
                        <option value="{{$bazar->id}}" selected>{{$bazar->name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class='mt-2'>Bazar Location</label>
                    <select  name='bazarLocation_id' disabled class="form-control" id="exampleFormControlSelect2">
                        <option  value='{{$location->id}}' selected>{{$location->location}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class='mt-2'>Price</label>
                    <select  name='price_id'  class="form-control" id="exampleFormControlSelect2">
                        <option value="">Select Price</option>
                        @foreach($prices as $price)
                        <option  value="{{$price->id}}" {{old('price_id')==$price->id?"selected":""}}>{{$price->price}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('price_id'))
                        <span class='text-danger'>Price is Required!</span>
                    @endif
                </div>
                <button class='btn btn-primary mt-4 mb-4' type='submit'>Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection