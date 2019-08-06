<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Barang;
use App\Kategori;
use Illuminate\Support\Facades\DB;

class ManageBarangController extends Controller
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
        $barang=Barang::orderBy('id_produkkoperasi','DESC')->paginate();
        return view('admin.managebarang.index',compact('barang'))->with(($request->input('page',1)-1));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.managebarang.create');
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
            'id_produkkoperasi' => 'required|regex:([%06d])',
            'nama_produk' => 'required',
            'gambar' => 'required',
            'merk' => 'required',
            'harga_koperasi' => 'required',
            'id_kategori' => 'required',
            'id_admin' => 'required',
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
        
        $barang = Barang::create($input);
        return redirect()->route('manajemen-produk.index')
        ->with('success','Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_produkkoperasi)
    {
        $id_produkkoperasi = sprintf('%06d',$id_produkkoperasi);
        $barang = Barang::find($id_produkkoperasi);
        return view('admin.managebarang.show', compact('barang'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_produkkoperasi)
    {
        $id_produkkoperasi = sprintf('%06d',$id_produkkoperasi);
        $barang=Barang::find($id_produkkoperasi);
        return view('admin.managebarang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produkkoperasi)
    {
        $id_produkkoperasi = sprintf('%06d',$id_produkkoperasi);
        $this->validate($request, [
            'nama_produk' => 'required',
            'gambar' => 'required',
            'id_kategori' => 'required',
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
        
        $barang = Barang::find($id_produkkoperasi);
        $barang -> update($input);

        return redirect()->route('manajemen-produk.index')
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
        $id_produkkoperasi = sprintf('%06d',$id_produkkoperasi);
        Barang::find($id_produkkoperasi)->delete();
        return redirect()->route('manajemen-produk.index')
        ->with('success','Produk berhasil dihapus');
    }
}
