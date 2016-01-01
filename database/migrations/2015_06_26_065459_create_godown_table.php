<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGodownTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('godown', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('owner_name');
			$table->string('owner_addr');
			$table->string('godown_type');
			$table->string('type');
			$table->double('rent',15,2);
			$table->double('security',15,2);
			$table->date('validity_date');
			$table->string('insurance_company');
			$table->string('policy_no');
			$table->date('insurance_validity_date');
			$table->integer('user_id');
			$table->integer('party_id');
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
		Schema::drop('godown');
	}

}
