<?php

class FlightsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            If (Auth::check()) { 
            $flights = Flight::where('fc_user', '=', (Auth::user()->id))->get();

            return View::make('flights/index',['flights'=> $flights]);
            }
            
            else { 
            //return View::make('sessions/create')->with('createFlight');
            Session::put('intent', 'View Flights');
            //return Redirect::action('SessionsController@create',array('createFlight')); 
            return Redirect::action('SessionsController@create');
            } 
            
        }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
        /**
         * only allow to create if the users is logged in
         */
                 
        public function create()
                
        {
           If (Auth::check()) {
            return View::make('flights/create');
           }
        
           
           else { 
            //return View::make('sessions/create')->with('createFlight');
            Session::put('intent', 'Create a Flight');
            //return Redirect::action('SessionsController@create',array('createFlight')); 
            return Redirect::action('SessionsController@create');
            } 
        
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
            
            $validation = Validator::make(Input::all(), Flight::$rules);
                
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
                }
                
            $flight = new Flight;
            $flight->date = Input::get('date');
            $flight->ac_type = Input::get('ac_type');
            $flight->from_place = Input::get('from_place');
            $flight->dep_time = Input::get('dep_time');
            $flight->to_place = Input::get('to_place');
            $flight->arr_time = Input::get('arr_time');
            $flight->fc_user = Auth::user()->id;
            $flight->save();
            
            //return Redirect::route('flights.index');
            return "flight updated successfully";
            
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
        {
           $flight = Flight::whereid($id)->first();
           return View::make('flights/show',['flight'=> $flight]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return 'update..really?';
                
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            
	//return Input::get('id');
        return $id;
            
        
//        $flight = Flight::whereid($id)->first();
//        dd($flight);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return 'delete..really?';
	}


}
