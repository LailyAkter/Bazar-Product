@extends('layouts.frontend.master')
@section('title','Login Page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="image-holder">
                <img src="{{asset('frontend/images/registration-form-4.jpg')}}" alt="">
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{url('admin/login')}}" method='post'>
                @csrf
                <h3 class='text-center mb-4 mt-5 text-primary'>Login</h3>
                <div class="form-group">
                    <label class='mt-3'>Email</label>
                    <input type="email" name='email' value="{{old('email')}}"  placeholder="email" class="form-control">
                    @if($errors->has('email'))
                        <span class='text-danger'>Email is Required!</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label class='mt-3'>Password</label>
                    <input type="password" name='password' value="{{old('password')}}"  placeholder="password" class="form-control">
                    @if($errors->has('password'))
                        <span class='text-danger'>Password is Required!</span>
                    @endif
                </div>
                <button class='btn btn-primary mt-4' type='submit'>Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection