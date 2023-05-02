<?php

namespace App\Http\Controllers;

use App\Models\billing_details;
use App\Models\order;
use App\Models\order_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class myAccount extends Controller
{
    function my_account(){
        $person_orders=order::where('user_id',Auth::guard('customerlogin')->id())->get();
        $details=billing_details::where('user_id',Auth::guard('customerlogin')->id())->get();
        return view('Admin.frontend.myAccount',[
            'person_orders'=>$person_orders,
            'details'=>$details,
        ]);
    }
}
