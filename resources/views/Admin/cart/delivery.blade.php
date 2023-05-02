@extends('layouts.dashboard')
@section('delivery')
    active
@endsection
@section('title')
    delivery
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card" >
                    <div class="text-center card-header">
                        <h3>Delivery Area</h3>
                        @if(session('Delete'))
                            <div style="color: red ; font-size: 20px" class="alert-danger">{{session('Delete')}}</div>
                        @endif
                        <table class="mt-4 table table-striped table-dark">

                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Area Name</th>
                                <th scope="col">Delivery Charge</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveries as $delivery)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$delivery->area_name}}</td>
                                    <td>{{$delivery->delivery_charge}}</td>
                                    <td>{{$delivery->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a style="width: 80px;height: 40px" href="{{url('/category/delete')}}/{{ $delivery->id}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" >
                    <div class="card-header">
                        <h3 class="text-center">Coupon</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/delivery/area')}}" method="POST">
                            @csrf
                            @if(session('success'))
                                <div style="color: green ; font-size: 20px" class="alert-success">{{session('success')}}</div>
                            @endif
                            <div class="form-group mt-2">
                                <label for="exampleInput">Area Name</label>
                                <input type="text" class="mt-2 form-control" name="area_name" placeholder="Area name">
                                @error('area_name')
                                <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-1">
                                <label for="exampleInput">Delivery charge</label>
                                <input type="number" class="mt-2 form-control" name="delivery_charge" >
                                @error('delivery_charge')
                                <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit"  class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
@endsection

