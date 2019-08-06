<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $guard = 'admin';
	protected $table = 'stok';
	public $fillable = ['id_stockkoperasi','gambar','nama_produk','merk','stok','harga_koperasi','id_produkkoperasi','id_kategori','id_admin'];
	protected $primaryKey='id_stockkoperasi';
	public $timestamps = false;
}
