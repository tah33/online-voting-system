<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Party;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $min = Carbon::now()->subYear(18);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required'],
            'nid' => 'required|regex:/\+?[1-9][0-9]{9}\b/|min:10|unique:users,nid',
            'phone' => ['required','max:14','min:11','unique:users,phone'],
            'area' => ['required'],
            'image' => ['nullable','required'],
            'gender' => ['required'],
            'dob' => "required|date|before:$min",
            'party' => ['required_if:role,==,candidate'],
            'symbol' => ['required_if:role,==,candidate'],
            'symbol_name' => ['required_if:role,==,candidate'],

        ]);
    }

    protected function create(array $data)
    {
        $request = app('request');
     if ($request->hasFile('image')) {
            $file=$request->File('image');
            $ext=$request->username.".".$file->clientExtension();
            $path = public_path(). '/images/';
            $file->move($path,$ext);
        }
        $symbol='';
        if ($request->hasFile('symbol')) {
            $file=$request->File('symbol');
            $symbol=$request->email.".".$file->clientExtension();
            $path = public_path(). '/images/';
            $file->move($path,$symbol);
        }

        $user =  User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'nid' => $data['nid'],
            'phone' => $data['phone'],
            'area' => $data['area'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'image' => $ext,
        ]);
        if ($request->role == 'candidate') {
            Party::create([
                'name' =>$data['party'],
                'user_id' =>$user->id,
                'symbol' =>$symbol,
                'symbol_name' =>$data['symbol_name']
            ]);

        }
            return $user;
        
    }
}
