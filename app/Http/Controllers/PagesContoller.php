<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class PagesContoller extends Controller
{
    //
    public function test(){
        $names=array("huda","rayan","maha");
        return view('test')
        ->with('names',$names); 
    }
    public function index(){
        return view('pages.index');
    } 
    public function about(){
        return view('pages.about');
    }

    public function showcalc(){
        return view('pages.calc');
    }

    public function showres(Request $request){
        $v=\Validator::make($request->all(),[
            'num1'=>'required',
            'num2'=>'min:2|required',
            'password'=>'required|confirmed'
        ]); // replacment for the if and else  ->validate();
        if($v->fails()){
            return back()->withInput()->withErrors($v);
        }else{

            $num1=$request->num1;
            $num2=$request->num2;
            $sum=$num1+$num2;
            echo " sum equals " .$sum;
    }
        //input(num1);
        //return $request->num1     $request->has("num1") also has pathUrl and all
    }
    public function services(){
        return view('pages.services');
    }
}
