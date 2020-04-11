<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Election;
use App\Mail\CandidateApprove;
use App\Mail\CandidateReject;
use App\Seat;
use App\User;
use App\Party;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = '';
        $ids = [];
        $elections = Election::where('status', 1)->get();
        /*foreach ($elections as $key => $election) {
        foreach ($election->candidates as $candidate)
            $ids [] = $candidate->user_id;
        }
        if(!empty($ids))
            $users = User::whereIn('id',$ids)->orderBy('area','asc')->get();*/

        $data = [
            'title' => "Candidate::List",
            'elections' => Election::where('status', 1)->paginate(15),
        ];
        return view('candidate.index')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $candidate_exist = Candidate::where('user_id', Auth::id())
            ->where('election_id', $id)->exists();

        if ($candidate_exist) {
            Toastr::error('You are already Applied', 'Error!');
            return back();
        }
        $seats = Seat::where('party_id',Auth::user()->seat->party_id)->where('user_id','!=',Auth::id())->latest()->get();

        foreach ($seats as $seat) {
            if ($seat->user->area_id == Auth::user()->area_id)
            {
                Toastr::error('SomeOne Already Stand from Your Party', 'Error!');
                return back();
            }
        }

        $candidate = new Candidate;
        $candidate->user_id = Auth::id();
        $candidate->election_id = $id;
        $candidate->area_id = Auth::user()->area_id;
        $candidate->save();

        Toastr::success('Your application has been sent Successfully', 'Success!');
        return back();
    }

    public function show($id)
    {
        $candidate = Candidate::withTrashed()->find($id);
        if ($candidate->trashed()) {
            $candidate->restore();
        }
        $candidate->status = 1;
        $candidate->save();

        $seat = Seat::where('user_id', $candidate->user_id)->latest()->first();
        $seat->election_id = $candidate->election_id;
        $seat->save();

        $data = ['name' => $candidate->user->name, 'election' => $candidate->election->name, 'date' => $candidate->election->election_date];
        Mail::to($candidate->user->email)->send(new CandidateApprove($data));
        Toastr::success('Candidate Has been approved and notified via Email', 'Success!');
        return back();
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

        $seat = Seat::where('user_id', $candidate->user_id)->latest()->first();
        $seat->election_id = null;
        $seat->save();

        $data = ['name' => $candidate->user->name, 'election' => $candidate->election->name, 'date' => $candidate->election->election_date];
        Mail::to($candidate->user->email)->send(new CandidateReject($data));
        Toastr::success('Candidate Has been rejected and notified via Email', 'Success!');
        return back();
    }

    public function apply()
    {
        $data = [
            'title' => "Voter::Page",
            'applies' => Election::where('status', 1)->whereDate('start_date', '<=', Carbon::now('Asia/Dhaka'))
                ->whereDate('end_date', '>=', Carbon::now('Asia/Dhaka'))->get(),
        ];

        return view('candidate.list')->with($data);
    }

    public function pending()
    {
        $data = [
            'title' => "Pending::Application",
            'applies' => Candidate::where('status', 0)->get(),
        ];

        return view('candidate.pending')->with($data);
    }

    public function reject()
    {
        $data = [
            'title' => "Reject::Application",
            'rejects' => Candidate::onlyTrashed()->get(),
        ];

        return view('candidate.reject')->with($data);
    }

    public function candidate()
    {
        $candidate = $candidates = '';

        $candidate = Candidate::where('user_id', Auth::id())->latest()->first();
        if ($candidate)
            $candidates = Candidate::where('election_id', $candidate->election_id)->get();

        $data = [
            'title' => "Voter::Page",
            'candidate' => Candidate::where('user_id', Auth::id())->latest()->first(),
            'candidates' => Candidate::where('election_id', $candidate->election_id)->get(),
        ];

        return view('candidate.candidates')->with($data);

    }

    public function upcoming()
    {
        $data = [
            'title' => "Voter::Page",
            'upcomings' => Election::whereDate('election_date', '<', Carbon::now())
                ->whereYear('election_date', '=', Carbon::now())->get(),
        ];

        return view('candidate.candidates')->with($data);

    }

    public function candidateFind(Request $request)
    {
        $output = '';
        $ids = $userElections = [];
        if ($request->name)
            $elections = Election::where('name', 'like', '%' . $request->name . '%')->where('status', 1)->get();
        else
            $elections = Election::where('status', 1)->get();

        foreach ($elections as $election) {
            foreach ($election->candidates as $key => $candidate) {
                $key += 1;
                $output .= "<tr>
                              <td>{$key}</td>
                                    <td>{$candidate->user->name}</td>";
                if (!in_array($candidate->area_id, $ids)) {
                    $ids[] = $candidate->area_id;
                    $output .= '<td rowspan="'.count($election->candidates->where('area_id',$candidate->area_id)).'">
                                            ' . $candidate->area->name . '</td>';
                }

                if (!in_array($election->name, $userElections)) {
                    $userElections[] = $election->name;
                    $output .= '<td rowspan="'.count($election->candidates).'">' . $election->name . '</td>
                                <td rowspan="'.count($election->candidates).'">' . $election->election_date . '</td>
                                </tr>';
                }

            }
            $ids = $userElections = [];
        }
        return $output;
    }
}
