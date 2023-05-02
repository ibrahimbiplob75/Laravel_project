@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-6 ">
            <div class="card" >
                <div class="card-header">
                    <h3 class="text-center">Products color</h3>
                </div>
                @if(session('delete'))
                    <div style="color: red ; font-size: 20px" class="alert-danger">{{session('delete')}}</div>
                @endif
                <table class="mt-4 table table-striped table-dark">

                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">color Name</th>
                        <th scope="col">color</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($colors as $color)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$color->color_name}}</td>
                            <td>
                                <i style="height:50px;width:50px;background: {{$color->color_code}}; display: inline-block;border-radius: 50%" ></i>
                            </td>
                            <td>{{$color->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{url('/subcategory/delete/color')}}/{{$color->id}}" style="width: 100px;" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>




        <div class="col-lg-3 ">
            <div class="card" >
                <div class="card-header">

                    <h3 class="text-center">Add Product color</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/products/color/insert')}}" method="POST">
                        @csrf
                        @if(session('Success'))
                            <div style="color: green ; font-size: 20px" class="alert-success">{{session('Success')}}</div>
                        @endif
                        <div class="form-group ">
                            <label for="Input">Color Name</label>
                            <input class="form-control" type="text" id="product-name" name="color_name">
                            @error('color_name')
                            <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product-price">Product color code</label>
                            <input type="text" class="form-control" name="color_code">

                        </div>
                        @error('color_code')
                        <strong class="text-danger"> {{$message}}</strong>
                        @enderror


                        <div class="text-center form-group mt-3">
                            <button type="submit"  class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3 ">
            <div class="card" >
                <div class="card-header">

                    <h3 class="text-center">Add Product size</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/products/size/insert')}}" method="POST" >
                        @csrf
                        @if(session('success'))
                            <div style="color: green ; font-size: 20px" class="alert-success">{{session('success')}}</div>
                        @endif
                        <div class="form-group ">
                            <label for="Input">Size Name</label>
                            <input class="form-control" type="text" id="product-name" name="size_name">
                            @error('size_name')
                            <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="text-center form-group mt-3">
                            <button type="submit"  class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-6 ">
            <div class="card" >
                <div class="card-header">
                    <h3 class="text-center">Products size</h3>
                </div>
                @if(session('Delete'))
                    <div style="color: red ; font-size: 20px" class="alert-danger">{{session('Delete')}}</div>
                @endif
                <table class="mt-4 table table-striped table-dark">

                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Size Name</th>
                        <th scope="col">created At</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sizes as $size)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$size->size_name}}</td>
                            <td>{{$size->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{url('/subcategory/delete/size')}}/{{$size->id}}" style="width: 100px;" class="mt-2 btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
