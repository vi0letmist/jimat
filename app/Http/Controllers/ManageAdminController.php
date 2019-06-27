<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Hash;

class ManageAdminController extends Controller
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
        $admins=Admin::orderBy('id','DESC')->paginate(5);
        return view('admin.manageadmin.index',compact('admins'))->with('i',($request->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manageadmin.create');
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
            'name'=>'required',
            'email'=>'required',//|mail|unique:users,email',
            'password'=>'required|min:6|same:confirm-password',
            ]);

        $input=$request->all();
        $input['password']=Hash::make($input['password']);

        $admin = Admin::create($input);

        return redirect()->route('manajemen-admin.index')->with('success','Admin Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admin.manageadmin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=Admin::find($id);
        return view('admin.manageadmin.edit',compact('admin'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'same:confirm-password',
        ]);

    $input = $request->all();
    if(!empty($input['password'])){
    $input['password'] = Hash::make($input['password']);
    }else{
    $input = array_except($input,array('password'));
    }

    $admin = Admin::find($id);
    $admin->update($input);

    return redirect()->route('admin.manageadmin.index')
    ->with('success','Admin successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return redirect()->route('manajemen-admin.index')
        ->with('success','Admin successfully deleted');
    }
}
