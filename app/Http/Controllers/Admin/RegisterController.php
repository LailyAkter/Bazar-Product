<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class RegisterController extends Controller
{
    public function index()
    {
        // dd(Hash::make("123456"));
        return view('admin.auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_name' => 'required',
            'email' =>'required|unique:users,email',
            'password' =>'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
        $user->save();

        session()->flash('message','User Account Created');
        session()->flash('type','success');
        return redirect('admin/login');

    }
}
