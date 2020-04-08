<?php

namespace App\Http\Controllers;

use App\Social;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Social::Activities',
            'socials' => Social::where('user_id',Auth::id())->get(),
        ];
        return view('socials.index')->with($data);
    }


    public function create()
    {
        $data = [
            'title' => 'Social::Activities',
        ];
        return view('socials.create')->with($data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'org_name' => 'required',
            'title' => 'required',
        ]);

        $social = new Social();
        $social->organization_name = $request->org_name;
        $social->title = $request->title;
        $social->description = $request->description;
        $social->user_id = Auth::id();
        $social->save();

        Toastr::success('Successfully Added to Your Profile','Success!');
        return back();
    }


    public function show(Social $social)
    {
        //
    }


    public function edit(Social $social)
    {
        $data =[
            'title' => 'Social:Edit',
            'social' => $social,
        ];
        return view('socials.edit')->with($data);
    }


    public function update(Request $request, Social $social)
    {
        $request->validate([
            'org_name' => 'required',
            'title' => 'required',
        ]);

        $social->update($request->all());

        Toastr::success('Successfully Added to Your Profile','Success!');
        return back();
    }


    public function destroy(Social $social)
    {
        //
    }
}
