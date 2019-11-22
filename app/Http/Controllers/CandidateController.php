<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Election;
use Illuminate\Http\Request;
use Auth;
class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections=Election::where('status',1)->get();
        return view('candidate.index',compact('elections'));
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
        return back();
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
        return back();
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
        return back();
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
}
