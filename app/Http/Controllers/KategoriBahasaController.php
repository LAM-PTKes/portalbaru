<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\KatBahasa;

class KategoriBahasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $bahasa     = KatBahasa::latest()->get();

        return view('admin.bahasa.bahasa', compact('no','bahasa'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $id     = str_replace('-', '', Str::uuid());
        $cekid  = KatBahasa::where('id', $id)->get();

        if (count($cekid) == 0) {

            $asup   = KatBahasa::create([
                            'id'            => $id,
                            'namakbhs'      => request('namakbhs'),
                            'keterangan'    => request('keterangan')
                        ]);

            return redirect()->route('bahasa')->withasup('Data Berhasil Di Simpan Ke Database')->withSuccess('Successfully... Save To Database');
            
        }else {

            return back()->withsalah('Data Gagal Di Simpan Ke Database Id Sudah Digunakan User lain')->witherror('Failled... Save To Database Id Already Used');

        }

        
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
    public function edit(KatBahasa $bhs)
    {
        
        return view('admin.bahasa.ebahasa', compact('bhs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatBahasa $bhs)
    {
        
        $bhs->update([
                        'namakbhs'      => request('namakbhs'),
                        'keterangan'    => request('keterangan')
                    ]);

        return redirect()->route('bahasa')->withasup('Data Berhasil Di Update')->withSuccess('Successfully... Update Database');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KatBahasa $bhs)
    {
        $bhs->delete();

        return back()->withhapus('Data Berhasil Di Hapus')->withdelete('Successfully... Delete Database');
    }
}
