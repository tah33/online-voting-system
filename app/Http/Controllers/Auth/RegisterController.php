<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Party;
use App\Seat;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    protected function validator(array $data)
    {
        $min = Carbon::now()->subYear(18);
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
            'nid' => 'required|regex:/\+?[1-9][0-9]{9}\b/|min:10|unique:users,nid',
            'phone' => 'required', 'max:14', 'min:11', 'unique:users,phone',
            'area' => 'required',
            'gender' => 'required',
            'dob' => "required|date|before:$min",
            'party' => 'required_if:role,==,candidate&party_name,==,null ',
            'party_name' => 'required_if:role,==,candidate&party,==,null ',
            'symbol' => 'required_with:party_name',
            'symbol_name' => 'required_with:party_name|unique:parties,name',
        ]);
    }

    protected function create(array $data)
    {
        $request = app('request');

        $symbol = $ext = '';
        if ($request->hasFile('image')) {
            $file = $request->File('image');
            $ext = $request->username . "." . $file->clientExtension();
            $path = public_path() . '/images/';
            $file->move($path, $ext);
        }

        if ($request->hasFile('symbol')) {
            $file = $request->File('symbol');
            $symbol = $request->symbol_name . "." . $file->clientExtension();
            $path = public_path() . '/images/';
            $file->move($path, $symbol);
        }

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'nid' => $data['nid'],
            'phone' => $data['phone'],
            'area_id' => $data['area'],
            'dob' => Carbon::createFromFormat('m/d/Y', $data['dob']),
            'gender' => $data['gender'],
            'image' => $ext,
        ]);
        if (!empty($data['party_name']) && empty($data['party'])) {
            $party = new Party();
            $party->name = $data['party_name'];
            $party->symbol_name = $data['symbol_name'];
            $party->symbol = $symbol;
            $party->save();
        }

        if ($data['role'] == 'candidate')
            Seat::create([
                'party_id' => empty($data['party']) ? $party->id : $data['party'],
                'user_id' => $user->id,
            ]);

        Toastr::success('Account Has Been Created', 'Success!');
        return back();
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return redirect('login');
    }
}
