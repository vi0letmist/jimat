<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Upload;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        $uploads=Upload::orderBy('id','DESC')->paginate(5);
        return view('home.index',compact('uploads'))->with('i',($request->input('page',1)-1)*5);
    }

    public function show($id)
    {
        $upload=Upload::find($id);
        return view('home.show',compact('upload'));
    }
}
