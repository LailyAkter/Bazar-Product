<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->search){
        //     $products = DB::table('products')
        //     ->where('product_name','LIKE','%'.$request->search.'%')
        //     ->orWhere('bazars.created_at','LIKE','%'.$request->search.'%')
        //     ->leftJoin("bazars","bazars.id","=","products.bazar_id")         
        //     ->select("*","products.id as id","bazars.name" ,"bazars.location")->paginate(5);
        // }else{
        // $products = DB::table('products')
        //     ->leftJoin("bazars","bazars.id","=","products.bazar_id")          
        //     ->select("*","products.id as id","bazars.name" ,"bazars.location")->paginate(5);
       
        //  }
        //  return view('admin.products.index',[
        //      "products"=>$products,
        //      "search"=>$request->search?$request->search:"",
        //  ]);

        $products = Product::latest()->get();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
            'product_name' => 'required|unique:products',
            'image'=>'required',
            'created_at' =>'required'
           
        ]);
        // dd($request->all());

        // get form images
          $image = $request->file('image');
          $slug = str_slug($request->product_name);
  
          if(isset($image)){
            // make uniqe name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            // check product directory is exists
            if(!Storage::disk('public')->exists('product')){
              Storage::disk('public')->makeDirectory('product');
            }
             // resize image for category slider and is_uploaded_file
            $slider = Image::make($image)->resize(500,333)->stream();
            
            Storage::disk('public')->put('product/'.$imageName,$slider);
         }else{
             $imageName='default.png';
         }

    
         DB::table('products')->insert([
            'product_name' =>$request->product_name,
            'slug' =>$slug,
            'image' =>$imageName,
            'created_at' =>$request->created_at,
        ]);
        
        return redirect()->route('product.index')->with('product_add_msg','Product Added Successfully');
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
        return view('admin.products.edit',compact('product'));
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

        // get form images
          $image = $request->file('image');
          $slug = str_slug($request->product_name);
          $product = Product::find($id);
          
        //  dd($product);
  
          if(isset($image)){
            // make uniqe name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            
            // check public directory is exists
            if(!Storage::disk('public')->exists('product')){
              Storage::disk('public')->makeDirectory('product');
            }
            // delete old image
            if(Storage::disk('public')->exists('product/'.$product->image)){
                Storage::disk('public')->delete('product/'.$product->image);
            }
           // resize image  is_uploaded_file
           $products = Image::make($image)->resize(1600,479)->stream();
           Storage::disk('public')->put('product/'.$imageName,$products);

         }else{
             $imageName=$product->image;
         }

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
