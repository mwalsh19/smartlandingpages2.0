<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;

class EventListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();

        return view('sitepages.events', compact('events'));
    }
}
