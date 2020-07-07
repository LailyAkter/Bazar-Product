@extends('layouts.frontend.master')
@section('title','List Product')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Product Name</th>
                        <th>Bazar Name</th>
                        <th>Bazar Location</th>
                        <th>Price</th>
                        <th>Old Price</th>
                        <th>Unit</th>
                    </tr>
                </thead>
                <tbody class='text-bold'>
                    @foreach($datas as $key=>$data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$data->user_name}}</td>
                            <td>{{$data->product_name}}</td>
                            <td>{{$data->bazerName}}</td>
                            <td>{{$data->location}}</td>
                            <td>{{$data->price}}</td>
                            <td>{{$data->old_price}}</td>
                            <td>{{$data->unit}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection