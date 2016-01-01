<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('party', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('code');
			$table->string('cperson')->nullable();
			$table->string('type')->nullable();
			$table->text('address')->nullable();
			$table->string('telephone')->nullable();
			$table->string('mobile')->nullable();
			$table->string('tin')->nullable();
			$table->string('pan')->nullable();
			$table->string('email')->nullable();
			$table->string('agency')->nullable();
			$table->boolean('addToAcc')->nullable();
			$table->double('cr_amt', 15, 2);
			$table->double('dr_amt', 15, 2);
			$table->string('group_name');
			$table->string('cst');
			$table->integer('general_head_id');
			$table->integer('state_id');
			$table->integer('district_id');
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
		Schema::drop('party');
	}

}
