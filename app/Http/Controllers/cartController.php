<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{


    function cart_insert(request $request){

            if(cart::where('user_id',Auth::guard('customerlogin')->id())->where('product_id',$request->product_id)
                ->where('color_id',$request->color_id)->where('size_id',$request->size_id)->exists()){
                cart::where('user_id',Auth::guard('customerlogin')->id())->where('product_id',$request->product_id)
                    ->where('color_id',$request->color_id)->where('size_id',$request->size_id)
                    ->increment('quantity',$request->quantity);
                return back()->with('cart_added', 'product added to the cart');
            }
            else {
                cart::insert([
                    'user_id' => Auth::guard('customerlogin')->id(),
                    'product_id' => $request->product_id,
                    'color_id' => $request->color_id,
                    'size_id' => $request->size_id,
                    'quantity' => $request->quantity,
                    'created_at' => carbon::now(),

                ]);
                return back()->with('cart_added', 'product added to the cart');
            }


        }
    function cart_info(request $request){
        $coupon_name=$request->coupon_name;
        $massage=NULL;
        if($coupon_name ==''){
            $discount=0;
        }
        else {
            if(coupon::where('coupon_name',$coupon_name)->exists()){
                if(carbon::now()->format('Y-m-d') > coupon::where('coupon_name',$coupon_name)->first()->coupon_validity){
                    $massage="Validity expired";
                    $discount=0;
                }
                else{
                    $discount=coupon::where('coupon_name',$coupon_name)->first()->coupon_discount;
                    $massage="Coupon applied";
                }
            }
            else{
                $massage="Invalid Coupon";
                $discount=0;
            }
        }

        return view('Admin.frontend.cart',[
            'discount'=>$discount,
            'massage'=>$massage,
        ]);

    }

        function cart_remove($cart_id){
            cart::find($cart_id)->delete();
            return back();
        }
    function cart_clear(){
        cart::where('user_id',Auth::guard('customerlogin')->id())->delete();
        return back();
    }
    function cart_update(request $request){
        foreach ($request->qtybutton as $carts_id=>$quantity){
            //echo $carts.'=>'.$quantity ."<br>";
            cart::find($carts_id)->update([
                'quantity'=>$quantity,
            ]);
        }
        return back()->with('update_cart',"Carts updated successfully");
    }

}
