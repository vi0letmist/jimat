<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kios extends Model
{
    protected $guard = 'admin';
	protected $table = 'kios';
	public $fillable = [''];
}
