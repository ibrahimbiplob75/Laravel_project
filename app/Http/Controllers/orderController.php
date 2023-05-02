<?php

namespace App\Http\Controllers;

use App\Models\billing_details;
use App\Models\cart;
use App\Models\inventory;
use App\Models\order;
use App\Models\order_product;
use Illuminate\Http\Request;
use carbon\carbon;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    function order(request $request){
        $order_id=order::insert([
            'user_id'=>$request->user_id,
            'sub_total'=>$request->sub_total,
            'discount'=>$request->discount,
            'delivery_charge'=>$request->delivery_charge,
            'total'=>($request->sub_total - $request->discount)+$request->delivery_charge,
            'payment_method'=>$request->payment_method,
            'created_at'=>carbon::now(),
        ]);
        billing_details::insert([
            'user_id'=>$request->user_id,
            'order_id'=>$order_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'company_name'=>$request->company_name,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'address'=>$request->address,
            'postcode'=>$request->postcode,
            'phone'=>$request->phone,
            'note'=>$request->note,
            'created_at'=>carbon::now(),
        ]);
        $carts=cart::where('user_id',Auth::guard('customerlogin')->id())->get();
        foreach($carts as $cart){
            order_product::insert([
                'order_id'=>$order_id,
                'product_id'=>$cart->product_id,
                'product_price'=>$cart->rel_to_product->discount_price,
                'color_id'=>$cart->color_id,
                'size_id'=>$cart->size_id,
                'quantity'=>$cart->quantity,
                'created_at'=>carbon::now(),
            ]);
        }
        if($request->payment_method==1){
            foreach($carts as $cart){
                inventory::where('product_id',$cart->product_id)->where('product_color',$cart->color_id)
                    ->where('product_size',$cart->size_id)->decrement('product_quantity',$cart->quantity);
                cart::find($cart->id)->delete();
            }
            return redirect('/')->with("success","Order placed");
        }

        return back()->with("success","Order Confirmed");
    }
}
