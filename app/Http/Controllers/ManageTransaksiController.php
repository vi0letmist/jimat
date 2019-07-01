<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Transaksi;

class ManageTransaksiController extends Controller
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
        $transaksi=Transaksi::orderBy('id_order','DESC')->paginate();
        return view('admin.managetransaksi.index',compact('transaksi'))->with('i',($request->input('page',1)-1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.managetransaksi.create');
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
            'total' => 'required',
            'subtotal' => 'required',
            'status' => 'required',
            'tanggal' => 'required',
        ]);

        $input = $request->all();
        
        $transaksi = Transaksi::create($input);
        return redirect()->route('admin.managetransaksi.index')
        ->with('Sukses','Order berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_order)
    {
        $transaksi = Transaksi::find($id_order);
        return view('admin.managetransaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_order)
    {
        $transaksi=Transaksi::find($id_order);
        return view('admin.managetransaksi.edit',compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_order)
    {
        $this->validate($request, [
            'total' => 'required',
            'subtotal' => 'required',
            'status' => 'required',
            'tanggal' => 'required',
            
        ]);
    
            $input = $request->all();
            
            $transaksi = Transaksi::find($id_order);
            $transaksi -> update($input);
    
            return redirect()->route('admin.managetransaksi.index')
            ->with('Sukses','Order berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_order)
    {
        Transaksi::find($id_order)->delete();
        return redirect()->route('admin.managetransaksi.index')
        ->with('Sukses','Order berhasil dihapus');
    }
}
