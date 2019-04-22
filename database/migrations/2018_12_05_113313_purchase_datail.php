<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseDatail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplier_name');
            $table->string('bill_num')->nullable();
            $table->date('bill_date')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('model_number')->nullable(); 
            $table->string('hsn')->nullable();
            $table->float('unit_price',10,2)->nullable();
            $table->float('quantity',10,2)->nullable();
            $table->float('gst',10,2)->nullable();
            $table->float('discount',10,2)->nullable();
            $table->float('total_amount',10,2)->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
