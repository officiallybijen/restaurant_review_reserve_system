<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;

class DashboardController extends Controller
{
   
    public function home(){
        $user=Auth::user();
        return view('Admin.Dashboard.dashboard',compact('user'));
    }
    public function view(){
        $all_reserve=Reserve::all();
        $user=Auth::user();
        return view('Admin.Dashboard.reservation',compact('all_reserve','user'));
    }

}
?>