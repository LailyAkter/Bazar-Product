@extends('layouts.backend.master')
@section('title','Create Price')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Create Price</h3>
                </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                <form action="{{route('price.store')}}" method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label> Old Price</label>
                            <input type="number" class="form-control" value="{{old('old_price')}}" name='old_price' placeholder="Enter Old Price">
                            @if($errors->has('old_price'))
                                <span class='text-danger'>Old Price is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Price</label>
                            <input type="number" value="{{old('price')}}" name='price' class="form-control">
                            @if($errors->has('price'))
                                <span class='text-danger'>Price is Required!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Unit</label>
                            <input type="text" value="{{old('unit')}}" name='unit' class="form-control">
                            @if($errors->has('unit'))
                                <span class='text-danger'>Unit is Required!</span>
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