<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuImages;
use App\Models\Reserve;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($menu_id)
    {
        $menu=Menu::find($menu_id);

        $menuImage=MenuImages::where('menu_id',$menu_id)->get();
        $review=$menu->reviews;
        $user=Auth::user();
        
        $totalNum=Review::where('menu_id',$menu_id)->count();
        $totalRate=Review::where('menu_id',$menu_id)->sum('rate');

        if($totalNum!=0){
            $avg_rate=$totalRate/$totalNum;
        }
        else{
            $avg_rate=0;
        }
        
        
        
        //checking for duplication
        $temp=Review::where('user_id',Auth::id())->where('menu_id',$menu_id)->first();
        $can=FALSE;
        if($temp==null){
            $can=TRUE;
        }
        return view('User.Review.review',compact('review','user','menu','can','menuImage','avg_rate','totalNum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$menu_id)
    {
        $review=new Review();
        $review->rate=$request->rate;
        $review->comment=$request->comment;
        $review->user_id=Auth::id();
        $review->menu_id=$menu_id;
        $review->save();
        return redirect()->route('review',['id'=>$menu_id]);
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
        //
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
        //
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
