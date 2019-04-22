<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;

class SubmitedPartDetail extends Model
{
    protected $table="submiter_part_details";
    use SoftDeletes;
	// protected $table = 'patient_details';
	protected $guarded = ['_token','id', 'created_at', 'updated_at','deleted_at'];
	// protected $guarded = ['id', 'created_at', 'updated_at','deleted_at'];
	protected $dates = ['deleted_at'];
    // public function workshop()
    // {
    //     return $this->belongsTo('App\Workshop');
    // }
}
