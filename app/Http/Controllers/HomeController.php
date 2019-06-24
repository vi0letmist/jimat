<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Kategori;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        $kategori=Kategori::orderBy('id_kategori','DESC')->paginate(5);
        return view('managekategori.index',compact('kategori'))->with('i',($request->input('page',1)-1)*5);
    }

    public function show($id)
    {
        $upload=Upload::find($id);
        return view('home.show',compact('upload'));
    }
}
