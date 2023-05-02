@extends('layouts.dashboard')
@section('title')
    products inventory
@endsection
@section('inventory')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 ">
            <div class="card" >
                <div class="card-header">
                    <h3 class="text-center">Products details</h3>
                </div>
                @if(session('Delete'))
                    <div style="color: red ; font-size: 20px" class="alert-danger">{{session('Delete')}}</div>
                @endif
                <table class="mt-4 table table-striped table-dark">

                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">product Name</th>
                        <th scope="col">product size</th>
                        <th scope="col">product color</th>
                        <th scope="col">product Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inventorys as $inventory)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{\App\Models\product::where('id',$inventory->product_id)->first()->product_name}}</td>
                            <td>{{\App\Models\color::where('id',$inventory->product_color)->first()->color_name}}</td>
                            <td>{{\App\Models\size::where('id',$inventory->product_size)->first()->size_name}}</td>
                            <td >{{$inventory->product_quantity}}</td>
                            <td>
                                <a href="" style="width: 100px;" class="mt-2 btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>





        <div class="col-lg-4 ">
            <div class="card" >
                <div class="card-header">

                    <h3 class="text-center">Product inventory</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/inventory/insert/')}}" method="POST">
                        @csrf
                        @if(session('success'))
                            <div style="color: green ; font-size: 20px" class="alert-success">{{session('success')}}</div>
                        @endif
                    <div class="form-group">
                        <label class="form-level">Product Name</label>
                        <input class="form-control" readonly type="text" value="{{$product_name->product_name}}" name="product_name">
                        <input class="form-control" hidden type="text" value="{{$product_name->id}}" name="product_id">

                    </div>
                    @error('product_name')
                    <strong class="text-danger"> {{$message}}</strong>
                    @enderror
                        <div class="form-group ">
                            <label for="Input">product color</label>
                            <select name="product_color"  class="mt-2 form-control">

                                <option class="mt-1 form-control" value="">--Select Color--</option>
                                @foreach($colors as $color)
                                    <option type="text" value="{{$color->id}}">{{$color->color_name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Input">product size</label>
                            <select name="product_size" class="mt-2 form-control" id="subcategory_name">

                                <option class="mt-1 form-control" value="">Select product size</option>
                                @foreach($sizes as $size)
                                    <option type="text" value="{{$size->id}}">{{$size->size_name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}
                            </div>
                            @enderror
                        </div>
                    <div class="form-group">
                        <label class="form-level">Product quantity</label>
                        <input class="form-control" type="number" id="product-name" name="product_quantity">

                    </div>
                    @error('product_quantity')
                    <strong class="text-danger"> {{$message}}</strong>
                    @enderror

                        <div class="text-center form-group mt-3">
                            <button type="submit"  class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
