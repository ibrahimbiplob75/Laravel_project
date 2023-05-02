<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Illuminate\Http\Request;
use carbon\carbon;

class couponController extends Controller
{
    function coupon(){
        $coupons=coupon::all();
        return view('Admin.cart.coupon',[
            'coupons'=>$coupons,
        ]);
    }
    function coupon_insert(request $request){
        coupon::insert([
            'coupon_name'=>$request->coupon_name,
            'created_by'=>$request->created_by,
            'coupon_validity'=>$request->coupon_validity,
            'coupon_discount'=>$request->coupon_discount,
            'created_at'=>carbon::now(),
        ]);
        return back();
    }
}
