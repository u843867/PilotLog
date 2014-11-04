<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'FlightsController@index');


Route::resource('users', 'UsersController');

//if URI is /users this routes directly to the index method 
//of the UserController
//Route::get('users', 'UsersController@index');

Route::resource('flights', 'FlightsController');

    
Route::resource('sessions', 'SessionsController');


//override the resourceful route to this SessionsController method create
Route::get('login', 'SessionsController@create');
//override the resourceful route to this SessionsController method destory
Route::get('logout', 'SessionsController@destroy');



Route::get('admin', function()
{
    
    return "admin page";
    
})/*->before('auth')*/; 

HTML::macro('clever_link', function($route, $text) {	
	if( Request::path() == $route ) {
		$active = "class = 'active'";
	}
	else {
		$active = '';
	}
 
  return '<li ' . $active . '>' . link_to($route, $text) . '</li>';
});

