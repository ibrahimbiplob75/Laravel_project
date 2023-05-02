<?php

namespace App\Http\Controllers;


use App\Models\category;
use App\Models\inventory;
use App\Models\product;
use App\Models\size;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
//     * @return \Illuminate\Contracts\Support\Renderable
     * @return Renderable
     */
    public function index(): Renderable
    {
        $ID=Auth::id();
        $admin=user::where("id" ,"!=",$ID)->orderBy("id","desc")->paginate(5);
        $user_count=user::count();
        $user_name=Auth::user()->name;
        return view('home',compact("admin","user_count","user_name"));
    }
    function dashboard(){
        return view("layouts.dashboard");
    }

    function website(){
        $all_categories=category::all();
        $best_categories=category::take(3)->get();
        $all_products=product::all();
        $latest_products=product::latest()->take(5)->get();
        return view("Admin.frontend.index",[
            'all_categories'=>$all_categories,
            'all_products'=>$all_products,
            'best_categories'=>$best_categories,
            'latest_products'=>$latest_products,
        ]);
        }

    function admin(){
        return view("layouts.dashboard");
    }

    function single_products($product_id){
        $single_products=product::find($product_id);
        $related_products=product::where('category_id',$single_products->category_id)->where('id' ,'!=',$product_id)->get();
        $availiable_colors=inventory::where('product_id',$product_id)->groupBy('product_color')
            ->selectRaw('count(*) as same_color ,product_color')->get();
        return view("Admin.frontend.single_products",[
            'single_products'=>$single_products,
            'availiable_colors'=>$availiable_colors,
            'related_products'=>$related_products,
        ]);
    }

    function getsize(request $request){
        $sizes= inventory::where('product_id', $request->product_id)->where('product_color',$request->color_code)->get('product_size');
        $size_name_send='';
        foreach($sizes as $size){
            $size_name=size::find($size->product_size)->size_name;
            $size_name_send .= '<li><a class="size_id" name="'.$size->product_size.'" >'.$size_name.'</a></li>';
        }

        echo $size_name_send;

    }

    function register(){
        return view('Admin.frontend.login');
    }

}
