<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('applicants', 'ApplicantAPIController@index');
Route::get('applicants/{id}', 'ApplicantAPIController@show');
Route::post('applicants', 'ApplicantAPIController@store');
Route::put('applicants/{id}', 'ApplicantAPIController@update');
Route::delete('applicants/{id}', 'ApplicantAPIController@delete');

Route::get('landing-page/{path}', 'LandingPagesAPIController@show');
