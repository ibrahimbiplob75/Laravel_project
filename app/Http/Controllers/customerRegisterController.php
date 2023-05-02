<?php

namespace App\Http\Controllers;

use App\Models\customerlogin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class customerRegisterController extends Controller
{
    function customer_register(request $request){
        customerlogin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>carbon::now(),
        ]);
        return back()->with('success',"You have done your registration ");
    }
}
