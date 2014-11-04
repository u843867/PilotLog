<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	$users = User::all();
        
        return View::make('users/index',['users'=> $users]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	return View::make('users/create');
	}
	


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            
            /* explain code:
             * create a Validator i.e.make (assign object to $validation variable so we can reference it).
             * Instantiate it with all the data that's in the Input class.  Tell it the rules to validate.
             * so, 2 things are send to the object - (1) all the inputs (2) a set of rules
             */
            
            $validation = Validator::make(Input::all(), User::$rules);
                
                /*validator has a method called fails that returns a boolean
                 * if validation fails
                 */ 
                
                if ($validation->fails())
                {
                    /* use back method of the Redirect class to return to the 
                     * previous URI (the create View in this case) and pass 2 things:
                     *      - Input variables
                     *      - Error data, which is the data inside the $validation object
                     * 
                     * data is passed with the 'with' command
                     * 
                     * the withInput() is an array which is sent in the redirect
                     * 
                     * the withError is an array (called Errors) which is sent  in the redirect
                     * it contains the validation object messages. 
                     */   
                   return Redirect::back()->withInput()->withErrors($validation->messages());
                    //return View::make('users/create')->withErrors($validation->messages());
                    //return ('failed');
                }
	
            $user = new User;
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->email = Input::get('email');
            $user->save();
            
            return Redirect::route('users.index');
            
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
        {
           $user = User::whereUsername($username)->first();
           return View::make('users/show',['user'=> $user]);
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
	public function update($username)
	{
	$users = User::whereUsername($username)->first();
        
        return View::make('users.show',['users'=> $users]);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
