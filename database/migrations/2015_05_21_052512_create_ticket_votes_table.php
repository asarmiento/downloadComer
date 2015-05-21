<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('mysql')->create('ticket_votes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
                        $table->foreign('user_id')->references('id')->on('users');
			$table->integer('ticket_id')->unsigned();
                        $table->foreign('ticket_id')->references('id')->on('tickets');
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
		Schema::connection('mysql')->drop('ticket_votes');
	}

}
