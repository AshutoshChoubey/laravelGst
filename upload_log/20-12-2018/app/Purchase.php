<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;
	// protected $table = 'patient_details';
	protected $guarded = ['_token','id', 'created_at', 'updated_at','deleted_at'];
	protected $dates = ['deleted_at'];
}
