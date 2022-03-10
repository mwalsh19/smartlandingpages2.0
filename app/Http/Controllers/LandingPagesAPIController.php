<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LandingPages;

class LandingPagesAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function show($path)
    {
    	$landingPageData = [];

    	$landingPage = $landingPage = DB::table('landing_pages')
            ->where('path', $path)
            ->get();

        if (count($landingPage) > 0) {
 
        	$client = DB::table('clients')
	            ->where('id', $landingPage[0]->client_id)
	            ->get(); 

	        $template = DB::table('templates')
	            ->where('id', $landingPage[0]->template_id)
	            ->get(); 

            $publisher = DB::table('publishers')
                ->where('id', $landingPage[0]->publisher)
                ->get(); 

	    	$landingPageData['landingPage'] = $landingPage[0];
	    	$landingPageData['client'] = $client[0];
	    	$landingPageData['template'] = $template[0];
            $landingPageData['publisher'] = $publisher[0];

        	return response()->json($landingPageData, 200);
        }
        return response()->json([
                'data' => 'Resource not found'
            ], 404);
    } 
}

 