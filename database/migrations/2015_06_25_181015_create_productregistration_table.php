<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductregistrationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productregistration', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('type');
			$table->string('method');
			$table->text('descp');
			$table->double('rate',15,2);
			$table->integer('weight');
			$table->string('stored_pkgs');
			$table->string('mode');
			$table->integer('length');
			$table->integer('width');
			$table->integer('height');
			$table->integer('cft');
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
		Schema::drop('productregistration');
	}

}
