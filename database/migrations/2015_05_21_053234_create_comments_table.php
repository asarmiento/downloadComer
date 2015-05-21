<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('mysql')->create('comments', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('comment');
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
		Schema::connection('mysql')->drop('comments');
	}

}
