@extends('Admin.frontend.master')
@section('content')
<!-- Hero/Intro Slider Start -->
<div class="section ">
    <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
        <!-- Hero slider Active -->
        <div class="swiper-wrapper">
            <!-- Single slider item -->
            <div class="hero-slide-item-2 slider-height swiper-slide d-flex bg-color1">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                            <div class="hero-slide-content hero-slide-content-2 slider-animated-1">
                                <span class="category">Sale 45% Off</span>
                                <h2 class="title-1">Exclusive New<br> Offer 2023</h2>
                                <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark"> Shop
                                    Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div
                            class="col-xl-6 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                            <div class="show-case">
                                <div class="hero-slide-image">
                                    <img src="{{asset('frontend_assets/images/slider-image/slider-2-1.png')}}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single slider item -->
            <div class="hero-slide-item-2 slider-height swiper-slide d-flex bg-color2">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                            <div class="hero-slide-content hero-slide-content-2 slider-animated-1">
                                <span class="category">Sale 45% Off</span>
                                <h2 class="title-1">Exclusive New<br> Offer 2023</h2>
                                <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark"> Shop
                                    Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div
                            class="col-xl-6 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                            <div class="show-case">
                                <div class="hero-slide-image">
                                    <img src="{{asset('frontend_assets/images/slider-image/slider-2-2.png')}}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<!-- Hero/Intro Slider End -->

<!-- Feature Area Srart -->
<div class="feature-area  mt-n-65px">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <!-- single item -->
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="{{asset('frontend_assets/images/icons/1.png')}}" alt="">
                    </div>
                    <div class="feature-content">
                        <h4 class="title">Free Shipping</h4>
                        <span class="sub-title">Capped at $39 per order</span>
                    </div>
                </div>
            </div>
            <!-- single item -->
            <div class="col-lg-4 col-md-6 mb-md-30px mb-lm-30px mt-lm-30px">
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="{{asset('frontend_assets/images/icons/2.png')}}" alt="">
                    </div>
                    <div class="feature-content">
                        <h4 class="title">Card Payments</h4>
                        <span class="sub-title">12 Months Installments</span>
                    </div>
                </div>
            </div>
            <!-- single item -->
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="{{asset('frontend_assets/images/icons/3.png')}}" alt="">
                    </div>
                    <div class="feature-content">
                        <h4 class="title">Easy Returns</h4>
                        <span class="sub-title">Shop With Confidence</span>
                    </div>
                </div>
                <!-- single item -->
            </div>
        </div>
    </div>
</div>
<!-- Feature Area End -->

<!-- Product Area Start -->
<div class="product-area pt-100px pb-100px">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-12">
                <div class="section-title text-center mb-0">
                    <h2 class="title">#products</h2>
                    <!-- Tab Start -->
                    <div class="nav-center">
                        <ul class="product-tab-nav nav align-items-center justify-content-center">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                                    href="#tab-product--all">All</a></li>
                            @foreach($all_categories as $category)
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    href="#category{{$category->id}}">{{$category->category_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Tab End -->
                </div>
            </div>
            <!-- Section Title End -->
        </div>
        <!-- Section Title & Tab End -->

        <div class="row">
            <div class="col">
                <div class="tab-content mb-30px0px">
                    <!-- 1st tab start -->
                    <div class="tab-pane fade show active" id="tab-product--all">
                        <div class="row">
                            @foreach($all_products as $product)
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                 data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="{{url('/single/product')}}/{{$product->id}}" class="image">
                                            <img src="{{asset('uploads/preview')}}/{{$product->product_image}}" alt="Product" />
                                        </a>
                                        <span class="badges">
                                                <span class="new">New</span>
                                                <span class="sale">-{{$product->percent_of_discount}}%</span>
                                            </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                    class="pe-7s-like"></i></a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                               title="Quick view" data-bs-toggle="modal"
                                               data-bs-target="#all_product{{$product->id}}"><i class="pe-7s-search"></i></a>
                                            <a href="compare.html" class="action compare" title="Compare"><i
                                                    class="pe-7s-refresh-2"></i></a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">( 5 Review )</span>
                                            </span>
                                        <h5 class="title"><a href="{{url('/single/product')}}/{{$product->id}}">{{$product->product_name}}
                                            </a>
                                        </h5>
                                        <span class="price">
                                                <span class="new">BDT- {{$product->discount_price}}</span>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- 1st tab end -->
                    @foreach($all_categories as $category)
                    <!-- 3rd tab start -->
                    <div class="tab-pane fade" id="category{{$category->id}}">
                        <div class="row">
                            @foreach(App\Models\product::where('category_id',$category->id)->get() as $product)
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                 data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="{{url('/single/product')}}/{{$product->id}}" class="image">
                                            <img src="{{'uploads/preview'}}/{{$product->product_image}}" alt="Product" />
                                        </a>
                                        <span class="badges">
                                                <span class="new">New</span>
                                                <span  class="sale">-{{$product->percent_of_discount}}%</span>
                                            </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                    class="pe-7s-like"></i></a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                               title="Quick view" data-bs-toggle="modal"
                                               data-bs-target="#all_product{{$product->id}}"><i class="pe-7s-search"></i></a>
                                            <a href="compare.html" class="action compare" title="Compare"><i
                                                    class="pe-7s-refresh-2"></i></a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">( 5 Review )</span>
                                            </span>
                                        <h5 class="title"><a href="{{url('/single/product')}}/{{$product->id}}">{{$product->product_name}}
                                            </a>
                                        </h5>
                                        <span class="price">
                                                <span class="new">{{$product->discount_price}}</span>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- 3rd tab end -->
                    @endforeach
                </div>
                <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Load More <i
                        class="fa fa-arrow-right ml-15px" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End -->
<!--product Modal start-->
@foreach($all_products as $product)
    <div class="modal modal-2 fade" id="all_product{{$product->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                            <!-- Swiper -->

                            <div class="swiper-container zoom-top">
                                <div class="swiper-wrapper">
                                    @foreach(App\Models\productThumbnail::where('product_id',$product->id)->get() as $product_image)
                                        <div class="swiper-slide">
                                            <img class="img-responsive m-auto"
                                                 src="{{asset('uploads/thumbnail')}}/{{$product_image->thumbnail_image}}" alt="">
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                            <div class="swiper-container zoom-thumbs mt-3 mb-3">
                                <div class="swiper-wrapper">
                                    @foreach(App\Models\productThumbnail::where('product_id',$product->id)->get() as $product_image)
                                        <div class="swiper-slide">
                                            <img class="img-responsive m-auto"
                                                 src="{{asset('uploads/thumbnail')}}/{{$product_image->thumbnail_image}}" alt="">
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-details-content quickview-content">
                                <h2>{{$product->product_name}}</h2>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">BDT-{{$product->discount_price}} TK</li>
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
                                    <span class="read-review"><a class="reviews" href="#">( 5 Customer Review
                                            )</a></span>
                                </div>
                                <p class="mt-30px mb-0">{{$product->product_description}}</p>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart">
                                        <button class="add-cart" href="#"> Add To
                                            Cart</button>
                                    </div>
                                    <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                        <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                                    </div>
                                    <div class="pro-details-compare-wishlist pro-details-compare">
                                        <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                                    </div>
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
                                            <a href="#">{{App\Models\category::find($product->category_id)->category_name}}</a>
                                        </li>
                                        <li>
                                            <a href="#">-{{App\Models\subCatergory::find($product->subcategory_id)->subCategory_name}}</a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!--product Modal end-->
<!-- Banner Area Start -->

<div class="banner-area pt-100px pb-100px plr-15px">

    <div class="row m-0">
        @foreach($best_categories as $category)
        <div class="col-12 col-lg-4 mb-md-30px mb-lm-30px">

            <div class="single-banner-2">
                <img src="{{'uploads/category'}}/{{$category->category_image}}" alt="">
                <div class="item-disc">
                    <h4 class="title">Best Collection <br>
                        {{$category->category_name}}</h4>
                    <a href="shop-left-sidebar.html" class="shop-link btn btn-primary ">Shop Now <i
                            class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                </div>
            </div>

        </div>
        @endforeach
    </div>

</div>

<!-- Banner Area End -->

<!-- Product Area Start -->
<div class="product-area pt-100px pb-100px">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-lg col-md col-12">
                <div class="section-title mb-0">
                    <h2 class="title">#newarrivals</h2>
                </div>
            </div>
            <!-- Section Title End -->

            <!-- Tab Start -->
            <div class="col-lg-auto col-md-auto col-12">
                <ul class="product-tab-nav nav">

                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#all_product">All</a></li>

                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-product-new">New</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#tab-product-bestsellers">Bestsellers</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#tab-product-itemssale">Items
                            Sale</a></li>
                </ul>
            </div>
            <!-- Tab End -->
        </div>
        <!-- Section Title & Tab End -->

        <div class="row">
            <div class="col">
                <div class="tab-content top-borber">

                    <!-- 1st tab start -->
                    <div class="tab-pane fade show active" id="all_product">
                        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                            <div class="new-product-wrapper swiper-wrapper">
                                @foreach($all_products as $product)
                                <div class="new-product-item swiper-slide">
                                    <!-- Single Prodect -->

                                    <div class="product">
                                        <div class="thumb">
                                            <a href="{{url('/single/product')}}/{{$product->id}}" class="image">
                                                <img src="{{'uploads/preview'}}/{{$product->product_image}}" alt="Product" />
                                            </a>
                                            <span class="badges">
                                                    <span class="new">New</span>
                                                    <span class="sale">-{{$product->percent_of_discount}}%</span>
                                                </span>
                                            <div class="actions">
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="pe-7s-like"></i></a>
                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                   title="Quick view" data-bs-toggle="modal"
                                                   data-bs-target="#all_product{{$product->id}}"><i class="pe-7s-search"></i></a>
                                                <a href="compare.html" class="action compare" title="Compare"><i
                                                        class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <button title="Add To Cart" class=" add-to-cart">Add
                                                To Cart</button>
                                        </div>
                                        <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 100%"></span>
                                                    </span>
                                                    <span class="rating-num">( 5 Review )</span>
                                                </span>
                                            <h5 class="title"><a href="{{url('/single/product')}}/{$product->id}}">{{$product->product_name}}
                                                </a>
                                            </h5>
                                            <span class="price">
                                                    <span class="new">BDT-{{$product->discount_price}}TK</span>
                                                    <span class="old">BDT-{{$product->product_price}}TK</span>
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
                    <!-- 1st tab end -->

                    <!-- 2nd tab start -->
                    <div class="tab-pane fade" id="all_product{{$product->id}}">
                        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                            <div class="new-product-wrapper swiper-wrapper">
                                @foreach($latest_products as $latest_product)
                                <div class="new-product-item swiper-slide">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="{{url('/single/product')}}/{{$latest_product->id}}" class="image">
                                                <img src="{{'uploads/preview'}}/{{$latest_product->product_image}}" alt="Product" />
                                            </a>
                                            <span class="badges">
                                                    <span class="new">New</span>
                                                    <span class="sale">-{{$latest_product->percent_of_discount}}%</span>
                                                </span>
                                            <div class="actions">
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="pe-7s-like"></i></a>
                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                   title="Quick view" data-bs-toggle="modal"
                                                   data-bs-target="#all_product{{$product->id}}"><i class="pe-7s-search"></i></a>
                                                <a href="compare.html" class="action compare" title="Compare"><i
                                                        class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <button title="Add To Cart" class=" add-to-cart">Add
                                                To Cart</button>
                                        </div>
                                        <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 100%"></span>
                                                    </span>
                                                    <span class="rating-num">( 5 Review )</span>
                                                </span>
                                            <h5 class="title"><a href="{{url('/single/product')}}/{{$latest_product->id}}">{{$latest_product->product_name}}
                                                </a>
                                            </h5>
                                            <span class="price">
                                                    <span class="new">BDT-{{$latest_product->discount_price}}TK</span>
                                                    <span class="old">BDT-{{$latest_product->product_price}}TK</span>
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
                    <!-- 2nd tab end -->

                    <!-- 3rd tab start -->
                    <div class="tab-pane fade" id="tab-product-bestsellers">
                        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                            <div class="new-product-wrapper swiper-wrapper">
                                <div class="new-product-item swiper-slide">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="{{url('/single/product')}}" class="image">
                                                <img src="assets/images/product-image/8.jpg" alt="Product" />
                                            </a>
                                            <span class="badges">
                                                    <span class="new">New</span>
                                                </span>
                                            <div class="actions">
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="pe-7s-like"></i></a>
                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                   title="Quick view" data-bs-toggle="modal"
                                                   data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                <a href="compare.html" class="action compare" title="Compare"><i
                                                        class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <button title="Add To Cart" class=" add-to-cart">Add
                                                To Cart</button>
                                        </div>
                                        <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 100%"></span>
                                                    </span>
                                                    <span class="rating-num">( 5 Review )</span>
                                                </span>
                                            <h5 class="title"><a href="{{url('/single/product')}}">Women's Elizabeth
                                                    Coat
                                                </a>
                                            </h5>
                                            <span class="price">
                                                    <span class="new">$38.50</span>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="new-product-item swiper-slide">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/9.jpg" alt="Product" />
                                            </a>
                                            <span class="badges">
                                                    <span class="sale">-10%</span>
                                                    <span class="new">New</span>
                                                </span>
                                            <div class="actions">
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="pe-7s-like"></i></a>
                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                   title="Quick view" data-bs-toggle="modal"
                                                   data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                <a href="compare.html" class="action compare" title="Compare"><i
                                                        class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <button title="Add To Cart" class=" add-to-cart">Add
                                                To Cart</button>
                                        </div>
                                        <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 80%"></span>
                                                    </span>
                                                    <span class="rating-num">( 4 Review )</span>
                                                </span>
                                            <h5 class="title"><a href="single-product.html">Ardene Microfiber
                                                    Tights</a>
                                            </h5>
                                            <span class="price">
                                                    <span class="new">$38.50</span>
                                                    <span class="old">$48.50</span>
                                                </span>
                                        </div>
                                    </div>
                                    <!-- Single Prodect -->
                                </div>
                                <div class="new-product-item swiper-slide">
                                    <!-- Single Prodect -->
                                    <div class="product">
<div class="thumb">
    <a href="single-product.html" class="image">
        <img src="assets/images/product-image/10.jpg" alt="Product" />
    </a>
    <span class="badges">
                                                    <span class="sale">-7%</span>
                                                </span>
    <div class="actions">
        <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                class="pe-7s-like"></i></a>
        <a href="#" class="action quickview" data-link-action="quickview"
           title="Quick view" data-bs-toggle="modal"
           data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
        <a href="compare.html" class="action compare" title="Compare"><i
                class="pe-7s-refresh-2"></i></a>
    </div>
    <button title="Add To Cart" class=" add-to-cart">Add
        To Cart</button>
</div>
<div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 90%"></span>
                                                    </span>
                                                    <span class="rating-num">( 4.5 Review )</span>
                                                </span>
    <h5 class="title"><a href="single-product.html">Women's Long
            Sleeve
            Shirts</a></h5>
    <span class="price">
                                                    <span class="new">$30.50</span>
                                                    <span class="old">$38.00</span>
                                                </span>
</div>
</div>
</div>
<div class="new-product-item swiper-slide">
    <!-- Single Prodect -->
    <div class="product">
        <div class="thumb">
            <a href="single-product.html" class="image">
                <img src="assets/images/product-image/11.jpg" alt="Product" />
            </a>
            <span class="badges">
                                                    <span class="new">Sale</span>
                                                </span>
            <div class="actions">
                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                        class="pe-7s-like"></i></a>
                <a href="#" class="action quickview" data-link-action="quickview"
                   title="Quick view" data-bs-toggle="modal"
                   data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                <a href="compare.html" class="action compare" title="Compare"><i
                        class="pe-7s-refresh-2"></i></a>
            </div>
            <button title="Add To Cart" class=" add-to-cart">Add
                To Cart</button>
        </div>
        <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 70%"></span>
                                                    </span>
                                                    <span class="rating-num">( 3.5 Review )</span>
                                                </span>
            <h5 class="title"><a href="single-product.html">Parrera
                    Sunglasses -
                    Lomashop</a></h5>
            <span class="price">
                                                    <span class="new">$38.50</span>
                                                </span>
        </div>
    </div>
    <!-- Single Prodect -->
</div>
<div class="new-product-item swiper-slide">
    <!-- Single Prodect -->
    <div class="product">
        <div class="thumb">
            <a href="single-product.html" class="image">
                <img src="assets/images/product-image/3.jpg" alt="Product" />
            </a>
            <span class="badges">
                                                    <span class="sale">-10%</span>
                                                    <span class="new">New</span>
                                                </span>
            <div class="actions">
                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                        class="pe-7s-like"></i></a>
                <a href="#" class="action quickview" data-link-action="quickview"
                   title="Quick view" data-bs-toggle="modal"
                   data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                <a href="compare.html" class="action compare" title="Compare"><i
                        class="pe-7s-refresh-2"></i></a>
            </div>
            <button title="Add To Cart" class=" add-to-cart">Add
                To Cart</button>
        </div>
        <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 80%"></span>
                                                    </span>
                                                    <span class="rating-num">( 4 Review )</span>
                                                </span>
            <h5 class="title"><a href="single-product.html">Ardene Microfiber

                    Tights</a>
</h5>
<span class="price">
                                                    <span class="new">$38.50</span>
                                                    <span class="old">$48.50</span>
                                                </span>
</div>
</div>
<!-- Single Prodect -->
</div>
<div class="new-product-item swiper-slide">
    <!-- Single Prodect -->
    <div class="product">
        <div class="thumb">
            <a href="single-product.html" class="image">
                <img src="assets/images/product-image/1.jpg" alt="Product" />
            </a>
            <span class="badges">
                                                    <span class="new">New</span>
                                                </span>
            <div class="actions">
                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                        class="pe-7s-like"></i></a>
                <a href="#" class="action quickview" data-link-action="quickview"
                   title="Quick view" data-bs-toggle="modal"
                   data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                <a href="compare.html" class="action compare" title="Compare"><i
                        class="pe-7s-refresh-2"></i></a>
            </div>
            <button title="Add To Cart" class=" add-to-cart">Add
                To Cart</button>
        </div>
        <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 100%"></span>
                                                    </span>
                                                    <span class="rating-num">( 5 Review )</span>
                                                </span>
            <h5 class="title"><a href="single-product.html">Women's Elizabeth
                    Coat
                </a>
            </h5>
            <span class="price">
                                                    <span class="new">$38.50</span>
                                                </span>
        </div>
    </div>
    <!-- Single Prodect -->
</div>
</div>
<!-- Add Arrows -->
<div class="swiper-buttons">
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
</div>
</div>
<!-- 3rd tab end -->
<!-- 4th tab start -->
<div class="tab-pane fade" id="tab-product-itemssale">
    <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
        <div class="new-product-wrapper swiper-wrapper">
            <div class="new-product-item swiper-slide">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="single-product.html" class="image">
                            <img src="assets/images/product-image/8.jpg" alt="Product" />
                        </a>
                        <span class="badges">
                                                    <span class="new">New</span>
                                                </span>
                        <div class="actions">
                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                    class="pe-7s-like"></i></a>
                            <a href="#" class="action quickview" data-link-action="quickview"
                               title="Quick view" data-bs-toggle="modal"
                               data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                            <a href="compare.html" class="action compare" title="Compare"><i
                                    class="pe-7s-refresh-2"></i></a>
                        </div>
                        <button title="Add To Cart" class=" add-to-cart">Add
                            To Cart</button>
                    </div>
                    <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 100%"></span>
                                                    </span>
                                                    <span class="rating-num">( 5 Review )</span>
                                                </span>
                        <h5 class="title"><a href="single-product.html">Women's Elizabeth
                                Coat
                            </a>
                        </h5>
                        <span class="price">
                                                    <span class="new">$38.50</span>
                                                </span>
                    </div>
                </div>
            </div>
            <div class="new-product-item swiper-slide">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="single-product.html" class="image">
                            <img src="assets/images/product-image/9.jpg" alt="Product" />
                        </a>
                        <span class="badges">
                                                    <span class="sale">-10%</span>
                                                    <span class="new">New</span>
                                                </span>
                        <div class="actions">
                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                    class="pe-7s-like"></i></a>
                            <a href="#" class="action quickview" data-link-action="quickview"
                               title="Quick view" data-bs-toggle="modal"
                               data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                            <a href="compare.html" class="action compare" title="Compare"><i
                                    class="pe-7s-refresh-2"></i></a>
                        </div>
                        <button title="Add To Cart" class=" add-to-cart">Add
                            To Cart</button>
                    </div>
                    <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 80%"></span>
                                                    </span>
                                                    <span class="rating-num">( 4 Review )</span>
                                                </span>
                        <h5 class="title"><a href="single-product.html">Ardene Microfiber
                                Tights</a>
                        </h5>
                        <span class="price">
                                                    <span class="new">$38.50</span>
                                                    <span class="old">$48.50</span>
                                                </span>
                    </div>
                </div>
                <!-- Single Prodect -->
            </div>
            <div class="new-product-item swiper-slide">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="single-product.html" class="image">
                            <img src="assets/images/product-image/10.jpg" alt="Product" />
                        </a>
                        <span class="badges">
                                                    <span class="sale">-7%</span>
                                                </span>
                        <div class="actions">
                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                    class="pe-7s-like"></i></a>
                            <a href="#" class="action quickview" data-link-action="quickview"
                               title="Quick view" data-bs-toggle="modal"
                               data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                            <a href="compare.html" class="action compare" title="Compare"><i
                                    class="pe-7s-refresh-2"></i></a>
                        </div>
                        <button title="Add To Cart" class=" add-to-cart">Add
                            To Cart</button>
                    </div>
                    <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 90%"></span>
                                                    </span>
                                                    <span class="rating-num">( 4.5 Review )</span>
                                                </span>
                        <h5 class="title"><a href="single-product.html">Women's Long
                                Sleeve
                                Shirts</a></h5>
                        <span class="price">
                                                    <span class="new">$30.50</span>
                                                    <span class="old">$38.00</span>
                                                </span>
                    </div>
                </div>
            </div>
            <div class="new-product-item swiper-slide">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="single-product.html" class="image">
                            <img src="assets/images/product-image/11.jpg" alt="Product" />
                        </a>
                        <span class="badges">
                                                    <span class="new">Sale</span>
                                                </span>
                        <div class="actions">
                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                    class="pe-7s-like"></i></a>
                            <a href="#" class="action quickview" data-link-action="quickview"
                               title="Quick view" data-bs-toggle="modal"
                               data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                            <a href="compare.html" class="action compare" title="Compare"><i
                                    class="pe-7s-refresh-2"></i></a>
                        </div>
                        <button title="Add To Cart" class=" add-to-cart">Add
                            To Cart</button>
                    </div>
                    <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 70%"></span>
                                                    </span>
                                                    <span class="rating-num">( 3.5 Review )</span>
                                                </span>
                        <h5 class="title"><a href="single-product.html">Parrera
                                Sunglasses -
                                Lomashop</a></h5>
                        <span class="price">
                                                    <span class="new">$38.50</span>
                                                </span>
                    </div>
                </div>
                <!-- Single Prodect -->
            </div>
            <div class="new-product-item swiper-slide">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="single-product.html" class="image">
                            <img src="assets/images/product-image/3.jpg" alt="Product" />
                        </a>
                        <span class="badges">
                                                    <span class="sale">-10%</span>
                                                    <span class="new">New</span>
                                                </span>
                        <div class="actions">
                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                    class="pe-7s-like"></i></a>
                            <a href="#" class="action quickview" data-link-action="quickview"
                               title="Quick view" data-bs-toggle="modal"
                               data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                            <a href="compare.html" class="action compare" title="Compare"><i
                                    class="pe-7s-refresh-2"></i></a>
                        </div>
                        <button title="Add To Cart" class=" add-to-cart">Add
                            To Cart</button>
                    </div>
                    <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 80%"></span>
                                                    </span>
                                                    <span class="rating-num">( 4 Review )</span>
                                                </span>
                        <h5 class="title"><a href="single-product.html">Ardene Microfiber
                                Tights</a>
                        </h5>
                        <span class="price">
                                                    <span class="new">$38.50</span>
                                                    <span class="old">$48.50</span>
                                                </span>
                    </div>
                </div>
                <!-- Single Prodect -->
            </div>
            <div class="new-product-item swiper-slide">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="single-product.html" class="image">
                            <img src="assets/images/product-image/1.jpg" alt="Product" />
                        </a>
                        <span class="badges">
                                                    <span class="new">New</span>
                                                </span>
                        <div class="actions">
                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                    class="pe-7s-like"></i></a>
                            <a href="#" class="action quickview" data-link-action="quickview"
                               title="Quick view" data-bs-toggle="modal"
                               data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                            <a href="compare.html" class="action compare" title="Compare"><i
                                    class="pe-7s-refresh-2"></i></a>
                        </div>
                        <button title="Add To Cart" class=" add-to-cart">Add
                            To Cart</button>
                    </div>
                    <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 100%"></span>
                                                    </span>
                                                    <span class="rating-num">( 5 Review )</span>
                                                </span>
                        <h5 class="title"><a href="single-product.html">Women's Elizabeth
                                Coat
                            </a>
                        </h5>
                        <span class="price">
                                                    <span class="new">$38.50</span>
                                                </span>
                    </div>
                </div>
                <!-- Single Prodect -->
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<!-- 4th tab end -->
</div>
</div>
</div>
</div>
</div>
<!-- Product Area End -->

<!-- Deal Area Start -->
<div class="deal-area deal-bg deal-bg-2" data-bg-image="{{asset('frontend_assets/images/deal-img/deal-bg-2.jpg')}}">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="deal-inner position-relative pt-100px pb-100px">
                    <div class="deal-wrapper">
                        <span class="category">#FASHION SHOP</span>
                        <h3 class="title">Deal Of The Day</h3>
                        <div class="deal-timing">
                            <div data-countdown="2021/05/15"></div>
                        </div>
                        <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Shop
                            Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                    </div>
                    <div class="deal-image">
                        <img class="img-fluid" src="{{asset('frontend_assets/images/deal-img/woman.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Area End -->
<!--  Blog area Start -->
<div class="main-blog-area pb-100px pt-100px">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-30px0px">
                    <h2 class="title">#blog</h2>
                    <p class="sub-title">Lorem ipsum dolor sit amet consectetur adipisicing eiusmod.
                    </p>
                </div>
            </div>
        </div>
        <!-- section title start -->

        <div class="row">
            <div class="col-lg-4 mb-md-30px mb-lm-30px">
                <div class="single-blog">
                    <div class="blog-image">
                        <a href="blog-single-left-sidebar.html"><img src="assets/images/blog-image/1.jpg"
                                                                     class="img-responsive w-100" alt=""></a>
                    </div>
                    <div class="blog-text">
                        <div class="blog-athor-date">
                            <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                                                          aria-hidden="true"></i> 24 Aug, 2021</a>
                            <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                K</a>
                        </div>
                        <h5 class="blog-heading"><a class="blog-heading-link"
                                                    href="blog-single-left-sidebar.html">There are many variations of
                                passages of Lorem</a></h5>

                        <a href="blog-single-left-sidebar.html" class="btn btn-primary blog-btn"> Read More<i
                                class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!-- End single blog -->
            <div class="col-lg-4 mb-md-30px mb-lm-30px">
                <div class="single-blog ">
                    <div class="blog-image">
                        <a href="blog-single-left-sidebar.html"><img src="{{asset('frontend_assets/images/blog-image/2.jpg')}}"
                                                                     class="img-responsive w-100" alt=""></a>
                    </div>
                    <div class="blog-text">
                        <div class="blog-athor-date">
                            <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                                                          aria-hidden="true"></i> 24 Aug, 2021</a>
                            <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                K</a>
                        </div>
                        <h5 class="blog-heading"><a class="blog-heading-link"
                                                    href="blog-single-left-sidebar.html">It is a long established factoi
                                ader will be distracted</a></h5>

                        <a href="blog-single-left-sidebar.html" class="btn btn-primary blog-btn"> Read More<i
                                class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!-- End single blog -->
            <div class="col-lg-4">
                <div class="single-blog">
                    <div class="blog-image">
                        <a href="blog-single-left-sidebar.html"><img src="{{asset('frontend_assets/images/blog-image/3.jpg')}}"
                                                                     class="img-responsive w-100" alt=""></a>
                    </div>
                    <div class="blog-text">
                        <div class="blog-athor-date">
                            <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                                                          aria-hidden="true"></i> 24 Aug, 2021</a>
                            <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                K</a>
                        </div>
                        <h5 class="blog-heading"><a class="blog-heading-link"
                                                    href="blog-single-left-sidebar.html">Contrary to popular belieflo
                                lorem Ipsum is not</a></h5>


                        <a href="blog-single-left-sidebar.html" class="btn btn-primary blog-btn"> Read More<i
                                class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!-- End single blog -->
        </div>
    </div>
</div>
<!--  Blog area End -->
@endsection
@section('footer_script')

        @if(session('success'))
        <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{session('success')}}',
            showConfirmButton: false,
            timer: 2500
        })

    @endif
    </script>
@endsection
