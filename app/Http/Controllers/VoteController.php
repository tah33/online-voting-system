<?php

namespace App\Http\Controllers;

use App\Vote;
use App\Candidate;
use App\Election;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections=Election::where('status',1)->whereDate('election_date', Carbon::now('Asia/Dhaka'))->get();
        $candidates = Candidate::where('status',1)->whereIn('election_id',$elections)->get();
        return view('votes.index',compact('elections','candidates'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applies = Apply::where('election_id',$id)->where('status',1)->get();
        return view('votes.show',compact('applies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vote=Vote::where('apply_id',$id)->where('user_id',Auth::id())->first();
        if (! $vote) {
        $vote= new Vote;
        $vote->user_id = Auth::id(); 
        $vote->apply_id = $id; 
        $vote->total=1;
        $vote->save();
        return back()->with('success','You Successfully Voted for this Candidate');
    }
    else
        return back()->with('error','You already Voted for this Candidate');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
