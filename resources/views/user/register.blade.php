@extends('layouts.frontend.master')
@section('title','Register Page')

@section('content')
<div class="container">
    <div class="row">
        @if(session('register_add_msg'))
            <div class='alert alert-success'> 
                {{session('register_add_msg')}}
            </div>
        @endif
        <div class="col-md-4">
            <div class="image-holder">
                <img src="{{asset('frontend/images/registration-form-4.jpg')}}" alt="">
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{url('user/register')}}" method='post'>
                @csrf
                <h3 class='text-center mb-4 mt-5 text-primary'>Register</h3>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name='user_name' value="{{old('user_name')}}" placeholder="name" class="form-control">
                    @if($errors->has('user_name'))
                        <span class='text-danger'>User Name is Required!</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class='mt-1'>Bazar Name</label>
                    <select name='bazarName_id'  class="form-control" id="exampleFormControlSelect2">
                        <option>-----Select Bazar Name----</option>
                        @foreach($bazarName as $bazar)
                        <option {{old('bazarName_id')==$bazar->id?"selected":""}} value="{{$bazar->id}}">{{$bazar->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('bazarName_id'))
                        <span class='text-danger'>Bazar Name is Required!</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class='mt-3'>Bazar Location</label>
                    <select  name='bazarLocation_id'  class="form-control" id="exampleFormControlSelect2">
                        <option>-----Select Bazar Location----</option>
                        @foreach($bazarLocation as $bazar)
                        <option {{old('bazarLocation_id')==$bazar->id?"selected":""}} value="{{$bazar->id}}">{{$bazar->location}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('bazarLocation_id'))
                        <span class='text-danger'>Bazar Location is Required!</span>
                    @endif
                </div>
                <button class='btn btn-primary mt-4' type='submit'>Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection