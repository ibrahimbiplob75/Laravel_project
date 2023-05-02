<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class categoryController extends Controller
{
    function category(){
        $category= category::all();

        return view('Admin.Category.category',[
            'category'=>$category,
            ]
        );
    }


    function category_insert(categoryRequest $request){

        category::insert([
           'category_name' =>$request->category_name,
           'submitted_by' =>Auth::id(),
            'created_at' =>carbon::now(),
        ]);
        return back()->with('success','Category added successfully ');
    }

    function category_delete($category_id){
        category::find($category_id)->delete();
        return back()->with('Delete','Category Deleted');
    }

    function category_edit($category_id){
       $edit_name= category::find($category_id);
       return view('Admin.Category.edit',[
           'edit_name'=>$edit_name,
       ]) ;
    }
    function category_update(categoryRequest $request){

        category::where('id',$request->category_id)->update([
            'category_name'=>$request->category_name,
            'updated_at'=>carbon::now()->diffForHumans(),
        ]);
        return back();
        //return view('Admin.Category.category');


    }
}
