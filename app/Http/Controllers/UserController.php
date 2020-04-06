<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Users::Page',
            'users' => User::all()->except(1)
        ];

        return view('users.index')->with($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*    public function create()
        {
            return view('users.create');
        }
    */
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /*    public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'username' => 'required|unique:users,username',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ]);
            $role=Role::where('name','member')->first();
            $user->roles()->attach($role);
            return redirect('users');
        }
    */
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'title' => 'User::Profile',
            'user' => User::find($id)
        ];

        return view('users.show')->with($data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    /*    public function edit($id)
        {
            //$this->authorize('update', User::class);
            $user = User::find($id);
            return view('users.edit', compact('user'));
        }
    */
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    /*    public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'username' => "required",
                'password' => 'nullable|confirmed|min:6',
            ]);
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            if($request->password){
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return redirect('users');
        }
        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete($id);

        Toastr::success('Users Blocked Successfully', 'Success!');
        return back();
    }

    public function blockUsers()
    {
        $data = [
            'title' => 'BlockedUsers::Page',
            'users' => User::onlyTrashed()->get()
        ];

        return view('users.blockUsers')->with($data);
    }

    public function unblock($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();

        Toastr::success('Users UnBlocked Successfully', 'Success!');
        return back();
    }
}
