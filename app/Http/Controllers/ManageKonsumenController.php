<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Konsumen;
use Illuminate\Support\Facades\DB;

class ManageKonsumenController extends Controller
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
        $konsumen = Konsumen::orderBy('id_konsumen','DESC')->paginate();
        
        // return view('admin.managekategori.index',compact('kategori'))->with('i',($request->input('page',1)-1)*5);
        return view('admin.managekonsumen.index',compact('konsumen'))->with('i',($request->input('page',1)-1));
    }
    public function search(Request $request)
	{
		$konsumen = Konsumen::when($request->keyword, function ($query) use ($request) {
            $query->where('nama', 'like', "%{$request->keyword}%");
        })->paginate(5);
        return view('konsumen.search',compact('konsumen'))->with('i',($request->input('page',1)-1)*5);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.managekonsumen.create');
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
            'nama' => 'required',
            'password' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
        ]);

        $input = $request->all();
        
        $konsumen = Konsumen::create($input);
        return redirect()->route('manajemen-konsumen.index')
        ->with('Sukses','Konsumen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_konsumen)
    {
        $konsumen = Konsumen::find($id_konsumen);
        return view('admin.managekonsumen.show', compact('konsumen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_konsumen)
    {
        $konsumen=Konsumen::find($id_konsumen);
        return view('admin.managekonsumen.edit',compact('konsumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_konsumen)
    {
        $this->validate($request, [
            'nama' => 'required',
            'password' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            
        ]);
    
            $input = $request->all();
            
            $konsumen = Konsumen::find($id_konsumen);
            $konsumen -> update($input);
    
            return redirect()->route('manajemen-konsumen.index')
            ->with('Sukses','Konsumen berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_konsumen)
    {
        Konsumen::find($id_konsumen)->delete();
        return redirect()->route('manajemen-konsumen.index')
        ->with('Sukses','Konsumen berhasil dihapus');
    }
}
