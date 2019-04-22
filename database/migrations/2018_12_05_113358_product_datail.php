<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductDatail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('model_number')->nullable(); 
            $table->string('hsn')->nullable();
            $table->float('unit_price',10,2)->nullable();
            $table->float('gst',10,2)->nullable();
            $table->float('stock_in',10,2)->nullable();
            $table->float('stock_out',10,2)->nullable();
            $table->float('stock_available',10,2)->nullable();
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
        Schema::dropIfExists('products');
    }
}
