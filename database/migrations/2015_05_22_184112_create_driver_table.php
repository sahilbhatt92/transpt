<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('license');
			$table->text('address');
			$table->string('contact');
			$table->string('father_name');
			$table->string('g_name');
			$table->text('g_addr');
			$table->string('g_phone');
			$table->string('g_photo');
			$table->string('license_photo');
			$table->string('photo');
			$table->date('license_date');
			$table->integer('user_id');
			$table->integer('branch_id');
			$table->integer('company_id');
			$table->integer('account_year_id');
			$table->nullableTimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver');
	}

}
