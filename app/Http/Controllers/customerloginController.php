<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class customerloginController extends Controller
{
    function customer_login(request $request){
        if(Auth::guard('customerlogin')->attempt(['email'=> $request->email ,'password'=> $request->password])){
            return redirect('/');
        }
        else{
            return redirect('/register');

        }
    }
    function customer_logout(request $request){
        
        redirect('/');
    }

}
