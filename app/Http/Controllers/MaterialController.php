<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;


class MaterialController extends Controller
{
	 public function __construct()
    {
        //$this->middleware('auth');
    }

    public function training_list(Request $request)
    {
    	$lng=session('lang');
    	if ($lng=='') {$lng='en'; session(['lang' => 'en']);} 
        $lista=array_merge(glob("Material/annualtraining/".$lng."/*.ppt"));
        
        return View('annual_training')->with('info', $lista);
    }
}
