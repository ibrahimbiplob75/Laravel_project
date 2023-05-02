<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Http\Requests\subCategoryRequest;
use App\Models\category;
use App\Models\subCatergory;
use Carbon\Carbon;
use Illuminate\Http\Request;


class subcategoryController extends Controller
{
    function subCategory(){
        $category=category::all();
        $subCategory=subCatergory::all();
        $soft_delete=subCatergory::onlyTrashed()->get();
        return view('Admin.subCategory.subCategory',[
            'category'=>$category,
            'subCategory'=>$subCategory,
            'soft_delete'=>$soft_delete,
            ]);
    }

    function subCategory_insert(subCategoryRequest $request){
        if(subCatergory::where('category_id',$request->category_id)->where(
            'subCategory_name',$request->subCategory_name)->exists()){
            return back()->with("Exists","This subcategory has already in this Category");
        }
        else{
            subCatergory::insert([
                'category_id' =>$request->category_id,
                'subCategory_name' =>$request->subCategory_name,
                'created_at'=>carbon::now(),
            ]);
            return back()->with('success','Sub Category added successfully');
        }
    }

    function subcategory_delete($subcategory_id){
        subCatergory::find($subcategory_id)->delete();

        return back()->with("Delete","Sub Category Deleted successfully",[

        ]);
    }

    function subcategory_edit($subcategory_id){
        $category=category::all();
        $subCategory=subCatergory::find($subcategory_id);
        return view('Admin.subCategory.edit',[
            'category'=>$category,
            'subCategory'=>$subCategory,
        ]);
    }
    function subcategory_update(subCategoryRequest $request){
        if(subCatergory::where('category_id',$request->category_id)->where(
            'subCategory_name',$request->subCategory_name)->exists()){
            return back()->with("Exists","This subcategory has already in this Category");
        }
        else{
            subCatergory::where('id',$request->subcategory_id)->update([
                'subCategory_name'=>$request->subCategory_name,
                'updated_at'=>carbon::now(),

            ]);
            return back()->with('edit','subCategory edited successfully');
        }
    }

    function restore($subcategory_id){
        subCatergory::onlyTrashed()->find($subcategory_id)->restore();
        return back()->with("soft_Delete","Restore Sub category");
    }

    function p_delete($subcategory_id){
        subCatergory::onlyTrashed()->find($subcategory_id)->forceDelete();
        return back()->with("Hard_Delete","Sub category permanent deleted");
    }
}
