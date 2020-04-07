<?php

namespace App\Http\Controllers;

use App\Election;
use App\Mail\ElectionActive;
use App\Mail\ElectionHold;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $data = [
            'name' => $election->name,
            'election_date' => $election->election_date,
            'start_date' => $election->start_date,
            'end_date' => $election->end_date,
        ];

        if ($election->status == 0){
            $election->status=1;

            foreach (User::where('role','candidate')->get() as $candidate)
            {
                $data['email'] = $candidate->email;
                Mail::to($candidate->email)->send(new ElectionActive($data));
            }

            Toastr::success('Election Successfully is Being Active and notified to all Compatible Candidates','Success!');
        }
        else{
            $election->status=0;

            foreach ($election->candidates as $candidate)
            {
                $data['email'] = $candidate->user->email;
                Mail::to($candidate->user->email)->send(new ElectionHold($data));
            }

            Toastr::success('Election Successfully is Being Hold','Success!');
        }
        $election->save();

        return back();
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
