<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Price;
use App\BazarName;
use App\BazarLocation;
use App\AllProduct;

class AllProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.allProduct.index',compact(['products','product','bazarLocation',"bazarName","product_id","bazarLocation_id","bazarName_id",'search']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bazarName = BazarName::latest()->get();
        $bazarLocation = BazarLocation::latest()->get();
        $prices = Price::latest()->get();
        $products = Product::latest()->get();
        return view('admin.allProduct.create',compact(['bazarName','bazarLocation','prices','products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productValidator = $request->validate([
            'bazarName_id' => 'required',
            'bazarLocation_id'=>'required',
            'price_id'=>'required',
            'product_id' =>'required'
       
        ]);
        
            $product = new AllProduct();
            $product->bazarName_id =$request->bazarName_id;
            $product->bazarLocation_id =$request->bazarLocation_id;
            $product->price_id = $request->price_id;
            $product->product_id =$request->product_id;
            $product->save();
        
        return redirect()->route('allproduct.index')->with('product_add_msg','Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.allProduct.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productValidator = $request->validate([
            'product_name' => 'required',
            'created_at' =>'required'
        ]);

         $product->update([
            'product_name'=>$request->product_name,
            'slug'=>$slug,
            'image'=>$imageName,
            'created_at'=>$request->created_at,
        ]);
        
        return redirect()->route('product.index')->with('product_edit_msg','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
