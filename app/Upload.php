<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
	protected $guard = 'admin';
	protected $table = 'uploads';
	public $fillable = ['image', 'name', 'price', 'unit'];
}
