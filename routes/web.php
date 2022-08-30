<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// default to login screen
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('verified');
Route::resource('dashboard/users', 'UsersController')->middleware('verified');
Route::get('users/change-password', 'UsersController@changePassword')->name('change.password');
Route::post('users/change-password', 'UsersController@changePasswordStore')->name('change.store');

Route::resource('dashboard/clients', 'ClientController')->middleware('verified');
Route::resource('dashboard/templates', 'TemplateController')->middleware('verified');
Route::resource('dashboard/applicants', 'ApplicantController')->middleware('verified');
Route::post('dashboard/applicants/tenstreet/{id}', 'ApplicantController@tenstreet')->middleware('verified')->name('applicants.tenstreet');
Route::resource('dashboard/publishers', 'PublisherController')->middleware('verified');
Route::post('dashboard/landing-pages/clone/{id}', 'LandingPagesController@clone')->middleware('verified')->name('landing-pages.clone');
Route::resource('dashboard/landing-pages', 'LandingPagesController')->middleware('verified');
//Route::resource('dashboard/activity', 'ActivityController')->middleware('verified');
//Route::resource('dashboard/profile', 'ProfileController')->middleware('verified');
Route::resource('dashboard/roles-permissions', 'RolePermissionAssignController')->middleware('verified');

Route::view('/terms-conditions', 'legal.terms');
Route::view('/privacy-policy', 'legal.policy');

Auth::routes(['verify' => true]);

// default is the 404 view
Route::fallback(function () {
    //
});

Route::any('{catchall}', 'PageController@notfound')->where('catchall', '.*');