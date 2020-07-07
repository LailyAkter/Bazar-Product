@extends('layouts.backend.master')
@section('title','Edit Bazar Name')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Edit Bazar Name</h3>
                </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                <form action="{{route('bazarname.update',$bazar->id)}}" method='POST'>
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <div class="form-group">
                            <label>Bazar Name</label>
                            <input type="text" class="form-control" name='name' value="{{$bazar->name}}" placeholder="Enter Bazar Name">
                            @if($errors->has('name'))
                                <span class='text-danger'>Bazar Name is Required!</span>
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