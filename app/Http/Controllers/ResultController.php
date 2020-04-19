<?php

namespace App\Http\Controllers;

use App\Seat;
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
            'elections' => Election::where('status', 1)->get()
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
        $candidates = Candidate::where('election_id', $id)->get();
        foreach ($candidates as $key => $candidate) {
            $ids[] = $candidate->user_id;
        }
        if ($ids)
            $users = User::whereIn('id', $ids)->groupBy('area_id')->get();

        $data = [
            'title' => 'Page',
            'users' => $users
        ];

        return view('results.show')->with($data);
    }

    public function edit($id)
    {
        $users = User::where('area_id', $id)->where('role', 'candidate')->get();
        $max = $users->max('candidate.votes');
        $data = [
            'title' => 'Page',
            'users' => $users,
            'max' => $max,
            'users_max_vote' => $users->where('candidate.votes', $max),
            'voters' => User::where('area_id', $id)->where('role', 'voter')->get(),
        ];

        return view('results.winner')->with($data);
    }

    public function winner()
    {
//        dd(Carbon::now('Asia/Dhaka')->format('H:i:s'));
        $data = [
            'title' => 'Result::Page',
            'elections' => Election::where('status', 1)->get(),
        ];

        return view('results.election-winner')->with($data);
    }

    public function result($id)
    {
        /*$user_ids = $votes = [];
        $seat = 1;

        $candidates = Candidate::where('election_id', $id)->groupBy('area_id')->get();

        foreach ($candidates as $candidate)
        {
            $max_votes = Candidate::where('election_id',$id)
                ->where('area_id',$candidate->area_id)->max('votes');
            $area_winner = Candidate::where('votes',$max_votes)->first();
            $area_candidates = Candidate::where('user_id',$area_winner->user_id)->where('election_id',$id)->where('votes',$max_votes)->get();

            foreach ($area_candidates as $area_candidate) {
                $party = Party::where('user_id',$area_candidate->user_id)->first();
                $party->election_id = $id;
                $party->seats = $seat;
                $party->count = 1;
                $party->save();
                $user_ids[] = $area_winner->user_id;
                $seat++;
            }
            $seat = 1;
        }
        $loose_parties = Party::whereNotIn('user_id', $user_ids)->where('election_id', $id)->get();
        foreach ($loose_parties as $party) {
            $party->count = 1;
            $party->seats = 0;
            $party->save();
        }
        $parties = Party::where('election_id', $id)->get();


        $data = [
            'title' => "Result::Declaration",
            'parties' => $parties,
//            'candidates' => $candidates,
        ];*/

        /* $seat = Party::where('election_id', $id)->orderBy('id', 'desc')
             ->max('seats');
         $parties = Party::selectRaw('*, sum(seats) as seats')->where('election_id', $id)
             ->groupBy('name')->get();
         $winner = Party::where('election_id', $id)->orderBy('id', 'desc')
             ->where('seats', $seat)->first();
         $candidates = Candidate::where('election_id', $id)->groupBy('area_id')->get();

         if ($parties->last()->seat == 0) {
             foreach ($candidates as $key => $candidate) {
                 // $areas [] = $candidate->area;
                 $max_vote = Candidate::where('election_id', $id)
                     ->where('area_id', $candidate->area_id)->max('votes');

                 $areaWinner = Candidate::where('votes', $max_vote)
                     ->where('election_id', $id)
                     ->where('area_id', $candidate->area_id)->first();

                 $party = Party::where('user_id', $candidate->user_id)
                     ->where('election_id', $candidate->election_id)->latest()->first();
                 if (!empty($party)) {
                     $count = 1;
                     $party->seats = $count;
                     $party->count = 1;
                     $party->save();
                     $count++;
                 }
                 $looserparties = Party::where('user_id', '!=', $candidate->user_id)
                     ->where('election_id', $id)->orderBy('id', 'desc')->get();
                 foreach ($looserparties as $key => $party) {
                     $party->seats += 0;
                     $party->count = 1;
                     $party->save();
                 }
                 // $looserparties = Party::where('user_id','!=',$candidate->user_id)
                 //                 ->where('election_id',$id)->orderBy('id','desc')->get();
                 //                 foreach ($looserparties as $key => $party) {
                 //                     $party->seats += 0;
                 //                     $party->save();
                 //                 }
             }
         }
        */
        $data = [
            'title' => "Result::Page",
            'parties' => Seat::where('election_id', $id)->groupBy('party_id')->selectRaw('sum(seat) as seats,election_id,party_id')->get(),
        ];
        if (count($data['parties']) > 0) {

            $results = $data['parties']->where('seat', $data['parties']->max('seat'));

            foreach ($results as $result)
                $names[] = $result->party->name;

            if (count($results) > 1)
                $winner = $names[array_rand($names)];
            else
                $winner = $data['parties']->where('seats', $data['parties']->max('seats'))->first()->party->name;

            $election = Election::find($id);
            if(empty($election->winner)) {
                $election->winner = $winner;
                $election->save();
            }
            $data = [
              'election' => $election,
            ];
        }

        return view('results.result')->with($data);
    }

    public function resultFind(Request $request)
    {
        $output = '';
        $count = 1;
        $ids = $userElections = [];

        if ($request->name)
            $elections = Election::where('name', 'like', '%' . $request->name . '%')->where('status', 1)->get();
        else
            $elections = Election::where('status', 1)->get();

        foreach ($elections as $election) {
            foreach ($parties = Party::where('election_id', $election->id)->groupBy('name')->selectRaw('sum(seats) as seats, name,election_id')->get() as $key => $party) {
                $key += 1;
                $output .= "<tr>
                              <td>{$key}</td>
                                    <td>{$party->name}</td>
                                    <td>{$party->seats}</td>
                                    ";
                if ($count != 0) {
                    $output .= '<td rowspan="' . count($election->parties) . '">' . count(($party->election->candidates->groupBy('area_id'))) . '</td>
                                <td rowspan="' . count($election->parties) . '">' . $election->parties->where('seats', $election->parties->max('seats'))->first()->name . '</td>
                                <td rowspan="' . count($election->parties) . '">' . $election->parties->first()->election->name . '</td>
                                </tr>';
                }
                $count = 0;

            }
        }
        return $output;
    }
}
