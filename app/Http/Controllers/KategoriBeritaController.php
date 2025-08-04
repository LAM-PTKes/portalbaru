<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\KatBerita;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no             = 1;
        $katberita      = KatBerita::latest()->get();

        return view('admin.berita.katberita', compact('no','katberita'));

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
        $cekid  = KatBerita::where('id', $id)->get();

        if (count($cekid) == 0) {
        
            $asup   = KatBerita::create([
                            'id'            => $id,
                            'namakbrt'      => request('namakbrt'),
                            'keterangan'    => request('keterangan')
                    ]);

            return redirect()->route('katberita')->withasup('Data Berhasil Di Simpan Ke Database')->withSuccess('Successfully... Save To Database');
            
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
    public function edit(KatBerita $brt)
    {
        
        return view('admin.berita.ekatberita', compact('brt'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatBerita $brt)
    {
        
        $brt->update([
                        'namakbrt'      => request('namakbrt'),
                        'keterangan'    => request('keterangan')
                    ]);

        return redirect()->route('katberita')->withasup('Data Berhasil Di Update')->withSuccess('Successfully... Update Database');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KatBerita $brt)
    {
        $brt->delete();

        return back()->withhapus('Data Berhasil Di Hapus')->withdelete('Successfully... Delete Database');
    }
}
