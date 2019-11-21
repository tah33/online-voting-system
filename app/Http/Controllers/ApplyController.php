<?php

namespace App\Http\Controllers;

use App\Apply;
use App\Election;
use Illuminate\Http\Request;
use Auth;
class ApplyController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        return view('apply.create',compact('elections'));
    }

    public function store(Request $request)
    {
    }

    public function show(Apply $apply)
    {
        $apply->status=1;
        $apply->save();
        return back();
    }

    public function edit($id)
    {
        $apply= new Apply;
        $user=Auth::id();
        $apply->user_id=$user;
        $apply->election_id=$id;
        $apply->save();
        return back();
    }

    public function update(Request $request, Apply $apply)
    {
        //
    }

    public function destroy(Apply $apply)
    {
        $apply->delete();
        return redirect('home');
    }
   
}
