@extends('layouts.dashboard')
@section('category')
    active
@endsection
@section('title')
    Category
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card" >
                    <div class="text-center card-header">
                        <h3>Category List</h3>
                        @if(session('Delete'))
                            <div style="color: red ; font-size: 20px" class="alert-danger">{{session('Delete')}}</div>
                        @endif
                        <table class="mt-4 table table-striped table-dark">

                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $allcategory)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$allcategory->category_name}}</td>
                                <td>{{\App\Models\User::where('id',$allcategory->submitted_by)->first()->name}}</td>
                                <td>{{$allcategory->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{url('/category/delete')}}/{{$allcategory->id}}" class="btn btn-danger">Delete</a>

                                    <a href="{{url('/category/edit')}}/{{$allcategory->id}}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <div class="col-lg-4">
                    <div class="text-center card" >
                        <div class="card-header">
                            <h3>Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/category/insert')}}" method="POST">
                                @csrf
                                @if(session('success'))
                                        <div style="color: green ; font-size: 20px" class="alert-success">{{session('success')}}</div>
                                @endif
                                <div class="form-group mt-2">
                                    <label for="exampleInput">category Name</label>
                                    <input type="text" class="mt-2 form-control" name="category_name" placeholder="Add Category">
                                    @error('category_name')
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
