<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    protected $guard = 'admin';
	protected $table = 'konsumen';
	public $fillable = ['id_konsumen','password','nama','email','no_hp','rating','id_admin'];
	protected $primaryKey='id_konsumen';
	public $timestamps = false;
}
