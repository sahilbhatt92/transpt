<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sno');
			$table->string('name');
			$table->string('size');
			$table->integer('weight');
			$table->double('price', 15, 2);
			$table->text('remarks');
			$table->integer('product_id');
			$table->integer('brand_id');
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
		Schema::drop('product_detail');
	}

}
