<?php

namespace App\Http\Controllers;

use App\Models\User;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class profileController extends Controller
{
    function profile_edit(){
        $admin=Auth::user();
        return view("Admin.profile.edit_profile",[
            'admin'=>$admin,
        ]);
    }
    function profile_update(request $request){
        // Validation
        $request->validate([
            'password'=>'required',
            'photo' => 'mimes:jpg,bmp,png',
            'photo' =>'required|file|max:8192',

        ]);

        // Image name create
        $image=$request->photo;
        $extention=$image->getClientOriginalExtension();
        $image_name=Auth::user()->id ."." .$extention;
        if(Auth::user()->photo!="default.png"){
            $path=public_path()."/dashboard_assets/profile_image/".Auth::user()->photo;
            unlink($path);
        }
        Image::make($image)->resize(300, 300)->save(base_path('public/dashboard_assets/profile_image/'.$image_name));



        // INSERT after validation
        if(Hash::check($request->password,Auth::user()->password)){
            User::find(Auth::id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'photo'=>$image_name,
            ]);
            return back()->with("success","profile updated");
        }

        else{
            return back()->with("error","password didn't match");
        }


    }
}
