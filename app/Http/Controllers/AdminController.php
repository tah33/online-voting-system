<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Election;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function voter()
    {
    	$voters = User::where('role','voter')->get();
    	return view('admin.voters',compact('voters'));
    }

    public function candidate()
    {
    	$candidates = User::where('role','candidate')->get();
    	return view('admin.candidates',compact('candidates'));
    }

     public function ongoing()
    {
        $ongoings = Election::whereDate('election_date','<=',Carbon::now())->where('status',1)->get();
        return view('admin.ongoing',compact('ongoings'));
    }
}
