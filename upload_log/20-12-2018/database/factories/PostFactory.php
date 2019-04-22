<?php

use Faker\Generator as Faker;

$factory->define(App\Supplier::class, function (Faker $faker) {
    return [
        $table->increments('id');
            $table->string('supplier_name');
            $table->string('mob_num')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('gstin')->nullable();          
            $table->SoftDeletes();
            $table->timestamps();
    ];
});
