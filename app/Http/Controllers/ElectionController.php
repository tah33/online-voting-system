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
            'election_date' =>'required|after_or_equal:tomorrow',
        ]);
        Election::create($request->all());
        return back()->with('success','Election Created Successffully');
    }

    public function show(Election $election)
    {
        if ($election->status == 0) 
            $election->status=1;
        else
            $election->status=0;
        $election->save();
        return redirect('elections')->with('success','Election Succesfylly Modified');
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
            'name' =>'required|unique:elections,name,'.$election->id,
            'election_date' =>'required|after_or_equal:tomorrow',
        ]);
        $election->name=$request->name;
        $election->status = $request->status;
        $election->election_date=$request->election_date;
        $election->save();
        return redirect('elections')->with('success','Election info Succesfylly Updated');
    }

    public function destroy(Election $election)
    {
        $election->candidates()->delete();
        $election->delete();
        return back()->with('success','Election was Succesfylly Deleted');
    }
}
