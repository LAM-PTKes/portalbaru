<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orientasi;
use App\KatBahasa;

class OrientasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         	= 1;
        $orientasi     	= Orientasi::latest()->get();

        return view('admin.orientasi.orientasi', compact('no','orientasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.orientasi.torientasi', compact('katbhs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asup   = Orientasi::create([
                                    'norientasi'       	=> request('norientasi'),
                                    'katbahasa_id'      => request('katbahasa'),
                                    'deskripsi'        	=> request('deskripsi')
                                ]);

        return redirect()->route('ori')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Orientasi $ori)
    {
        
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.orientasi.eorientasi', compact('katbhs','ori'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Orientasi $ori)
    {
        $ori->update([
                        'norientasi'        => request('norientasi'),
                        'katbahasa_id'      => request('katbahasa'),
                        'deskripsi'        	=> request('deskripsi')
                    ]);

        return redirect()->route('ori')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orientasi $ori)
    {
        
        $ori->delete();

        return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');
    }
}
