<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Kategori;

class ManageKategoriController extends Controller
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
        $kategori=Kategori::orderBy('id_kategori','DESC')->paginate(5);
        // return view('admin.managekategori.index',compact('kategori'))->with('i',($request->input('page',1)-1)*5);
        return view('admin.managekategori.index',compact('kategori'))->with('i',($request->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.managekategori.create');
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
            'nama_kategori' => 'required',
        ]);

        $input = $request->all();
        
        $kategori = Kategori::create($input);
        return redirect()->route('admin.managekategori.index')
        ->with('Sukses','Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        return view('admin.managekategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori)
    {
        $kategori=Kategori::find($id_kategori);
        return view('admin.managekategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);
    
            $input = $request->all();
            
            $kategori = Kategori::find($id_kategori);
            $kategori -> update($input);
    
            return redirect()->route('admin.managekategori.index')
            ->with('Sukses','Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        Kategori::find($id_kategori)->delete();
        return redirect()->route('admin.managekategori.index')
        ->with('Sukses','Kategori berhasil dihapus');
    }
}
