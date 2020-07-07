<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BazarLocation;

class BazarLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bazar_all = BazarLocation::latest()->get();
        return view('admin.bazarLocation.index',compact('bazar_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bazarLocation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'location'=>'required',
        ]);
         
        $bazar = new BazarLocation();
        $bazar->location = $request->location;
        $bazar->save();

        return redirect()->route('bazarlocation.index')->with('bazar_add_msg','Bazar Added Successfully');
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
        $bazar = BazarLocation::find($id);
        return view('admin.bazarLocation.edit',compact('bazar'));
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
        $bazar = BazarLocation::find($id);
        $data = $request->validate([
            'location'=>'required'
        ]);
         
        $bazar->location = $request->location;
        $bazar->save();

        return redirect()->route('bazarlocation.index')->with('bazar_update_msg','Bazar Updated Successfully');
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
