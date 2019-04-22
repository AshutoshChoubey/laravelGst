<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWorkshopDettail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('reference');
            $table->string('company');
            $table->string('gst_no');
            $table->string('mobile');
            $table->string('landline');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('pin');
            $table->string('vehicle_reg_number');
            $table->string('model_year');
            $table->string('company_name');
            $table->string('model_number');
            $table->string('vin');
            $table->string('reg_number');
            $table->string('odometer_reading');
            $table->string('color');
            $table->string('fuel_type');
            $table->string('engine_number');
            $table->string('key_number');
            $table->string('due_in');
            $table->string('due_out');
            $table->string('status');
            $table->string('advisor');
            $table->string('notes');           
            $table->SoftDeletes();
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
        Schema::dropIfExists('workshops');
    }
}
