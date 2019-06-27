<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $guard = 'admin';
	protected $table = 'produk_koperasi';
	public $fillable = ['id_produkkoperasi','gambar','nama_produk','id_kategori'];
	protected $primaryKey='id_produkkoperasi';
	public $timestamps = false;
}
