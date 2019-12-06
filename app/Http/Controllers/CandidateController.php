<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Election;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids=[];
        $elections = Election::where('status',1)->get();
        foreach ($elections as $key => $election) {
        foreach ($election->candidates as $candidate)
            $ids [] = $candidate->user_id;
        }
        $users = User::whereIn('id',$ids)->orderBy('area','asc')->get();
        return view('candidate.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $candidate = new Candidate;
        $candidate->user_id = Auth::id();
        $candidate->election_id = $id;
        $candidate->save();
        return back()->with('succes','Succesfully Your application has been sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        $candidate->status=1;
        $candidate->save();
        return back()->with('success','Candidate Approved Succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return back()->with('success','Candidate Rejected Succesfully');
    }

    public function apply()
    {
        $applies = Election::where('status',1)->get();
        return view('candidate.list',compact('applies'));
    }

     public function pending()
    {
        $applies=Candidate::where('status',0)->get();
        return view('candidate.pending',compact('applies'));
    }

     public function reject()
    {
        $rejects=Candidate::onlyTrashed()->get();
        return view('candidate.reject',compact('rejects'));
    }

    public function candidate()
    {
        $candidate = $candidates = '';
        $user = Auth::id();
        $candidate = Candidate::where('user_id',$user)->latest()->first();
        if($candidate)
            $candidates = Candidate::where('election_id',$candidate->election_id)->get();
        return view('candidate.candidates',compact('candidates','candidate'));
        
    }

    public function upcoming()
    {
        $upcomings = Election::whereDate('election_date','<',Carbon::now())
        ->whereYear('election_date','=',Carbon::now())->get();
        return view('candidate.candidates',compact('upcomings'));
        
    }
}
