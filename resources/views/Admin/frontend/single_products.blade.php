@extends('Admin.frontend.master')

@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Products</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Product Details Area Start -->

<div class="product-details-area pt-100px pb-100px">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <!-- Swiper -->
                <div class="swiper-container zoom-top">

                    <div class="swiper-wrapper">
                        @foreach(App\Models\productThumbnail::where('product_id',$single_products->id)->get() as $product_image)
                        <div class="swiper-slide zoom-image-hover">
                            <img class="img-responsive m-auto" src="{{asset('uploads/thumbnail')}}/{{$product_image->thumbnail_image}}"
                                 alt="">
                        </div>
                        @endforeach
                    </div>

                </div>

                <div class="swiper-container zoom-thumbs mt-3 mb-3">
                    <div class="swiper-wrapper">
                        @foreach(App\Models\productThumbnail::where('product_id',$single_products->id)->get() as $product_image)
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="{{asset('uploads/thumbnail')}}/{{$product_image->thumbnail_image}}"
                                 alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
{{--                @if(session('cart_added'))--}}
{{--                    <div style="color: green ; font-size: 20px" class="alert-success">{{session('cart_added')}}</div>--}}
{{--                @endif--}}
                <form action="{{url('/cart/insert')}}" method="POST" >
                    @csrf
                    <div class="product-details-content quickview-content">
                    <h2>{{$single_products->product_name}}</h2>
                    <div class="pricing-meta">
                        <ul>
                            <li class="old-price not-cut">{{$single_products->discount_price}}</li>
                        </ul>
                    </div>
                    <div class="pro-details-rating-wrap">
                        <div class="rating-product">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span class="read-review"><a class="reviews" href="#">( 5 Customer Review )</a></span>
                    </div>
                    @if (App\Models\inventory::where('product_id',$single_products->id)->where('product_color',1)->exists())
                        <input type="hidden" value="1" name="color_id">
                    @else
                    <div class="pro-details-color-info d-flex align-items-center">
                        <span>Color</span>
                        <div class="pro-details-color">
                            <ul>
                                @foreach( $availiable_colors as $availiable_color)
                                <li><a class="color_code" name="{{$availiable_color->product_color}}" style="background: {{App\Models\color::find($availiable_color->product_color)->color_code}}" ></a>

                                </li>
                                @endforeach
                                    <input type="hidden" name="color_id" id="color_id" value="">
                            </ul>
                        </div>
                    </div>
                    @endif
                    <!-- Sidebar single item -->
                    @if (App\Models\inventory::where('product_id',$single_products->id)->where('product_size',1)->exists())
                            <input type="hidden" value="1" name="size_id">
                    @else
                    <div class="pro-details-size-info d-flex align-items-center">
                        <span>Size</span>
                        <div class="pro-details-size">
                            <ul id="size_info">
                                <li><a class="gray"         >XS</a></li>
                                <li><a class="gray" href="#">S</a></li>
                                <li><a class="gray" href="#">M</a></li>
                                <li><a class="gray" href="#">L</a></li>
                                <li><a class="gray" href="#">XL</a></li>
                                <li><a class="gray" href="#">XXL</a></li>
                            </ul>
                            <input type="hidden" name="size_id" id="Size_id" value="">
                        </div>
                    </div>
                @endif
                    <p class="m-0">{!!$single_products->product_description!!} </p>
                    <div class="pro-details-quality">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="quantity" value="1" />
                        </div>
                        <div class="pro-details-cart">
                            @Auth('customerlogin')
                                <button type="submit" class="add-cart">Add To Cart
                                </button>
                            @else
                                <a  href="{{url('/register')}}" class="add-cart">Add
                                    To Cart</a>
                            @endauth
                        </div>
                        <div class="pro-details-compare-wishlist pro-details-wishlist ">
                            <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                        </div>
                        <div class="pro-details-compare-wishlist pro-details-compare">
                            <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                        </div>
                        <input type="hidden" name="product_id"  value="{{$single_products->id}}"/>
                    </div>
                    <div class="pro-details-sku-info pro-details-same-style  d-flex">
                        <span>SKU: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="#">Ch-256xl</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-categories-info pro-details-same-style d-flex">
                        <span>Categories: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="#">{{App\Models\category::find($single_products->category_id)->category_name}}</a>
                            </li>
                            <li>
                                <a href="#">-{{App\Models\subCatergory::find($single_products->subcategory_id)->subCategory_name}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-social-info pro-details-same-style d-flex">
                        <span>Share: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                </form>
            </div>

        </div>

    </div>
</div>

<!-- breadcrumb-area end -->

<!-- product details description area start -->
<div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-bs-toggle="tab" href="#des-details2">Information</a>
                <a class="active" data-bs-toggle="tab" href="#des-details1">Description</a>
                <a data-bs-toggle="tab" href="#des-details3">Reviews (02)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper text-start">
                        <ul>
                            <li><span>Weight</span> 400 g</li>
                            <li><span>Dimensions</span>10 x 10 x 15 cm</li>
                            <li><span>Materials</span> 60% cotton, 40% polyester</li>
                            <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                        </ul>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p>
                            {!!$single_products->product_description!!}

                        </p>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="assets/images/review-image/1.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper
                                                euismod vehicula. Phasellus quam nisi, congue id nulla.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    <div class="review-img">
                                        <img src="assets/images/review-image/2.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                                                euismod vehicula.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="rating-product">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style">
                                                    <input placeholder="Name" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style">
                                                    <input placeholder="Email" type="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <button class="btn btn-primary btn-hover-color-primary "
                                                            type="submit" value="Submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details description area end -->

<!-- Related product Area Start -->
<div class="related-product-area pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-30px0px line-height-1">
                    <h2 class="title m-0">Related Products</h2>
                </div>
            </div>
        </div>
        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
            <div class="new-product-wrapper swiper-wrapper">
                @foreach($related_products as $related_product)
                <div class="new-product-item swiper-slide">
                    <!-- Single Prodect -->
                    <div class="product">
                        <div class="thumb">
                            <a href="{{url('/single/product')}}/{{$related_product->id}}" class="image">
                                <img src="{{asset('/uploads/preview')}}/{{$related_product->product_image}}" alt="Product" />
                            </a>
                            <span class="badges">
                                    <span class="new">New</span>
                                </span>
                            <div class="actions">
                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                        class="pe-7s-like"></i></a>
                                <a href="#" class="action quickview" data-link-action="quickview"
                                   title="Quick view" data-bs-toggle="modal"
                                   data-bs-target="#all_product{{$related_product->id}}"><i class="pe-7s-search"></i></a>
                                <a href="compare.html" class="action compare" title="Compare"><i
                                        class="pe-7s-refresh-2"></i></a>
                            </div>
                            @Auth('customerlogin')
                            <a href="{{url('/home')}}" class="add-cart">Add
                                To Cart</a>
                            @else
                            <a  href="{{url('/register')}}" class="add-cart">Add
                                To Cart</a>
                            @endauth
                        </div>
                        <div class="content">
                                <span class="ratings">
                                    <span class="rating-wrap">
                                        <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">( 5 Review )</span>
                                </span>
                            <h5 class="title"><a href="{{url('/single/product')}}/{{$related_product->id}}">{{$related_product->product_name}}
                                </a>
                            </h5>
                            <span class="price">
                                    <span class="new">{{$related_product->discount_price}}</span>
                                </span>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<!-- Related product Area End -->
@endsection
@section('footer_script')
   <script>
       $('.color_code').click(function(){
           var color_code=$(this).attr('name');
           var product_id="{{$single_products->id}}";
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });

           $.ajax({
               type:'POST',
               url:'/getsize',
               data:{color_code:color_code ,product_id:product_id},
               success:function(data){

                   $('#size_info').html(data);

                   $('.size_id').click(function(){
                       var size_id=$(this).attr('name');
                       $('#Size_id').attr('value',size_id);

                   })
               }
          });

       });
   </script>
    <script>
        $('.color_code').click(function(){
            var color_id=$(this).attr('name');
            $('#color_id').attr('value',color_id);
        });
    </script>
   @if(session('cart_added'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{session('cart_added')}}',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
   @endif
@endsection
