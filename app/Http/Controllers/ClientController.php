<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $clients = Clients::all();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'color_scheme_headline' => 'size:7|starts_with:#|nullable',
            'color_scheme_sub_headline' => 'size:7|starts_with:#|nullable',
            'color_scheme_body_copy' => 'size:7|starts_with:#|nullable',
            'color_scheme_accent' => 'size:7|starts_with:#|nullable',
        ]);

        $imageName = time().'.'.$request->logo->extension(); 

        $validatedData['logo'] = $imageName;

        $show = Clients::create($validatedData);

        $request->logo->move(public_path('uploads/logos'), $imageName);
   
        return redirect('/dashboard/clients')->with('success', 'Client was successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Clients::findOrFail($id);

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'color_scheme_headline' => 'size:7|starts_with:#|nullable',
            'color_scheme_sub_headline' => 'size:7|starts_with:#|nullable',
            'color_scheme_body_copy' => 'size:7|starts_with:#|nullable',
            'color_scheme_accent' => 'size:7|starts_with:#|nullable',
        ]);

        if ($request->logo) {
            $imageName = time().'.'.$request->logo->extension(); 
            $validatedData['logo'] = $imageName;
            $request->logo->move(public_path('uploads/logos'), $imageName);
        }

        Clients::whereId($id)->update($validatedData);

        return redirect('/dashboard/clients')->with('success', 'Client Data was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Clients::findOrFail($id);
        $client->delete();

        return redirect('/dashboard/clients')->with('success', 'Client was successfully deleted');
    }
}
