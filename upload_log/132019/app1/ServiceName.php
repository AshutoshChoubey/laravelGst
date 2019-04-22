<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceName extends Model
{
    use SoftDeletes;
	protected $guarded = ['_token','id', 'created_at', 'updated_at','deleted_at'];
	protected $dates = ['deleted_at'];
	public function Service()
    {
        return $this->belongsTo('App\Service');
    }
}
