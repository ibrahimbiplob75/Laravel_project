<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\color;
use App\Models\inventory;
use App\Models\product;
use App\Models\productThumbnail;
use App\Models\size;
use App\Models\subCatergory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class productController extends Controller
{
    function index(){
        $category=category::all();
        $subcategory=subCatergory::all();
        $products=product::all();
        return view("Admin.products.index",[
            'category'=>$category,
            'subcategory'=>$subcategory,
            'products'=>$products,
        ]);
    }
    function getSubcategory(Request $request){
        $subCategory=subCatergory::where('category_id',$request->category_id)->select("id","subCategory_name")->get();
        $string_to_send='<option>-->select subcategory<-- </option>';
        foreach ($subCategory as $subcategory) {
            $string_to_send.='<option value="'.$subcategory->id.'">'.$subcategory->subCategory_name.'</option>';
        }
        echo $string_to_send;
    }
    function Insert(request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'percent_of_discount'=>'required',
            'product_description'=>'required',
            'product_image' => 'mimes:jpg,png',
            'product_image' =>'required|file|max:8192',
        ]);


        $product_id=product::insertGetId([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'percent_of_discount'=>$request->percent_of_discount,
            'discount_price'=>$request->product_price-($request->product_price*$request->percent_of_discount)/100,
            'product_description'=>$request->product_description,
            'created_at'=>carbon::now(),
        ]);
        $product_image=$request->product_image;
        $extention=$product_image->getClientOriginalExtension();
        $image_name=$product_id.'.'.$extention;

       Image::make($product_image)->resize(300,300)->save(public_path('uploads/preview/').$image_name);

        product::find($product_id)->update([
            'product_image'=>$image_name,
        ]);


        $count=1;

        foreach($request->file('thumbnail_image') as $single_image){
            $extention=$single_image->getClientOriginalExtension();
            $image_name=$product_id.'-'.$count.'.'.$extention;
            Image::make($single_image)->resize(300,300)->save(public_path('uploads/thumbnail/').$image_name);
            productThumbnail::insert([
                'product_id'=>$product_id,
                'thumbnail_image'=>$image_name,
                'created_at'=>carbon::now(),
            ]);
            $count++;
        };
        return back()->with("Success","Product uploaded successfully");
    }
    function color(){
        $colors=color::all();
        $sizes=size::all();
        return view("Admin.products.colorSize",[
            'colors'=>$colors,
            'sizes'=>$sizes,
        ]);
    }
    function color_insert(request $request){
        color::insert([
         'color_name'=>$request->color_name,
         'color_code'=>$request->color_code,
            'created_at'=>carbon::now(),
        ]);
        return back()->with("Success","Product color uploaded successfully");
    }

    function size_insert(request $request){
        size::insert([
            'size_name'=>$request->size_name,
            'created_at'=>carbon::now(),
        ]);
        return back()->with("success","Product size uploaded successfully");
    }

    function size_delete($size_id){
        size::find($size_id)->delete();
        return back()->with('Delete','Size Deleted');
    }

    function color_delete($color_id){
        color::find($color_id)->delete();
        return back()->with('delete','color Deleted');
    }

    function inventory($product_id){
        $colors=color::all();
        $sizes=size::all();
        $product_name=product::find($product_id);
        $inventorys=inventory::all();
        return view("Admin.products.inventory",[
            'colors'=>$colors,
            'sizes'=>$sizes,
            'product_name'=>$product_name,
            'inventorys'=>$inventorys,
        ]);
        return back();
    }

    function inventory_insert(request $request){
        if(inventory::where('product_id',$request->product_id)->where('product_color',$request->product_color)->
        where('product_size',$request->product_size)->exists()){
            inventory::where('product_id',$request->product_id)->where('product_color',$request->product_color)->
            where('product_size',$request->product_size)->increment('product_quantity',$request->product_quantity);
        }
        else{
            inventory::insert([
                'product_id' =>$request->product_id,
                'product_color' =>$request->product_color,
                'product_size' =>$request->product_size,
                'product_quantity' =>$request->product_quantity,
                'created_at'=>carbon::now(),
            ]);
        }

        return back()->with("success","Product inventory uploaded successfully");
    }

}
