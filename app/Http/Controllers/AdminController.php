<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kios;
use App\Konsumen;
use App\Transaksi;
use Carbon\Carbon;

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
	public function index(Carbon $date)
	{
		$transaksi = Transaksi::count();
		$konsumen = Konsumen::count();
		$kios = Kios::count();
		$barang = Barang::count();

		$year = $date->year;
		$transaksi2 = Transaksi::where('tanggal', 'like', $year . '%')->get();
		
		$chart = [];
		$sum = [];
		for($i = 1; $i<13; $i++) {
			$sum[$i] = 0;
		}
		$temp = 0;
		foreach ($transaksi2 as $t) {
			for($i = 1; $i<13; $i++) {
				$j = $i;
				if(strlen($j) < 2) {
					$j = '0' . $j; 
				} else {
					$j = (string)$j;
				}
				if(substr($t->tanggal, 5, 2) == $j) {
					$sum[$i]++;  
				}
			}
		}

			for($i = 1; $i < 13; $i++) {
				$j = $i;
				if(strlen($j) < 2) {
					$j = '0' . $j; 
				} else {
					$j = (string)$j;
				}
				$chart[] = "{y: '". $year . "-" . $j ."', item1: " . $sum[$i] . "},";
			}
			$chart2 = '';
			foreach($chart as $c) {
				$chart2 = $chart2 . $c;
			} 

		return View('admin',compact('barang','kios','konsumen','transaksi', 'chart2'))->with('count', $barang);
	}
}
