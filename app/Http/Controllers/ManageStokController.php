<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Barang;
use App\Kategori;
use App\Stok;
use Illuminate\Support\Facades\DB;

class ManageStokController extends Controller
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
        $stok=Stok::orderBy('id_stockkoperasi','DESC')->paginate();
        return view('admin.managestok.index',compact('stok'))->with('i',($request->input('page',1)-1));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.managestok.create');
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
            'id_stockkoperasi' => 'required',
            'stok' => 'required'
        ]);
            
        $barang = Stok::find($request->id_stockkoperasi);

        $stok = $barang->stok + $request->stok;
        $barang-> update(["stok" => $stok]);
        
        return redirect()->route('manajemen-stok.index')
        ->with('success','Stok berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_stockkoperasi)
    {
        $id_stockkoperasi = sprintf('%06d',$id_stockkoperasi);
        $stok = Stok::find($id_stockkoperasi);
        return view('admin.managestok.show', compact('stok'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_stockkoperasi)
    {
       
        $stok=Stok::find($id_stockkoperasi);
        return view('admin.managestok.edit',compact('stok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id_stockkoperasi' => 'required',
            'stok' => 'required'
        ]);
           
        $stok = Stok::find($request->id_stockkoperasi);

        dd($stok);
        $stok -> update($request->stok);

        return redirect()->route('manajemen-stok.index')
        ->with('success','Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_produkkoperasi)
    {
        
        Stok::find($id_stockkoperasi)->delete();
        return redirect()->route('manajemen-stok.index')
        ->with('success','Produk berhasil dihapus');
    }
}
