<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function welcome(){
        
        return view('welcome');
    }
    function about(){
        
        return view('about');
    }
    function contact(){
        
        return view('contact');
    }
}
