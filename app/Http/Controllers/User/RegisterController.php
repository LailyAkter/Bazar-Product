<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BazarName;
use App\BazarLocation;
use App\Product;
use App\Price;
use App\User;
use App\UserProduct;

use DB;

class RegisterController extends Controller
{
   
    public function index()
    {
        $bazarName = BazarName::latest()->get();
        $bazarLocation = BazarLocation::latest()->get();
        return view('user.register',compact(['bazarName','bazarLocation']));
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'user_name'=>'required',
            'bazarName_id' => 'required',
            'bazarLocation_id' =>'required'
       ]);

       $user = new User();
       $user->user_name = $request->user_name;
       $user->bazarName_id = $request->bazarName_id;
       $user->bazarLocation_id = $request->bazarLocation_id;
       $user->save();
       return redirect('user/register/show/'.$user->id)->with('register_add_msg','register Added Successfully');
    }

    public function show($id)
    {                                                                                                                                                              
        $user = User::find($id);
        $bazar = BazarName::find($user->bazarName_id);
        $location = BazarLocation::find($user->bazarLocation_id);
        $products = Product::get(["product_name","id"]);
        $prices = Price::get(['price','id']);
        return view('user.show',compact(['user','bazar','location','products','prices']));

    }
    public function addlist(Request $request)
    {
        // save the data to a module 
        $data = $request->validate([
            "product_id" => 'required',
            'user_id' => 'required',
            'price_id' => 'required'
        ]);

        $all_data= new UserProduct();
        $all_data->product_id = $request->product_id;
        $all_data->user_id = $request->user_id;
        $all_data->price_id = $request->price_id;
        $all_data->save();
        //then redirect to  /register/list
        return redirect()->to("/user/register/list");
    }
    public function list()
    {
        $datas = DB::table('user_products')
            ->leftJoin("users","users.id","=","user_products.user_id") 
            ->leftJoin("prices","prices.id","=","user_products.price_id")             
            ->leftJoin("products","products.id","=","user_products.product_id")
            ->leftJoin("bazar_names","bazar_names.id","=","users.bazarName_id")
            ->leftJoin("bazar_locations","bazar_locations.id","=","users.bazarLocation_id")
            ->select("*","user_products.id as id","bazar_names.name as bazerName","bazar_locations.location as location")->get();
            // dd($datas);
        $user = User::latest()->get();
        // dd($user);
        return view('user.list',compact(['datas','user']));
    }
}
