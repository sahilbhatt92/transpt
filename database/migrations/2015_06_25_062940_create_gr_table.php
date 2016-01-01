<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gr', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('gr_no');
			$table->integer('user_id');
			$table->integer('branch_id');
			$table->integer('company_id');
			$table->integer('account_year_id');
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
		Schema::drop('gr');
	}

}
