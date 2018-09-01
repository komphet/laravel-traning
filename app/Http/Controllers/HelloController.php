<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request,$id,$id2)
    {
    
    	return $request->page;
    	// return view('hello.index');
    }
}
