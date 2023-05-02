@extends('layouts.dashboard')
@section('category')
    active
@endsection
@section('title')
    Edit Category
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <div class="text-center card" >
                    <div class="card-header">
                        <h3>Edit Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/category/update')}}" method="POST">
                            @csrf
                            @if(session('success'))
                                <div style="color: green ; font-size: 20px" class="alert-success">{{session('success')}}</div>
                            @endif
                            <div class="form-group mt-2">
                                <label for="exampleInput">Category Name</label>
                                <input type="hidden" class="mt-2 form-control" name="category_id" value="{{$edit_name->id}}">
                                <input type="text" class="mt-2 form-control" name="category_name" value="{{$edit_name->category_name}}">
                                @error('category_name')
                                <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit"  class="btn btn-primary">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
@endsection
