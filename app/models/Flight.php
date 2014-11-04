<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Flight extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
        /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'flights';
        //public $timestamps = false;
                
        public static $rules = [
            'date' => 'required',
            'from_place' => 'required',
            'dep_time' => 'required',
            'to_place' => 'required',
            'arr_time' => 'required',
            'ac_type' => 'required'
        ];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
