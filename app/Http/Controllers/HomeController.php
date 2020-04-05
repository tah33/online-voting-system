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
        if (Auth::user()->role == 'admin') {
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|unique:users,username,' . $id,
                'email' => 'required|unique:users,email,' . $id,
                'image' => 'nullable',
                'phone' => 'nullable',

            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|unique:users,username,' . $id,
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'phone' => 'required|max:14|min:11|unique:users,phone,' . $id,
                'area' => ['required'],
                'image' => ['nullable'],
                'gender' => ['required'],
                'dob' => "required|date|before:$min",
                'party' => "nullable",
                'symbol' => "nullable",
                'symbol_name' => "nullable",
            ]);
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->area = $request->area;
        if ($request->hasFile('image')) {
            $file = $request->File('image');
            $ext = $request->username . "." . $file->clientExtension();
            $path = public_path() . '/images/';
            $file->move($path, $ext);
            $user->image = $ext;
        }
        if ($user->role == 'candidate') {
            $party = Party::find($user->party->id);
            $party->name = $request->party;
            $party->symbol_name = $request->symbol_name;
            if ($request->hasFile('symbol')) {
                $file = $request->File('symbol');
                $symbol = $request->email . "." . $file->clientExtension();
                $path = public_path() . '/images/';
                $file->move($path, $symbol);
                $party->symbol = $symbol;
            }
            $party->save();

        }
        $user->save();
        return redirect('home');
    }

    public function password()
    {
        $data = [
            'user' => Auth::user(),
            'title' => 'Profile::Page'
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

            Toastr::success('Successfully Logged In', 'Success!');
            return view('admin.home')->with($data);

        } elseif (Auth::user()->role == 'candidate') {
            $elections = Election::all();
            $ongoings = Election::whereDate('election_date', '=', Carbon::now())->get();

            Toastr::success('Successfully Logged In', 'Success!');
            return view('candidate.home', compact('elections', 'ongoings'));

        } elseif (Auth::user()->role == 'voter') {
            $ongoings = Election::whereDate('election_date', '=', Carbon::now())->get();
            $elections = Election::all();

            Toastr::success('Successfully Logged In', 'Success!');
            return view('voter.home', compact('ongoings', 'elections'));
        }

    }
}
