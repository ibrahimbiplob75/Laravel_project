@extends('Admin.frontend.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Shop</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="{{url('/cart/update')}}" method="POST">
                        @csrf
                        @php
                        $total=0;
                        @endphp
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse(App\Models\cart::where('user_id',Auth::guard('customerlogin')->id())->get() as $carts)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img class="img-responsive ml-15px"
                                                         src="{{asset('uploads/preview')}}/{{$carts->rel_to_product->product_image}}" alt="" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{$carts->rel_to_product->product_name}}</a></td>
                                    <td class="product-price-cart"><span class="amount">{{$carts->rel_to_product->discount_price}}</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton[{{$carts->id}}]"
                                                   value="{{$carts->quantity}}" />
                                        </div>
                                    </td>
                                    <td class="product-subtotal">{{$carts->rel_to_product->discount_price * $carts->quantity}}</td>
                                    <td class="product-remove">
                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                        <a href="{{url('/cart/remove')}}/{{$carts->id}}}}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                    @php
                                    $total+=$carts->rel_to_product->discount_price * $carts->quantity;
                                    @endphp
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <h3 style="color: red" >No product is added</h3>
                                        </td>
                                    </tr>

                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="{{url('/')}}">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button type="submit">Update Shopping Cart</button>
                                        <a href="{{url('/cart/clear')}}">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-lm-30px">
                            <div class="cart-tax">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                </div>
                                <div class="tax-wrapper">
                                    <p>Enter your destination to get a shipping estimate.</p>
                                    <div class="tax-select-wrapper">
                                        <div class="tax-select">
                                            <label>
                                                * Country
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                * Region / State
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select mb-25px">
                                            <label>
                                                * Zip/Postal Code
                                            </label>
                                            <input type="text" />
                                        </div>
                                        <button class="cart-btn-2" type="submit">Get A Quote</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-lm-30px">
                            <form action="{{url('/cart')}}" method="GET">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                </div>
                                <div class="discount-code">
                                    <p>Enter your coupon code if you have one.</p>
                                    @if($massage)
                                        <div style="color: yellowgreen ; font-size: 20px" class="alert-success">{{$massage}}</div>
                                    @endif
                                        <input type="text" id="coupon_name" required="" name="coupon_name"  />
                                        <button class="cart-btn-2" id="coupon_btn" type="submit">Apply Coupon</button>

                                </div>

                            </div>
                            </form>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-md-30px">

                                <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>

                                <h3>
                                    @php
                                            $total_discount=($total*$discount)/100;

                                            session([
                                                'total'=>$total,
                                                'total_discount'=>($total*$discount)/100,
                                                ])

                                    @endphp

                                </h3>
                                <h5>Total Amount <span>TK-{{round($total,2)}}</span></h5>
                                <h5>Discount <span>TK-{{round($total_discount,2)}}</span></h5>

                                <h4 class="grand-totall-title">Grand Total <span>TK-{{round($total-$total_discount,2)}}</span></h4>
                                <a href="{{url('/checkout')}}">Proceed to Checkout</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection

@section('footer_script')
    <script>
        $('#coupon_btn').click(function (){
          var coupon_name=$('#coupon_name').val();
          var coupon_url='{{url('cart/')}}'
            var link_to_go=coupon_url+'/'+coupon_name;
          window.location.href=link_to_go;
        })
    </script>
    @if(session('update_cart'))
        <script>
            Swal.fire({
                position: 'top-mid',
                icon: 'success',
                title: '{{session('update_cart')}}',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif
@endsection

