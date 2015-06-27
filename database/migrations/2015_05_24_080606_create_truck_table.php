<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck', function(Blueprint $table) {
            $table->increments('id');
            $table->string('truck_no');
            $table->string('truck_type');
            $table->string('owner_name');
            $table->string('maker_name')->nullable();
            $table->string('chasis_no')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('permit_no')->nullable();
            $table->date('permit_due_date_yr')->default('0000-00-00');
            $table->date('permit_due_date_fyr')->default('0000-00-00');
            $table->date('purchase_date')->default('0000-00-00');
            $table->string('policy_no')->nullable();
            $table->date('road_tax_date')->default('0000-00-00');
            $table->date('fitness_due_date')->default('0000-00-00');
            $table->string('company_name');
            $table->text('address');
            $table->string('city');
            $table->string('permit_photo')->nullable();
            $table->string('rc_copy')->nullable();
            $table->string('rc_copy_photo')->nullable();
            $table->string('insurance')->nullable();
            $table->string('insurance_photo')->nullable();
            $table->string('permit_fyr_photo')->nullable();
            $table->string('road_tax_photo')->nullable();
            $table->string('fitness_photo')->nullable();
            $table->integer('driver_id')->unsigned();
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
        Schema::drop('truck');
    }
}
