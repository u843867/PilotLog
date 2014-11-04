<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('flights', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->date('date');
                        $table->string('ac_type');
                        $table->string('from_place');
                        $table->time('dep_time');
                        $table->string('to_place');
                        $table->time('arr_time');
                        $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('flights', function(Blueprint $table)
		{
			$table->drop('flights');
		});
	}

}
