<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
        

        
	public function create()
        /*first check whether user is logged in already
        * if so, direct to admin page.
        */
        {
        if (Auth::check()) {
            return Redirect::to('/admin'); // redirect to admin if auth true
        }
        else {
	return View::make('Sessions/create');//send to login form if auth fails
        }
        
        }   


	/**
	 * authenticate a login attempt
	 *
	 * @return Response
	 */
	public function store()
	{
            if (Auth::attempt(Input::only('email','password')))
            {
                //return 'Welcome '. Auth::user()->username;
                /* if user was routed because they attempted a task that
                 * required login, now I want to route them to their intended
                 * page.
                 */
                $value = Session::get('intent');
                
                if ($value === 'Create a Flight')
                {
                    Session::forget('intent');
                    return View::make('flights/create');    
                }
                
                elseif ($value === 'View Flights')
                {
                    Session::forget('intent');
                    return Redirect::route('flights.index');   
                }
                
                else {    
                return Redirect::to('/admin');
                }
            }
       
            return Redirect::back()->withInput();
        }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
	Auth::logout();
        return Redirect::route('sessions.create');
	}


}
