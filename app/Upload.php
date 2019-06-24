<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
	// public function users()
	// {
	// 	return $this->belongsToMany('App\User');
	// }
	
	protected $guard = 'admin';
	protected $table = 'uploads';
	//public $fillable = ['image', 'name', 'price', 'unit'];
}
