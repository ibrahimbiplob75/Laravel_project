<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\city;
use App\Models\country;
use App\Models\delivery_area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use carbon\carbon;
class checkoutController extends Controller
{
    function checkout(){
        $countries=country::all();
        $deliveries=delivery_area::all();
        $carts=cart::where('user_id',Auth::guard('customerlogin')->id())->get();
        return view('Admin.cart.checkout',[
            'countries'=>$countries,
            'carts'=>$carts,
            'deliveries'=>$deliveries,
        ]);
    }
    function getcity(request $request){
        $cities=city::where('country_id',$request->country_id)->get();
        $string=' <option>Select a city</option>';
        foreach ($cities as $city){
            $string.=' <option name="city_id" value='.$city->id.'>'.$city->name.'</option>';
        }
        echo $string;
    }

    function delivery(){
        $deliveries=delivery_area::all();
        return view('Admin.cart.delivery',[
            'deliveries'=>$deliveries,
        ]);
    }
    function delivery_insert(request $request){
       delivery_area::insert([
           'area_name'=>$request->area_name,
           'delivery_charge'=>$request->delivery_charge,
           'created_at'=>carbon::now(),
       ]);
    return back();

    }


}
