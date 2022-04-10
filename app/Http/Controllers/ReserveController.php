<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Reserve;
use App\Models\Table;



class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('can_reserve');

        $user=Auth::user();
        return view('User.Reserve.reserve_form',compact('user'));
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
    public function store(Request $request)
    {
        $this->authorize('can_reserve');
        $user=Auth::user();
        $table=new Table();
        $reserve=new Reserve();
        $reserve->date=$request->date;
        $reserve->time=$request->time;
        $reserve->numPeople=$request->numPeople;
        $reserve->user_id=Auth::id();
        $needConfirm=FALSE;

        //checking for already registered
        $res = Reserve::where('user_id',Auth::id())->first();
        if($res!=null){
            $err="You have already reserved.";
            return view('User.Reserve.reserve_form',compact('err','user'));
        }
      
        $n=$reserve->numPeople;
        // checking logic
                $suitable_table=Table::where('reserve_id',0)->where('capacity','>=',$n)->orderBy('capacity')->first(); 
                if($suitable_table==null){
                    $err="Sorry no tables are availabe";
                    return view('User.Reserve.reserve_form',compact('err','user'));

                }else{
                    if($suitable_table->capacity>$reserve->numPeople){
                        $temp=$suitable_table->capacity;
                        $msg="Tables with capacity available: ".$temp;
                        $needConfirm=TRUE;

                        // inserting data to session
                        Session::put('date',$reserve->date);
                        Session::put('time',$reserve->time);
                        Session::put('numPeople',$reserve->numPeople);
                        Session::put('table',$suitable_table);



                        return view('User.Reserve.reserve_form',compact('msg','user','needConfirm'));
                    }    
                    else if($suitable_table->capacity==$reserve->numPeople){
                        $reserve->save();
                        $suitable_table->reserve_id=$reserve->id;

                        $reserve_details=array("tableNumber"=>$suitable_table->table_number,"reserveId"=>$reserve->id,"name"=>Auth::user()->name);
                        $suitable_table->save();
                        $msg="Table is reserved TABLE NUBMER: ".$suitable_table->table_number;
                        return view('User.Reserve.reserve_form',compact('msg','user'));
                    }                 
                }
        //end logic
       
        // $n=$reserve->numPeople;
        // $empty_table=Table::all()->where('reserve_id',null); //returns available tables
        // if($n<=2){
        //     $var=$empty_table->where('capacity',2)->first();
        //     if($var==null){
        //         //no 2 seated table available
        //     }
        //     $var->reserve_id=$reserve->id;
        //     $var->save();
        // }else if($n<=4){
        //     $var=$empty_table->where('capacity',4)->first();
        //     $var->reserve_id=$reserve->id;
        //     $var->save();
        // }else if($n<=8){
        //     $var=$empty_table->where('capacity',8)->first();
        //     $var->reserve_id=$reserve->id;
        //     $var->save();
        // }else if($n<=15){
        //     $var=$empty_table->where('capacity',15)->first();
        //     $var->reserve_id=$reserve->id;
        //     $var->save();
        // }else{
        //     //no tables available
        // }
        
        
        return redirect()->route('reserve');
    }

    public function confirmedReserve(){
        $this->authorize('can_reserve');

        $user=Auth::user();
        $table=new Table();
        $reserve=new Reserve();
        $reserve->date=Session::get('date');
        $reserve->time=Session::get('time');
        $reserve->numPeople=Session::get('numPeople');
        $suitable_table=Session::get('table');
        $reserve->user_id=Auth::id();
        $reserve->save();
        $suitable_table->reserve_id=$reserve->id;
        $reserve_details=array("tableNumber"=>$suitable_table->table_number,"reserveId"=>$reserve->id,"name"=>Auth::user()->name);
        $suitable_table->save();
        $reserve->save();
        $msg="Table is reserved TABLE NUBMER: ".$suitable_table->table_number;
        return view('User.Reserve.reserve_form',compact('msg','user'));
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
        Reserve::find($id)->delete();
        Table::where('reserve_id',$id)->update(['reserve_id'=>0]);
        return redirect()->route('reservation.view');
    }
}
