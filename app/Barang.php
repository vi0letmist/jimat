<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $guard = 'admin';
	protected $table = 'produk_koperasi';
	public $fillable = ['gambar','nama_produk'];
}
