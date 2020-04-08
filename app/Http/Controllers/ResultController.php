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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
          'title' => 'Area::Winner',
          'elections' => Election::where('status',1)->get()
        ];

        return view('results.index')->with($data);
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
        $users = '';
        $ids = [];
        $candidates = Candidate::where('election_id',$id)->get();
        foreach ($candidates as $key => $candidate) {
            $ids[] = $candidate->user_id;
        }
        if($ids)
            $users = User::whereIn('id',$ids)->groupBy('area')->get();

        $data = [
          'title' => 'Page',
          'users' => $users
        ];

        return view('results.show')->with($data);
    }

    public function edit($id)
    {
        $users = User::where('area',$id)->where('role','candidate')->get();
        $max = $users->max('candidate.votes');
        $data = [
          'title' => 'Page',
          'users' => $users,
          'max' => $max,
          'users_max_vote' => $users->where('candidate.votes', $max),
          'voters' => User::where('area',$id)->where('role','voter')->get(),
        ];

        return view('results.winner')->with($data);
    }
    public function result($id)
    {
        $user_ids=[];
        $candidates = Candidate::where('election_id',$id)->groupBy('area_id')->get();

        foreach ($candidates as $candidate)
        {
            $max_votes = Candidate::where('election_id',$id)
                ->where('area_id',$candidate->area_id)->max('votes');
            $area_winner = Candidate::where('votes',$max_votes)->first();
            $party = Party::where('user_id',$area_winner->user_id)->first();
            if ($party) {
                $party->election_id = $id;
                $seats[$candidate->area_id] = $max_votes;
                $party->seats = $seats;
                $party->count = 1;
                $party->save();
                $user_ids[] = $area_winner;
                unset($seats);
            }
        }

        $parties = Party::whereNotIn('user_id',$user_ids)->where('election_id',$id)->get();
        foreach ($parties as $party)
        {
            $party->election_id = $id;
            $party->count = 1;
            $party->save();
        }
        dd(true);
        return view('results.result');
    }

    public function winner()
    {
//        dd(Carbon::now('Asia/Dhaka')->format('H:i:s'));
        $data = [
          'title' => 'Result::Page',
            'elections' => Election::where('status',1)->get(),
        ];

        return view('results.election-winner')->with($data);
    }
}
