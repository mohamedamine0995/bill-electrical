<?php

namespace App\Http\Controllers;

use App\Models\Bil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       $bil=Bil::all();
        //$p=Bil::find(1);
        $id = Auth::user()->connection_id;

        if(Bil::where('id_co', '=', $id)->exists()){

            $p=Bil::where('id_co', '=', $id)->latest()->get();
            return view('home',compact('bil','p'));
        }
        else {
            return view('home2',compact('bil'));
        }

        //$p=Bil::find(Auth::user()->connection_id);
//$pp=(object)$p;

/*
if($p==''){
    return view('home',compact('bil'));

}
else {
    return view('home',compact('bil','p'));

}
*/
    }

    public function adminHome(){
        $conid=User::all();
        return view('adminHome',compact('conid'));
    }

    public function managerHome(){
        return view('managerHome');
    }
}
