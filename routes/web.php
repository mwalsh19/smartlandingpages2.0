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

// basic routes 
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('sitepages.about');
})->name('about');
 
Route::get('/eventlist', 'EventListController@index')->name('eventlist');
// basic routes end

// advanced routes

// specify multiple routes
Route::resource('events', 'EventController');
Route::resource('contactMessages', 'ContactController')->middleware('verified');
Route::get('/contactMessages/view/{id}', 'ContactController@view')->name('contactMessages.view')->middleware('verified');
Route::resource('users', 'UsersController')->middleware('verified');



Route::resource('profile', 'ProfileController')->middleware('verified');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('verified');

Route::get('/contact', 'ContactController@show')->name('contact'); 
Route::post('/contact', 'ContactController@contactMailSend')->name('contact.store'); 


/*Route::get('/events/{id}', function ($id) {
    return 'User '.$id;
});*/

Route::get('/schedule/{name?}', function ($name = 'All') {
    return $name . ' schedules today.';
});
// advanced routes end

Auth::routes(['verify' => true]);

// misc routes
// only for routes that only need a view page with nothing special
Route::view('/welcome', 'sitepages.welcome')->name('welcome');
Route::view('/terms-conditions', 'legal.terms');
Route::view('/privacy-policy', 'legal.policy');


Route::redirect('/main', '/'); // for 302 redirect
// Route::permanentRedirect('/here', '/there'); // for 301 redirect

// default is the 404 view
Route::fallback(function () {
    //
});

Route::get('/home', 'HomeController@index')->name('home');

// permissions
/*Route::group(['middleware' => ['auth']], function() {
	Route::resource('roles','UserManagement\RoleController');
	Route::resource('users','UserManagement\UserController');
});*/
Route::resource('roles-permissions', 'RolePermissionAssignController')->middleware('verified');


Route::any('{catchall}', 'PageController@notfound')->where('catchall', '.*');
