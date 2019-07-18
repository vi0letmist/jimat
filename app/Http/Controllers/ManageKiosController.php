<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Kios;
use Mapper;

class ManageKiosController extends Controller
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
        $kios=Kios::orderBy('id_kios','DESC')->paginate();
        // return view('admin.managekategori.index',compact('kategori'))->with('i',($request->input('page',1)-1)*5);
        return view('admin.managekios.index',compact('kios'))->with('i',($request->input('page',1)-1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Mapper::map(-7.7746111, 110.3737946, ['zoom' => 17, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 34 ]]);

        // Add information window for each address
        $collection = Kios::all();

        $collection->each(function($kios)
        {
            $content = $kios->nama_kios;

            Mapper::informationWindow($kios->latitude, $kios->longitude, $content);
        });
        return view('admin.managekios.create');
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
            'nama_kios' => 'required',
            'nama_pemilik' => 'required',
            'password' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'rating' => 'required',
            'id_admin' => 'required',
        ]);

        $input = $request->all();
        
        $kios = Kios::create($input);
        return redirect()->route('manajemen-kios.index')
        ->with('success','Kios berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kios)
    {
        $kios = Kios::find($id_kios);
        return view('admin.managekios.show', compact('kios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kios)
    {
        
        $kios=Kios::find($id_kios);
        $longtd = Kios::where('id_kios',$id_kios)->select('longitude')->first();
        $latd = Kios::where('id_kios',$id_kios)->select('latitude')->first();
        Mapper::map($longtd->longitude, $latd->latitude, ['zoom' => 17, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 34 ]]);
        return view('admin.managekios.edit',compact('kios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kios)
    {
        $this->validate($request, [
            'nama_kios' => 'required',
            'nama_pemilik' => 'required',
            'password' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
    
            $input = $request->all();
            
            $kios = Kios::find($id_kios);
            $kios -> update($input);
    
            return redirect()->route('manajemen-kios.index')
            ->with('success','Kios berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kios)
    {
        Kios::find($id_kios)->delete();
        return redirect()->route('manajemen-kios.index')
        ->with('success','Kios berhasil dihapus');
    }
}
