<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kios;
use App\Konsumen;
use App\Transaksi;

class AdminController extends Controller
{
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	/**
	* Show the application dashboard.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$transaksi = Transaksi::count();
		$konsumen = Konsumen::count();
		$kios = Kios::count();
		$barang = Barang::count();
		return View('admin',compact('barang','kios','konsumen','transaksi'))->with('count', $barang);
	}
}
