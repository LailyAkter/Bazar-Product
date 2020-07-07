<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' =>'required',
            'password' =>'required|min:6',
        ]);

       $user_data = array(
        'email' => $request->get('email'),
        'password' => $request->get('password'),
       );
        if(auth()->attempt($user_data)){
            return redirect('/admin/dashboard');
        }
        session()->flash('message','Invailed');
        session()->flash('type','danger');
        return redirect()->back();
    }

    public function logout ()
    {
        auth()->logout();
       return redirect()->to("/admin/login"); 
    }
}
