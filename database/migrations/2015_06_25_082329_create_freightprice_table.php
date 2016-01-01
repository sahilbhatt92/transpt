<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightpriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('freightprice', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('from');
			$table->integer('to');
			$table->double('rate', 15, 2);
			$table->integer('party_id');
			$table->integer('truck_id');
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
		Schema::drop('freightprice');
	}

}
