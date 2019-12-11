<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
            return back();
        } else {
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('email.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();    
    }

    public function destroy($id)
    {
        //
    }
}
