<?php

namespace App\Http\Controllers;

use App\Voter;
use App\Election;
use App\Candidate;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoterController extends Controller
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
        return view('voter.index',compact('elections','candidates'));
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
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::find($id);
        $voter=Voter::where('user_id',Auth::id())->where('election_id',$candidate->election_id)->first();
        if ($voter) {
            return back()->with('error','You Already Voted for this Election');
        }
        else{
        $voter= new Voter;
        $voter->user_id         = Auth::id();
        $voter->candidate_id    = $id;
        $voter->election_id    = $candidate->election_id;
        $voter->save();
        }
        if ($voter->save()) {
            $candidate->votes +=1;
            $candidate->save();
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Voter $voter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voter $voter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voter $voter)
    {
        //
    }
}
