@extends('layouts.dashboard')
@section('subcategory')
    active
@endsection
@section('title')
    Edit Sub Category
@endsection
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div class="text-center card" >
                    <div class="card-header">
                        <h3>Edit Sub Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/subCategory/update')}}" method="POST">
                            @csrf
                            @if(session('Exists'))
                                <div style="color: green ; font-size: 20px" class="alert-success">{{session('Exists')}}</div>
                            @endif
                            @if(session('edit'))
                                <div style="color: green ; font-size: 20px" class="alert-success">{{session('edit')}}</div>
                            @endif
                            <div class="form-group">
                                <label for="Input">Category Name</label>
                                <select name="category_id"  class="mt-2 form-control">
                                    <option class="mt-1 form-control" value="">--Select Category--</option>
                                    @foreach($category as $categories)
                                        <option type="text" value="{{$categories->id}}" {{$categories->id==$subCategory->category_id?"selected":" "}}>{{$categories->category_name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInput">Sub Category Name</label>
                                <input type="hidden" class="mt-2 form-control" name="subcategory_id" value="{{$subCategory->id}}">
                                <input type="text" class="mt-2 form-control" name="subCategory_name" value="{{$subCategory->subCategory_name}}">
                                @error('subcategory_name')
                                <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit"  class="btn btn-primary">Update Subcategory</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
@endsection
