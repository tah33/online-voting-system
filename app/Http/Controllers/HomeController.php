<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function nid()
    {
    	$user= Auth::user();
    	return view('voter.nid',compact($user));
    }
}
