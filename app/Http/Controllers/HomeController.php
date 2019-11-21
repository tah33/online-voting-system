<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function profile()
    {
    	$user= Auth::user();
    	return view('home.profile',compact('user'));
    }
    public function editProfile($id)
    {
        $user= Auth::user();
        return view('home.profile-form',compact('user'));
    }
    public function updateProfile(Request $request,$id)
    {
        if (Auth::user()->role == 'admin') {
            $request->validate([
            'name' => 'required|string|max:255',
            'username'=>'required|unique:users,username,'.$id,
            'email' => 'required|unique:users,email,'.$id,
        ]);
        }
        else{
        $request->validate([
            'name' => 'required|string|max:255',
            'username'=>'required|unique:users,username,'.$id,
            'email' => 'required|unique:users,email,'.$id,
            'phone' => 'required',
            'address' => 'required',
        ]);
    }
        $user= User::find($id);
        $user->name=$request->name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        if ($request->hasFile('image')) {
            $file=$request->File('image');
            $ext=$request->username. " . " .$file->clientExtension();
            $path = public_path(). '/images/';
            $file->move($path,$ext);
            $user->image=$ext;
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
            Auth::logout();
            return redirect('/');
        }
        else
            return back()->with('error','Your Current Password Doesnot Match');
    }
    public function nid()
    {
        if(empty(Auth::user()->nid)) {
            $user = Auth::user();
            return view('home.nid', compact('user'));
        }
        else{
            /*$alert ='<script language="javascript">
             alert("You already Have an NID")
             </script>';
             If($alert)
                return back();*/
                return '<script type="text/javascript">alert("hello!");</script>';
        }
    }
}