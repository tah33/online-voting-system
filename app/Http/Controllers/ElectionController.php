<?php

namespace App\Http\Controllers;

use App\Election;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ElectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => "Election::List" ,
            'elections' => Election::all(),
        ];
        return view('elections.index')->with($data);
    }

    public function create()
    {
        $title = "Create::Election";
        return view('elections.create',compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:elections,name',
            'election_date' =>'required|after_or_equal:tomorrow',
            'start_date' =>'required|before:election_date',
            'end_date' =>'required|after:start_date|before:election_date',
        ]);

        $election = new Election;
        $election->name = $request->name;
        $election->start_date = Carbon::createFromFormat('m/d/Y',$request->start_date) ;
        $election->election_date = Carbon::createFromFormat('m/d/Y',$request->election_date);
        $election->end_date = Carbon::createFromFormat('m/d/Y',$request->end_date);
        $election->save();

        Toastr::success('Election Created Successfully','Success!');
        return back();
    }

    public function show(Election $election)
    {
        if ($election->status == 0)
            $election->status=1;
        else
            $election->status=0;

        $election->save();
        Toastr::success('Election Succesfylly Modified','Success!');

        return redirect('elections');
    }


    public function edit(Election $election)
    {
        $data = [
          'title' => 'Election::edit',
          'election' => $election,
        ];
        return view('elections.edit')->with($data);
    }

    public function update(Request $request, Election $election)
    {
        $request->validate([
            'name' =>'required|unique:elections,name,'.$election->id,
            'election_date' =>'required|after_or_equal:tomorrow',
            'start_date' =>'required|before:election_date',
            'end_date' =>'required|after:start_date|before:election_date',
        ]);
        $election->name=$request->name;
        $election->status = $request->status;
        $election->election_date=$request->election_date;
        $election->start_date=$request->start_date;
        $election->end_date=$request->end_date;
        $election->save();

        Toastr::success('Election info Successfully Updated','Success!');
        return redirect('elections');
    }

    public function destroy(Election $election)
    {
        $election->candidates()->delete();
        $election->delete();

        Toastr::success('Election was Succesfylly Deleted','Success!');
        return back();
    }
}
