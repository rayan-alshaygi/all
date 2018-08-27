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

    public function services(){
        return view('pages.services');
    }
}
