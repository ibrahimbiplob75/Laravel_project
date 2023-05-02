@extends('layouts.dashboard')
@section('coupon')
    active
@endsection
@section('title')
    Coupon
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card" >
                    <div class="text-center card-header">
                        <h3>Coupon List</h3>
                        @if(session('Delete'))
                            <div style="color: red ; font-size: 20px" class="alert-danger">{{session('Delete')}}</div>
                        @endif
                        <table class="mt-4 table table-striped table-dark">

                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Coupon Name</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Validity</th>
                                <th scope="col">Discount %</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$coupon->coupon_name}}</td>
                                    <td>{{$coupon->created_by}}</td>
                                    <td>{{$coupon->coupon_validity}}</td>
                                    <td>{{$coupon->coupon_discount}}</td>
                                    <td>{{$coupon->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a style="width: 80px" href="{{url('/category/delete')}}/{{$coupon->id}}" class="btn btn-danger">Delete</a>

                                        <a style="width: 80px" href="{{url('/category/edit')}}/{{$coupon->id}}" class="mt-2 btn btn-success">Edit</a>
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
                        <form action="{{url('/coupon/insert')}}" method="POST">
                            @csrf
                            @if(session('success'))
                                <div style="color: green ; font-size: 20px" class="alert-success">{{session('success')}}</div>
                            @endif
                            <div class="form-group mt-2">
                                <label for="exampleInput">coupon Name</label>
                                <input type="text" class="mt-2 form-control" name="coupon_name" placeholder="coupon name">
                                <input type="hidden" class="mt-2 form-control" name="created_by" value="{{Auth::user()->name}}">
                                @error('coupon_name')
                                <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-1">
                                <label for="exampleInput">coupon validity</label>
                                <input type="date" class="mt-2 form-control" name="coupon_validity" >
                                @error('coupon_validity')
                                <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-1">
                                <label >coupon discount</label>
                                <input type="number" class="mt-2 form-control" name="coupon_discount" >
                                @error('coupon_discount')
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
