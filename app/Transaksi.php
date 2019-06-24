<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guard = 'admin';
	protected $table = 'order';
	public $fillable = ['id_order', 'total', 'subtotal', 'status', 'id_produkterpilih', 'id_pembayaran', 'id_kios', 'id_konsumen'];
}
