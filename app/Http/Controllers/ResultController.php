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

        $seat = Party::where('election_id',$id)->orderBy('id','desc')
            ->max('seats');
        $parties = Party::groupBy('name')->selectRaw('*, sum(seats) as seats')
            ->where('election_id',$id)->get();
        $winner = Party::where('election_id',$id)->orderBy('id','desc')
            ->where('seats',$seat)->first();
        $candidates =Candidate::where('election_id',$id)->groupBy('area')->get();
        if($winner->seat == 0){
            foreach ($candidates as $key => $candidate) {
                // $areas [] = $candidate->area;
                $max_vote = Candidate::where('election_id',$id)
                    ->where('area',$candidate->area)->max('votes');

                $areaWinner = Candidate::where('votes',$max_vote)
                    ->where('election_id',$id)
                    ->where('area',$candidate->area)->first();
                $party = Party::where('user_id',$candidate->user_id)
                    ->where('election_id',$candidate->election_id)->latest()->first();
                if(!empty($party)){
                    $count = 1;
                    $party->seats =  $count;
                    $party->save();
                    $count++;
                }
            }
        }

        $data = [
          'title' => 'Area:Winner',
          'seat' => $seat,
          'parties' => $parties,
          'winner' => $winner,
        ];

        return view('results.result')->with($data);
    }

    public function winner()
    {
        $data = [
          'title' => 'Result::Page',
            'elections' => Election::where('status',1)->get(),
        ];

        return view('results.election-winner')->with($data);
    }
}
