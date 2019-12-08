<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Election;
use App\Candidate;
use App\User;
use App\Party;
use Carbon\Carbon;
use DB;
class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::where('status',1)->get();
        return view('results.index',compact('elections'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidates = Candidate::where('election_id',$id)->get();
        foreach ($candidates as $key => $candidate) {
            $ids[] = $candidate->user_id;
        }
        $users = User::whereIn('id',$ids)->groupBy('area')->get();

        return view('results.show',compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('area',$id)->where('role','candidate')->get();
        $max = $users->max('candidate.votes');
        $users_max_vote = $users->where('candidate.votes', $max);
        $voters = User::where('area',$id)->where('role','voter')->get();
        return view('results.winner',compact('users','max','users_max_vote','voters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function result($id)
    {
        $seat = Party::where('election_id',$id)->orderBy('id','desc')
                ->max('seats');
        $parties = Party::where('election_id',$id)->get();
        $winner = Party::where('election_id',$id)->orderBy('id','desc')
                ->where('seats',$seat)->first();
        $candidates =Candidate::where('election_id',$id)->groupBy('area')->get();
        foreach ($candidates as $key => $candidate) {
            $areas [] = $candidate->area;
            $max_vote = Candidate::where('election_id',$id)
                        ->where('area',$candidate->area)->max('votes');

        $party = Party::where('user_id',$candidate->user_id)
                        ->where('election_id',$id)->latest()->first();
        $party->seats = $party->seats + 1;
        $party->save();
        $parties = Party::where('user_id','!=',$candidate->user_id)
                        ->where('election_id',$id)->orderBy('id','desc')->get();
                        foreach ($parties as $key => $party) {
                            $party->seats += 0;
                            $party->save();
                        }
        }

        return view('results.result',compact('parties','seat','winner'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function winner()
    {
        $elections = Election::where('status',1)->get();
        return view('results.election-winner',compact('elections'));
    }
}
