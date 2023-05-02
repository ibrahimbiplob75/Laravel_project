@extends('layouts.dashboard')
@section('title')
    Edit profile
@endsection

    <style>
    .image-preview {
        width: 200px;
        height: 45px;
        background-color: #f4f4f4;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card" >
                <div class="card-header">

                    <h3 class="text-center">Edit profile</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/profile/update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(session('success'))
                            <div style="color: green ; font-size: 20px" class="alert-success">{{session('success')}}</div>
                        @endif

                        <div class="form-group mt-2">
                            <label for="exampleInput">Name</label>
                            <input type="hidden" class="mt-2 form-control" name="id" value="{{$admin->id}}">
                            <input type="text" class="mt-2 form-control" name="name" value="{{$admin->name}}">
                            @error('category_name')
                            <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleInput">Email</label>
                            <input type="email" class="mt-2 form-control" name="email" value="{{$admin->email}}">
                            @error('category_name')
                            <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="form-label">Profile Picture</label>
                            <input type="file" name="photo" class="form-control image-preview"  accept="image/*" onchange="previewImage(event)">
                            <div id="imagePreview"></div>
                        </div>
                        @error('photo')
                        <strong class="text-danger"> {{$message}}</strong>
                        @enderror



                        <div class="form-group mt-2">
                            <label for="exampleInput">Password</label>
                            <input type="password" class="mt-2 form-control" name="password" value="">
                            @error('password')
                            <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        @if(session('error'))
                            <div style="color: darkred ; font-size: 20px" class="alert-danger">{{session('error')}}</div>
                        @endif

                        <div class="text-center form-group mt-3">
                            <button type="submit"  class="btn btn-primary">Update profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const img = document.createElement("img");
            img.src = reader.result;
            const imagePreview = document.getElementById("imagePreview");
            imagePreview.innerHTML = "";
            imagePreview.appendChild(img);
            imagePreview.style.display = "block";
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
