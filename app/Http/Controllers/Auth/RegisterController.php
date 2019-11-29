<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required'],
            'nid' => ['nullable','unique:users,nid','min:10'],
            'phone' => ['required','max:14','min:11','unique:users,phone'],
            'area' => ['required'],
            'image' => ['required'],
        ]);
    }

    protected function create(array $data)
    {
        $request = app('request');
     if ($request->hasFile('image')) {
            $file=$request->File('image');
            $ext=$request->username. " . " .$file->clientExtension();
            $path = public_path(). '/images/';
            $file->move($path,$ext);
        }

        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'nid' => $data['nid'],
            'phone' => $data['phone'],
            'area' => $data['area'],
            'image' => $ext,
        ]);
    }
}
