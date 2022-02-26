<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $menu=Menu::all();
        return view('User.menu',compact('user','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        return view('Admin.Menu.add',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foodName'=>'required',
            'is_veg'=>'required',
            'price'=>'required',
            'img_path'=>'required|mimes:jpg,jpeg,png|max:5048'
        ]);

       

        $menu=new Menu();
        $menu->foodName=$request->foodName;
        $menu->is_veg=$request->is_veg;
        $menu->price=$request->price;

        $newImageName=time().'-'.$request->foodName.'.'.$request->img_path->extension();
        $request->img_path->move(public_path('images'),$newImageName);
        $menu->img_path=$newImageName;
        
        $menu->save();
        return redirect()->route('menu');

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
        $user=Auth::user();
        $menu=Menu::find($id);
        return view('Admin.Menu.edit',compact('user','menu'));
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
        $menu=Menu::find($id);
        $menu->foodName=$request->foodName;
        $menu->is_veg=$request->is_veg;
        $menu->price=$request->price;
        if($request->hasFile('img_path')){
        $newImageName=time().'-'.$request->foodName.'.'.$request->img_path->extension();
        $request->img_path->move(public_path('images'),$newImageName);
        $menu->img_path=$newImageName;
        }
        $menu->save();
        return redirect()->route('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();
        return redirect()->route('menu');
    }
}
