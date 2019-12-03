<?php

namespace App\Http\Controllers;

use App\Area;
use App\User;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function area($area)
    {
        $area = Area::find($area);
        $max = $area->users->max('candidate.votes');
        $users_max_vote = $area->users->where('candidate.votes', $max);
        $voters = User::where('area',$area)->where('role','voter')->get();
        $pdf = PDF::loadView('pdf.area',compact('area','max','users_max_vote','voters'));
        return $pdf->stream("{$area->name}.pdf");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $users = User::all()->except(1);
        $pdf = PDF::loadView('pdf.users',compact('users'))->setPaper($customPaper, 'landscape');
        return $pdf->stream("users.pdf");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function voter()
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $users = User::where('role','voter')->get();
        $pdf = PDF::loadView('pdf.voters',compact('users'))->setPaper($customPaper, 'landscape');
        return $pdf->stream("users.pdf");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function candidate()
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $users = User::where('role','candidate')->get();
        $pdf = PDF::loadView('pdf.candidates',compact('users'))->setPaper($customPaper, 'landscape');
        return $pdf->stream("users.pdf");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
}
