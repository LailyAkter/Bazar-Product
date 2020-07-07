@extends('layouts.frontend.master')
@section('title','Register Page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="image-holder">
                <img src="{{asset('frontend/images/registration-form-4.jpg')}}" alt="">
            </div>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-{{session('type')}}">{{session('message')}}</div>
        @endif
        <div class="col-md-6">
            <form action="{{url('admin/register')}}" method='post'>
                @csrf
                <h3 class='text-center  text-primary'>Register</h3>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name='user_name' value="{{old('user_name')}}"  placeholder="name" class="form-control">
                    @if($errors->has('user_name'))
                        <span class='text-danger'>User Name is Required!</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class='mt-3'>Email</label>
                    <input type="email" name='email' value="{{old('email')}}"  placeholder="email" class="form-control">
                    @if($errors->has('email'))
                        <span class='text-danger'>Email is Required!</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class='mt-3'>Password</label>
                    <input type="password" name='password' value="{{old('password')}}"  placeholder="password" class="form-control">
                    @if($errors->has('password'))
                        <span class='text-danger'>Password is Required!</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class='mt-3'>Confirm Password</label>
                    <input type="password" name='password_confirmation' value="{{old('password')}}"  placeholder="password" class="form-control">
                    @if($errors->has('password_confirmation'))
                        <span class='text-danger'>Password  does not match</span>
                    @endif
                </div>
                <button class='btn btn-primary mt-4' type='submit'>Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection