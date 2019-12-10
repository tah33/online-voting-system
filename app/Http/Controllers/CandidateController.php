<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Election;
use App\User;
use App\Party;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
class CandidateController extends Controller
{
    public function index()
    {
        $users='';
        $ids=[];
        $elections = Election::where('status',1)->get();
        foreach ($elections as $key => $election) {
        foreach ($election->candidates as $candidate)
            $ids [] = $candidate->user_id;
        }
        if(!empty($ids))
            $users = User::whereIn('id',$ids)->orderBy('area','asc')->get();
        return view('candidate.index',compact('elections'));
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request,$id)
    {
        $canidate_exist = Candidate::where('user_id',Auth::id())
                        ->where('election_id',$id)->exists();
        if ($canidate_exist) {
            return back()->with('error','You are alaredy Applied');
        }
        $candidate = new Candidate;
        $candidate->user_id = Auth::id();
        $candidate->election_id = $id;
        $candidate->area = Auth::user()->area;
        $candidate->save();
        return back()->with('success','Succesfully Your application has been sent');
    }

    public function show($id)
    {
        $candidate = Candidate::withTrashed()->find($id);
        if($candidate->trashed())
        {
            $candidate->restore();
        }
        $candidate->status=1;
        $candidate->save();
        $party = Party::where('user_id',$candidate->user_id)->latest()->first();
        $party->election_id = $candidate->election_id;
        $party->save();
        return back()->with('success','Candidate Approved Succesfully');
    }


    public function edit(Candidate $candidate)
    {
        //
    }

    public function update(Request $request, Candidate $candidate)
    {
        //
    }

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
