<?php

namespace App\Http\Controllers;

use App\Voter;
use App\Election;
use App\User;
use App\Candidate;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoterController extends Controller
{
   
     public function index()
    {
        $ids = [];
        $candidates = '';
        $elections=Election::where('status',1)->get();
        foreach ($elections as $key => $election) {
            $ids[] = $election->id;
        }
        if(!empty($ids))
            $candidates = Candidate::where('status',1)->whereIn('election_id',$ids)->get();
        return view('voter.index',compact('elections','candidates'));
    }
   


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $candidate = Candidate::find($id);
        $voter=Voter::where('user_id',Auth::id())->where('election_id',$candidate->election_id)->first();
        if ($voter) {
            if ($voter->wrong_attempt == 1) {
                Auth::logout();
                $user=User::find($voter->user_id);
                $user->delete();
                 return redirect('login');
            }

            $voter->wrong_attempt = 1;
            $voter->save();
            return back()->with('warning','You Already Voted for this Election');
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
        return back()->with('success','Your valuable vote was successfully submitted');
    }

    public function edit($id)
    {
        $election = Election::find($id);
        return view('voter.election',compact('election'));
    }

    public function update(Request $request, Voter $voter)
    {
        //
    }

    public function destroy(Voter $voter)
    {
        //
    }
}
