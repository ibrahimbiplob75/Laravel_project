@extends('layouts.dashboard')
@section('title')
    products
@endsection
@section('products')
    active
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
        <div class="col-lg-9 ">
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
                        <th scope="col">product price</th>
                        <th scope="col">discount</th>
                        <th scope="col">discount price</th>
                        <th scope="col">product description</th>
                        <th scope="col">product image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->percent_of_discount}}</td>
                            <td >{{$product->discount_price}}</td>
                            <td>{{substr($product->product_description,0,100).'   '.' see more...' }}</td>
                            <td>
                                <img src="{{asset('uploads/preview')}}/{{$product->product_image}}" class="wd-60 rounded-circle" alt="">

                            </td>
                            <td>
                                    <a href="{{route('inventory',$product->id)}}" style="width: 100px;" class="btn btn-info">Inventory</a>
                                    <a href="" style="width: 100px;" class="mt-2 btn btn-danger">Delete</a>
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

                    <h3 class="text-center">Add Products</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/products/insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(session('Success'))
                            <div style="color: green ; font-size: 20px" class="alert-success">{{session('Success')}}</div>
                        @endif
                        <div class="form-group ">
                            <label for="Input">Category Name</label>
                            <select name="category_id"  class="mt-2 form-control Category_id">

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
                        <div class="form-group">
                            <label for="Input">sub Category Name</label>
                            <select name="subcategory_id"  class="mt-2 form-control" id="subcategory_name">

                                <option class="mt-1 form-control" value="">Select sub Category</option>

                            </select>
                            @error('category_id')
                            <div style="color: red ; font-size: 20px" class="text-start mt-2 text-danger">{{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="form-level">Product Name</label>
                            <input class="form-control" type="text" id="product-name" name="product_name">

                        </div>
                        @error('product_name')
                        <strong class="text-danger"> {{$message}}</strong>
                        @enderror

                        <div class="form-group">
                            <label for="product-price">Product Price:</label>
                            <input type="number" class="form-control" id="product-price" name="product_price" step="1">

                        </div>
                        @error('product_price')
                        <strong class="text-danger"> {{$message}}</strong>
                        @enderror


                        <div class="form-group">
                            <label for="discount-percent">Percent(%) of Discount</label>
                            <input type="number" class="form-control" id="discount-percent" name="percent_of_discount" min="0" max="100">

                        </div>
                        @error('percent_of_discount')
                        <strong class="text-danger"> {{$message}}</strong>
                        @enderror



                        <div class="form-group">
                            <label for="product-description">Product Description:</label>
                            <textarea class="form-control" id="summernote" name="product_description"></textarea>

                        </div>
                        @error('product_description')
                        <strong class="text-danger"> {{$message}}</strong>
                        @enderror


                        <div class="form-group">
                            <label class="form-label">Product Picture</label>
                            <input type="file" name="product_image" class="form-control image-preview"  accept="image/*" onchange="previewImage(event)">
                            <div id="imagePreview"></div>
                        </div>
                        @error('product_image')
                        <strong class="text-danger"> {{$message}}</strong>
                        @enderror

                        <div class="form-group">
                            <label class="form-label">Product thumbnail</label>
                            <input multiple type="file"  name="thumbnail_image[]" class="form-control"  accept="image/*">
                        </div>
                        @error('thumbnail_image')
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




@section('Footer_content')
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
    $('.Category_id').change(function(){
        var Category_id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/getSubcategory',
            data:{category_id:Category_id},
            success:function(data){
                $("#subcategory_name").html(data);
            }
        })
    });
    $(document).ready(function() {
        $('.Category_id').select2();
    });
</script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 250
    });
</script>
@endsection
