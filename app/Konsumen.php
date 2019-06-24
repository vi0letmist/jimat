<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    protected $guard = 'admin';
	protected $table = 'konsumen';
	public $fillable = [''];
}
