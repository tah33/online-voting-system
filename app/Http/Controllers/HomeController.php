<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Area;
use App\Party;
use App\Election;
use App\Candidate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function welcome()
    {
        $voters= User::where('role','voter')->get();
        $candidates= User::where('role','candidate')->get();
        $elections= Election::all();
        return view('welcome',compact('voters','candidates','elections'));
    }
    public function profile()
    {
    	$user= Auth::user();
    	return view('home.profile',compact('user'));
    }
    public function editProfile($id)
    {
        $user= Auth::user();
        $areas = Area::all();
        return view('home.profile-form',compact('user','areas'));
    }
    public function updateProfile(Request $request,$id)
    {
        $min = Carbon::now()->subYear(18);
        if (Auth::user()->role == 'admin') {
            $request->validate([
            'name' => 'required|string|max:255',
            'username'=>'required|unique:users,username,'.$id,
            'email' => 'required|unique:users,email,'.$id,
            'image' => 'nullable',
            'phone' => 'nullable',

        ]);
        }
        else{
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
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
        $user= User::find($id);
        $user->name=$request->name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->area=$request->area;
        if ($request->hasFile('image')) {
            $file=$request->File('image');
            $ext=$request->username. "." .$file->clientExtension();
            $path = public_path(). '/images/';
            $file->move($path,$ext);
            $user->image=$ext;
        }
        if ($user->role == 'candidate') {
            $party = Party::find($user->party->id);
            $party->name = $request->party;
            $party->symbol_name = $request->symbol_name;
        if ($request->hasFile('symbol')) {
            $file=$request->File('symbol');
            $symbol=$request->email."." .$file->clientExtension();
            $path = public_path(). '/images/';
            $file->move($path,$symbol);
            $party->symbol=$symbol;
        }
            $party->save();
        
        }
        $user->save();
        return redirect('home');
    }
    public function password()
    {
        $user=Auth::user();
        return view('home.password',compact('user'));
    }

    public function updatePassword(Request $request,$id)
    {
        $request->validate([
            'password'=>'required|confirmed|min:6',
            'old'=>'required'
        ]);
        $user=User::find($id);
        $old=$request->old;
        if(Hash::check($request->old,$user->password))
        {
            $user->password=bcrypt($request->password);
            $user->save();
            return back()->with('success','Your Password Changed Succesfully');
        }
        else
            return back()->with('error','Your Current Password Doesnot Match');
    }
    public function home()
    {
       if (Auth::user()->role == 'admin') {
           $voters = User::where('role','voter')->get();
           $candidates = User::where('role','candidate')->get();
           $elections = Election::all();
           $pending = Candidate::where('status',0)->get();
           $ongoing = Election::whereDate('election_date','<=',Carbon::now())->get();
           return view('admin.home',compact('voters','candidates','elections','pending','ongoing'));
       }
       elseif (Auth::user()->role == 'candidate') {
           $elections = Election::all();
           $ongoings = Election::whereDate('election_date','=',Carbon::now())->get();
           return view('candidate.home',compact('elections','ongoings'));
       }
       elseif (Auth::user()->role == 'voter') {
           $ongoings = Election::whereDate('election_date','=',Carbon::now())->get();
           $elections = Election::all();
            return view('voter.home',compact('ongoings','elections'));
       }

    }
}
