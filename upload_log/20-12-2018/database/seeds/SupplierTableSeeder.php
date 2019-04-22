<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('suppliers')->insert([
        
				'supplier_name'=>str_random(10),
				'mob_num'=>str_random(10),
				'address'=>str_random(10),
				'email'=>str_random(10),
				'gstin'   =>str_random(10),      
           
        ]);
    }
}
