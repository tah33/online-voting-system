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
        $data = [
            'title' => "Voter::Page" ,
          'voters' => User::where('role','voter')->get(),
        ];
    	return view('admin.voters')->with($data);
    }

    public function candidate()
    {
        $data = [
            'title' => "Voter::Page" ,
            'voters' => User::where('role','voter')->get(),
        ];
    	return view('admin.candidates')->with($data);
    }

     public function ongoing()
    {
        $data = [
            'title' => "Voter::Page" ,
            'ongoings' => Election::whereDate('election_date','<=',Carbon::now('Asia/Dhaka'))->where('status',1)->get(),
        ];
        return view('admin.ongoing')->with($data);
    }
}
