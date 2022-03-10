<?php

namespace App\Http\Controllers;

use App\Publishers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublisherController extends Controller
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
        $publishers = Publishers::all();
        return view('publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['publisher'] = Str::lower($request['publisher']);

        $validatedData = $request->validate([
            'publisher' => 'required|max:255',
            'pixel' => 'required|max:255'
        ]);
        $show = Publishers::create($validatedData);
   
        return redirect('/dashboard/publishers')->with('success', 'Publisher was successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function show(Publishers $publishers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publisher = Publishers::findOrFail($id);

        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['publisher'] = Str::lower($request['publisher']);
        
        $validatedData = $request->validate([
            'publisher' => 'required|max:255',
            'pixel' => 'required|max:255'
        ]);
        Publishers::whereId($id)->update($validatedData);

        return redirect('/dashboard/publishers')->with('success', 'Publisher was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = Publishers::findOrFail($id);
        $publisher->delete();

        return redirect('/dashboard/publishers')->with('success', 'Publisher was successfully deleted');
    }
}
