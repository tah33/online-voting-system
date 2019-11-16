<?php

namespace App\Http\Controllers;

use App\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{

    public function index()
    {
        $elections=Election::all();
        return view('elections.index',compact('elections'));
    }

    public function create()
    {
        return view('elections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:elections,name',
            'start_date' =>'required|after_or_equal:tomorrow',
            'end_date' =>'required|after:start_date',
            'election_date' =>'required|before:end_date|after:start_date',
        ]);
        Election::create($request->all());
        return redirect('elections');
    }

    public function show(Election $election)
    {
        $election->status=1;
        $election->save();
        return redirect('elections');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function edit(Election $election)
    {
        return view('elections.edit',compact('election'));
    }

    public function update(Request $request, Election $election)
    {
        $request->validate([
            'name' =>'required|unique:elections,name',
            'start_date' =>'required|after_or_equal:tomorrow',
            'end_date' =>'required|after:start_date',
            'election_date' =>'required|before:end_date|after:start_date',
        ]);
        $election->name=$request->name;
        $election->start_date=$request->start_date;
        $election->end_date=$request->end_date;
        $election->election_date=$request->election_date;
        $election->save();
        return redirect('elections');
    }

    public function destroy(Election $election)
    {
        $election->delete();
        return back();
    }
}
