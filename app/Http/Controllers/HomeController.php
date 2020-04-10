<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\User;
use App\Area;
use App\Party;
use App\Election;
use App\Candidate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    public function welcome()
    {
        $data = [
            'voters' => User::where('role', 'voter')->get(),
            'candidates' => User::where('role', 'candidate')->get(),
            'elections' => Election::all(),
            'title' => 'Welcome',
        ];

        return view('welcome')->with($data);
    }

    public function profile()
    {
        $data = [
            'user' => Auth::user(),
            'title' => 'Profile::Page'
        ];

        return view('home.profile')->with($data);
    }

    public function editProfile($id)
    {
        $data = [
            'title' => 'Profile::Page',
            'user' => Auth::user(),
            'areas' => Area::all(),
        ];
        return view('home.profile-form')->with($data);
    }

    public function updateProfile(Request $request, $id)
    {
        $min = Carbon::now()->subYear(18);

            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|unique:users,username,' . $id,
                'email' => 'required|unique:users,email,' . $id,
                'image' => 'nullable',
                'phone' => Auth::user()->role == 'admin' ?'nullable' : 'required|max:14|min:11|unique:users,phone,' . $id,
                'gender' => Auth::user()->role == 'admin' ?'nullable' : 'required',
                'dob' => Auth::user()->role == 'admin' ?'nullable' : "required|date|before:$min",
                'party' => Auth::user()->role == 'candidate' ?'required' : "nullable",
                'symbol' => Auth::user()->role == 'candidate' ?'required' : "nullable",
                'symbol_name' => Auth::user()->role == 'candidate' ?'required' : "nullable",

            ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->hasFile('image')) {
            $file = $request->File('image');
            $ext = $request->username . "." . $file->clientExtension();
            $file->storeAs('images/', $ext);
            $user->image = $ext;
        }
        if ($user->role == 'candidate') {
            $party = Party::where('user_id',Auth::id())->latest()->first();
            $party->name = $request->party;
            $party->user_id = Auth::id();
            $party->symbol_name = $request->symbol_name;

            if ($request->hasFile('symbol')) {
                $file = $request->File('symbol');
                $symbol = $request->symbol_name . "." . $file->clientExtension();
                $file->storeAs('images/', $symbol);
                $party->symbol = $symbol;
            }
            $party->save();

        }
        $user->save();

        Toastr::success('Profile Has been Updated','Success!');
        return back();
    }

    public function password()
    {
        $data = [
            'user' => Auth::user(),
            'title' => 'Change::Password'
        ];
        return view('home.password')->with($data);
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
            'old' => 'required'
        ]);
        $user = User::find($id);
        $old = $request->old;

        if (Hash::check($request->old, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();

            Toastr::success('Your Password Changed Succesfully', 'Success!');
            return back();
        } else {
            Toastr::error("Your Current Password Doesn't Match", 'Error!');
            return back();
        }
    }

    public function home()
    {
        if (Auth::user()->role == 'admin') {
            $data = [
                'title' => 'Admin::Dashboard',
                'voters' => User::where('role', 'voter')->get(),
                'candidates' => User::where('role', 'candidate')->get(),
                'elections' => Election::all(),
                'pending' => Candidate::where('status', 0)->get(),
                'ongoing' => Election::whereDate('election_date', '<=', Carbon::now())->get()
            ];

            return view('admin.home')->with($data);

        } elseif (Auth::user()->role == 'candidate') {

            $data = [
                'title' => 'Candidate::Dashboard',
                'elections' => Election::all(),
                'ongoings' => Election::whereDate('election_date', '=', Carbon::now())->get(),
            ];

            return view('candidate.home')->with($data);

        } elseif (Auth::user()->role == 'voter') {

            $data = [
                'title' => 'Voter::Dashboard',
                'elections' => Election::all(),
                'ongoings' => Election::whereDate('election_date', '=', Carbon::now())->get(),
            ];

            return view('voter.home')->with($data);
        }

    }
}
