<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guard = 'admin';
	protected $table = 'order';
	public $fillable = ['id_order', 'subtotal_harga', 'subtotal_harga_beli', 'status', 'id_pengiriman', 'id_pembayaran', 'id_kios', 'id_konsumen'];
}
