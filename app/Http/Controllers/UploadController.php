<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Upload;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uploads=Upload::orderBy('id','DESC')->paginate(5);
        return view('uploads.index',compact('uploads'))->with('i',($request->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'image' => 'required',//|mimes:jpeg,png,jpg',
        'name' => 'required',
        'price' => 'required',
        'unit' => 'required',
    ]);

        $input = $request->all();
        $imageName = '';
        if ($request->hasFile('image')) {
        $imageExtension = $request->file('image')->getClientOriginalExtension();
        $imageName = 'image_'.time().'.'.$imageExtension;
        $imageDestination = base_path() . '/public/uploads';
        $request->file('image')->move($imageDestination, $imageName);
        $input['image'] = $imageName;
        }
        
        $upload = Upload::create($input);
        return redirect()->route('uploads.index')
        ->with('success','Image successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $upload = Upload::find($id);
        return view('uploads.show', compact('upload'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upload=Upload::find($id);
        return view('uploads.edit',compact('upload'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        //'image' => 'required',//|mimes:jpeg,png,jpg',
        'name' => 'required',
        'price' => 'required',
        'unit' => 'required',
    ]);

        $input = $request->all();
        $imageName = '';
        if ($request->hasFile('image')) {
        $imageExtension = $request->file('image')->getClientOriginalExtension();
        $imageName = 'image_'.time().'.'.$imageExtension;
        $imageDestination = base_path() . '/public/uploads';
        $request->file('image')->move($imageDestination, $imageName);
        $input['image'] = $imageName;
        }
        
        $upload = Upload::find($id);
        $upload -> update($input);

        return redirect()->route('uploads.index')
        ->with('success','Image successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Upload::find($id)->delete();
        return redirect()->route('uploads.index')
        ->with('success','Image successfully deleted');
    }
}
