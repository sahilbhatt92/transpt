<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branches', function(Blueprint $table)
		{

			$table->increments('id');
			$table->string('name');
			$table->string('code');
			$table->string('cperson')->nullable();
			$table->string('type')->nullable();
			$table->text('address')->nullable();
			$table->string('telephone')->nullable();
			$table->string('mobile')->nullable();
			$table->string('cst')->nullable();
			$table->string('pin')->nullable();
			$table->string('email')->nullable();
			$table->string('agency')->nullable();
			$table->string('pan');
			$table->string('tin');
			$table->integer('state_id');
			$table->integer('district_id');
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
		Schema::drop('branches');
	}

}
