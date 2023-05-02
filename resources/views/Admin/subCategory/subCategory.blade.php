@extends('layouts.dashboard')
@section('subcategory')
    active
@endsection
@section('title')
   Sub Category
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card" >
                    <div class="text-center card-header">
                        <h3>Sub Category List</h3>
                        @if(session('Delete'))
                            <div style="color: red ; font-size: 20px" class="alert-danger">{{session('Delete')}}</div>
                        @endif
                        <table class="mt-4 table table-striped table-dark">

                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Sub Category Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subCategory as $allsubCategory)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{\App\Models\category::find($allsubCategory->category_id)->category_name}}</td>
                                    <td>{{$allsubCategory->subCategory_name}}</td>
                                    <td>{{$allsubCategory->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{url('/subCategory/edit')}}/{{$allsubCategory->id}}" class="btn btn-success">Edit</a>
                                        <a href="{{url('/subCategory/delete')}}/{{$allsubCategory->id}}" class="btn btn-danger">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-5 card" >
                        <div class="text-center card-header">
                            <h3>Sub Category Trashed List</h3>
                            @if(session('soft_Delete'))
                                <div style="color: green ; font-size: 20px" class="alert-primary">{{session('soft_Delete')}}</div>
                            @endif
                            @if(session('Hard_Delete'))
                                <div style="color: green ; font-size: 20px" class="alert-primary">{{session('Hard_Delete')}}</div>
                            @endif
                            <table class="mt-4 table table-striped table-dark">

                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Sub Category Name</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($soft_delete as $allsubCategory)
                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{\App\Models\category::find($allsubCategory->category_id)->category_name}}</td>
                                        <td>{{$allsubCategory->subCategory_name}}</td>
                                        <td>{{$allsubCategory->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{url('/subCategory/restore')}}/{{$allsubCategory->id}}" class="btn btn-info">Restore</a>
                                            <a href="{{url('/subCategory/hard/delete')}}/{{$allsubCategory->id}}" class="btn btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Subcategory </h3>
                    </div>
                    @if(session('Exists'))
                        <div style="color: green ; font-size: 20px" class="text-center alert-danger">{{session('Exists')}}</div>
                    @endif
                    @if(session('success'))
                        <div style="color: green ; font-size: 20px" class="text-center alert-danger">{{session('success')}}</div>
                    @endif
                        <div class="card-body">
                            <form action="{{url('/subCategory/insert')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="Input">Category Name</label>
                                    <select name="category_id"  class="mt-2 form-control">

                                        <option class="mt-1 form-control" value="">--Select Category--</option>
                                        @foreach($category as $categories)
                                        <option type="text" value="{{$categories->id}}">{{$categories->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}
                                    </div>
                                    @enderror
                                </div>



                                <div class="mt-3 form-group">
                                    <label for="Input">Sub Category Name</label>
                                    <input class="mt-2 form-control" type="text" name="subCategory_name" placeholder="Add subcategory name">
                                </div>
                                @error('subCategory_name')
                                <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}
                                </div>
                                @enderror
                                <div class="text-center mt-3 form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>

                </div>
            </div>
        </div>

    </div>

@endsection
