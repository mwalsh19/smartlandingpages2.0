<?php

namespace App\Http\Controllers;

use App\Applicants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAuth = auth()->user();
        if ($userAuth->getRoleNames()[0] === 'Admin' || $userAuth->getRoleNames()[0] === 'Analyst') {
            $applicants = Applicants::orderBy('created_at', 'desc')->get();
        } else if ($userAuth->getRoleNames()[0] === 'SystemTrans User') {
            $applicants = DB::select('SELECT * FROM applicants WHERE customer = "systemTrans"');
        } else if ($userAuth->getRoleNames()[0] === 'CRST User') {
            $applicants = DB::select('SELECT * FROM applicants WHERE customer = "crst"');
        } else {
            return redirect('/dashboard')->with('error', 'Permission Denied.');
        }

        return view('applicants.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicants::findOrFail($id);
        return view('applicants.view', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicants $applicants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicants $applicants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant = Applicants::findOrFail($id);
        $applicant->delete();

        return redirect('/dashboard/applicants')->with('success', 'Applicant was successfully deleted');
    }
}