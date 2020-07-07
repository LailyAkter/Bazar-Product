<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Price;
use App\BazarName;
use App\BazarLocation;
use App\AllProduct;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->product_id || $request->bazarName_id || $request->bazarLocation_id || $request->search){
            // dd($request->product_id);
            $products = DB::table('all_products')
            ->where('products.product_name','LIKE','%'.$request->product_id?$request->product_id:"".'%')
            ->where('all_products.created_at','LIKE','%'.$request->search.'%')
            ->leftJoin("bazar_names","bazar_names.id","=","all_products.bazarName_id") 
            ->where('bazar_names.id','LIKE','%'.$request->bazarName_id?$request->bazarName_id:"".'%')
            ->leftJoin("bazar_locations","bazar_locations.id","=","all_products.bazarLocation_id") 
            ->where('bazar_locations.id','LIKE','%'.$request->bazarLocation_id?$request->bazarLocation_id:"".'%')
            ->leftJoin("prices","prices.id","=","all_products.price_id")             
            ->leftJoin("products","products.id","=","all_products.product_id")   
            ->select("*","all_products.id as id","bazar_names.name as name" ,"bazar_locations.location as location","all_products.created_at as created_at")->paginate(10);
               // dd($products);
        }else{
            $products = DB::table('all_products')
            ->leftJoin("bazar_names","bazar_names.id","=","all_products.bazarName_id") 
            ->leftJoin("bazar_locations","bazar_locations.id","=","all_products.bazarLocation_id") 
            ->leftJoin("prices","prices.id","=","all_products.price_id")             
            ->leftJoin("products","products.id","=","all_products.product_id")    
            ->select("*","all_products.id as id","bazar_names.name as name" ,"bazar_locations.location as location","all_products.created_at as created_at")->paginate(10);
        }

        
        $bazarName = BazarName::latest()->get();
        $bazarLocation = BazarLocation::latest()->get();
        $product = Product::latest()->get();
        $search= $request->search?$request->search:"";
        $product_id= $request->product_id?$request->product_id: "";
        $bazarName_id= $request->bazarName_id?$request->bazarName_id: "";
        $bazarLocation_id= $request->bazarLocation_id?$request->bazarLocation_id: "";
        return view('home',compact(['products','product','bazarLocation',"bazarName","product_id","bazarLocation_id","bazarName_id",'search']));
    }
}
