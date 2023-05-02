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
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->


    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">

        <div class="container">
            <form action="{{url('/order')}}" method="POST" >
                @csrf
                <div class="row">
                        <div class="col-lg-7">
                            <div class="billing-info-wrap">

                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>First Name</label>
                                            <input type="text" name="name" value="{{Auth::guard('customerlogin')->user()->name}}" />
                                            <input type="hidden" name="user_id" value="{{Auth::guard('customerlogin')->user()->id}}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Email Address</label>
                                            <input type="email" name="email" value="{{Auth::guard('customerlogin')->user()->email}}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-4">
                                            <label>Company Name</label>
                                            <input type="text" name="company_name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-select mb-4">
                                            <label>Country</label>
                                            <select name="country_id" id="country">
                                                <option >Select a country</option>
                                                @foreach($countries as $country)
                                                    <option  value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="billing-select mb-4">
                                            <label>City</label>
                                            <select name="city_id" id="city_name">
                                                <option>Select a city</option>

                                                    <option></option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-4">
                                            <label>Street Address</label>
                                            <input class="billing-address" name="address" placeholder="House number and street name"
                                                   type="text" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Postcode / ZIP</label>
                                            <input type="text" name="postcode"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Phone</label>
                                            <input type="text" name="phone"/>
                                        </div>
                                    </div>

                                </div>

                                <div class="additional-info-wrap">
                                    <h4>Additional information</h4>
                                    <div class="additional-info">
                                        <label>Order notes</label>
                                        <textarea placeholder="Notes about your order, e.g. special notes for delivery. "
                                                type="text"  name="note"></textarea>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                            <div class="your-order-area">
                                <h3>Your order</h3>
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-product-info">
                                        <div class="your-order-top">
                                            <ul>
                                                <li>Product</li>
                                                <li>Total</li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                @foreach($carts as $cart)
                                                <li>
                                                    <span style="color: black" class="order-middle-left ">{{$cart->rel_to_product->product_name}} X {{$cart->quantity}}</span>
                                                    <span class="order-price">{{$cart->rel_to_product->discount_price * $cart->quantity}}</span>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                <li>
                                                    <span style="color: green" class="order-middle-left ">Total Price</span>
                                                    <span style="color: green" class="order-price">{{session('total')}}</span>
                                                    <input type="hidden" name="sub_total" value="{{session('total')}}">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                    <li>
                                                        <span style="color: red" class="order-middle-left ">Discount</span>
                                                        <span style="color: red" class="order-price">{{session('total_discount')}}</span>
                                                        <input type="hidden" name="discount" value="{{session('total_discount')}}">
                                                    </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <div class="your-order-bottom">
                                                <div class="">
                                                    <h4>Delivery Location</h4>
                                                    @foreach($deliveries as $delivery)
                                                    <input style="height: 20px;width: 20px" type="radio" class="charge" name="delivery_charge" value="{{$delivery->delivery_charge}}" ><span style="font-size: 25px;color: black; padding-left: 10px">{{$delivery->area_name}}</span> <br>
                                                    @endforeach

                                                </div>
                                            </div>
                                        @php
                                        $grand_total=session('total')-session('total_discount');
                                        @endphp
                                        <div class="your-order-total">
                                            <input type="hidden" id="total" value="{{$grand_total}}">
                                            <ul >
                                                <li class="order-total">Total</li>
                                                <li id="grand_total">{{$grand_total}}</li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="payment-accordion element-mrg">
                                            <div id="faq" class="panel-group">
                                                <div class="panel panel-default single-my-account m-0">
                                                    <div class="panel-heading my-account-title">
                                                        <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                                                   href="#my-account-1" class="collapsed" style="font-size: 25px"
                                                                                   aria-expanded="true">Select Payment Method</a>
                                                        </h4>
                                                    </div>
                                                    <div id="my-account-1" class="panel-collapse collapse show"
                                                         data-bs-parent="#faq">

                                                        <div class="panel-body">
                                                            <input style="height: 15px;width: 15px" type="radio" class="charge" name="payment_method" value="1" ><span style="font-size: 20px;color: black; padding-left: 10px">Cash On delivery</span> <br>
                                                            <input style="height: 15px;width: 15px" type="radio" class="charge" name="payment_method" value="2" ><span style="font-size: 20px;color: black; padding-left: 10px">Pay with SSLcomerce</span> <br>
                                                            <input style="height: 15px;width: 15px" type="radio" class="charge" name="payment_method" value="3" ><span style="font-size: 20px;color: black; padding-left: 10px">Pay with Stripe</span> <br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default single-my-account m-0">
                                                    <div class="panel-heading my-account-title">
                                                        <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                                                   href="#my-account-2" aria-expanded="false"
                                                                                   class="collapsed">Check payments</a></h4>
                                                    </div>
                                                    <div id="my-account-2" class="panel-collapse collapse"
                                                         data-bs-parent="#faq">

                                                        <div class="panel-body">
                                                            <p>Please send a check to Store Name, Store Street, Store Town,
                                                                Store State / County, Store Postcode.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-25">
                                    <button style="width: 200px;height: 50px;font-size: large" class="btn btn-danger" type="submit" href="#">Place Order</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- checkout area end -->

@endsection
@section('footer_script')
    <script>
        $('#country').change(function(){
            var Country_id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/getCity',
                data:{country_id:Country_id},
                success:function(data){
                    $("#city_name").html(data);
                }
            })
        });
        $(document).ready(function() {
            $('#country').select2();
            $('#city_name').select2();

        });
    </script>
    <script>
        $('.charge').click(function(){
            var delivery_charge = $(this).val();
             var total_charge = $('#total').val();
             var grand_total=parseFloat(delivery_charge)+parseFloat(total_charge);
            $('#grand_total').html(grand_total);
        });
    </script>
    @if(session('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{session('success')}}',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif

@endsection
