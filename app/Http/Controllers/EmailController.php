<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Mail\Password;
use App\User;
use Hash;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            Mail::to($user->email)->send(new Password($user));

            Toastr::success('Successfully Emailed with Info, Check Your Email','Success!');
            return back();
        } else {

            Toastr::error("Couldn't Fid Your Email, Please Tre Again",'Success!');
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Email',
            'user' => User::find($id),
        ];

        return view('email.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();

        Toastr::success('Password was Changed Successfully, You Can Log In Now','Success!');
        return redirect('login');
    }

    public function destroy($id)
    {
        //
    }
}
