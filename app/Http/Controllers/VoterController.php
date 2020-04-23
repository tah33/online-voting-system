<?php

namespace App\Http\Controllers;

use App\Party;
use App\Seat;
use App\Voter;
use App\Election;
use App\User;
use App\Candidate;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function elections()
    {
        $data = [
            'title' => 'Elections::List',
            'elections' => Election::where('status',1)->get()
            ];

        return view('voter.election')->with($data);
    }

    public function index()
    {
        $ids = [];
        $candidates = '';
        $elections = Election::where('status', 1)->get();
        foreach ($elections as $key => $election)
            $ids[] = $election->id;

        if (!empty($ids))
            $candidates = Candidate::where('status', 1)->whereIn('election_id', $ids)->get();

        $data = [
            'title' => 'Voting::Area',
            'elections' => Election::where('status', 1)->whereDate('election_date', Carbon::now('Asia/Dhaka'))->get(),
            'candidates' => $candidates,
        ];

        return view('voter.index')->with($data);
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
        /*   if (Carbon::now('Asia/Dhaka')->format('H:i:s') > Carbon::createFromTime(8, 00, 00, 'Asia/Dhaka')
               && Carbon::now('Asia/Dhaka')->format('H:i:s') == Carbon::createFromTime(16, 00, 00, 'Asia/Dhaka')) {*/
        $vote_getter = Candidate::find($id);

        $voter = Voter::where('user_id', Auth::id())->where('election_id', $vote_getter->election_id)->first();
        if ($voter) {
            if ($voter->wrong_attempt == 1) {
                Auth::logout();
                $user = User::find($voter->user_id);
                $user->delete();
                return redirect('login');
            }

            $voter->wrong_attempt = 1;
            $voter->save();

            Toastr::warning('You Already Voted for this Election', 'Warning!');
            return back();
        } else {
            $voter = new Voter;
            $voter->user_id = Auth::id();
            $voter->candidate_id = $id;
            $voter->election_id = $vote_getter->election_id;
            $voter->save();
        }

        if ($voter->save()) {
            $vote_getter->votes += 1;
            $vote_getter->save();
        }

        $votes = [];

        $candidates = Candidate::where('election_id', $vote_getter->election_id)->where('status', 1)->where('user_id', '!=', $vote_getter->user_id)
            ->where('area_id', $vote_getter->area_id)->get();

        foreach ($candidates as $candidate)
            $votes[] = $candidate->votes;

        $draw_candidates = Candidate::where('election_id', $vote_getter->election_id)->where('status', 1)->where('area_id', $vote_getter->area_id)->get();

        foreach ($draw_candidates as $draw_candidate) {
            if (!empty($votes) && $vote_getter->votes == max($votes)) {
                $party = Seat::where('user_id', $draw_candidate->user_id)->where('election_id', $vote_getter->election_id)->where('seat','>', 0)->latest()->first();
                if ($party) {
                    $party->seat -= 1;
                    $party->save();
                }
            }
        }

        $seat_getter = Seat::where('election_id', $vote_getter->election_id)->where('user_id', $vote_getter->user_id)->where('seat', 0)->latest()->first();

        if ($seat_getter && !empty($votes) && $vote_getter->votes > max($votes)) {
            $seat_getter->seat += 1;
            $seat_getter->save();
//            dd(true);
        }

        $parties = Seat::where('election_id', $vote_getter->election_id)->where('seat', '>=', 1)->where('user_id', '!=', $vote_getter->user_id)->get();

        foreach ($parties as $party) {
            if ($party->user->area_id == $vote_getter->area_id && $vote_getter->votes > max($votes)) {
                $party->seat -= 1;
                $party->save();
//                    dd(false);
            }
        }


        Toastr::success('Your valuable vote was successfully submitted', 'Success!');
        return back();
        /*    }
            Toastr::error('Sorry Deadline is Over', 'Error!');
            return back();*/
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Voter::List',
            'election' => Election::find($id)
        ];

        return view('voter.list')->with($data);
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
