<?php

namespace App\Http\Controllers;
use App\Models\Paid;
use App\Models\Bil;
use App\Models\Rate;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class Pay extends Controller
{


    public function add(Request $request){
        $prix=Rate::find(2);
        $pr=$prix->prix;
      //  $d=(($request->fnr)-($request->inr))*10.09;
      $d=(($request->fnr)-($request->inr))*$pr;
        $bil=new Bil();
        $bil->id_co=$request->coid;
        $bil->rat=$d;
        $bil->mon=$request->mon;
        $bil->yea=$request->yea;
        $bil->save();
        return back();
    }
    public function changerat(Request $request){

        $b=Rate::find(2);
        $b->prix=$request->prix;
        //dd($b);
        $b->save();
        return back();
    }

    public function pay(Request $request){
        $bil=new Paid();
        $bil->amount=$request->amount;
        $bil->mon=$request->mon;
        $bil->yea=$request->yea;
        $bil->save();
        return back();
    }
    public function down(Request $request){
        $id = Auth::user()->connection_id;

        if (Bil::where('id_co', '=', $id)->where('mon','=',$request->mon)->where('yea','=',$request->yea)->exists()){
            $p=Bil::where('id_co', '=', $id)->where('mon','=',$request->mon)->where('yea','=',$request->yea)->get();

            $data=[
                'month'=>$p[0]['mon'],
                'year'=>$p[0]['yea'],
                'paid'=>$p[0]['rat']
            ];
            $pdf=PDF::loadView('down',$data);
            return $pdf->stream();
        }
        else
{
    $pdf=PDF::loadView('upp');
    return $pdf->stream();
}
    }
}
