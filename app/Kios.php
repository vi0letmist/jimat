<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kios extends Model
{
    protected $guard = 'admin';
	protected $table = 'kios';
	public $fillable = ['id_kios','nama_kios','nama_pemilik','password','email','no_hp','alamat','status_buka','longitude','latitude','rating','id_admin'];
	protected $primaryKey='id_kios';
	public $timestamps= false;
}
