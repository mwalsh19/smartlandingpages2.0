<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApplicantRequest;
use App\Applicants;

class ApplicantAPIController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Applicants::all();
    }
 
    public function show($id)
    {
        $applicant = Applicants::find($id);
        if ($applicant) {
        	return response()->json($applicant, 200);
        }
        return response()->json([
                'data' => 'Resource not found'
            ], 404);
    } 

    public function store(ApplicantRequest $request)
    {
        $applicant = Applicants::create($request->all());
        
        return response()->json($applicant, 201); 
    }

    public function update(Request $request, $id)
    {
        $applicant = Applicants::findOrFail($id);
        $applicant->update($request->all());
 
        return response()->json($applicant, 200);
    }

    public function delete(Request $request, $id)
    {
        $applicant = Applicants::findOrFail($id);
        $applicant->delete();

        return response()->json(null, 204);
    }
}
