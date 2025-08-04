<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Organisasi;
use App\KatBahasa;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         	= 1;
        $organisasi     = Organisasi::latest()->get();

        return view('admin.organisasi.organisasi', compact('no','organisasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.organisasi.torganisasi', compact('katbhs'));

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
        $cekid  = Organisasi::where('id', $id)->get();

        if (count($cekid) == 0) {

            $asup   = Organisasi::create([
                        'id'                => $id,
                        'norgan'           	=> request('norgan'),
                        'katbahasa_id'      => request('katbahasa'),
                        'deskripsi'        	=> request('deskripsi')
                    ]);

            return redirect()->route('organ')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');

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
    public function edit(Organisasi $org)
    {
        
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.organisasi.eorganisasi', compact('katbhs','org'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Organisasi $org)
    {
        $org->update([
                        'norgan'           	=> request('norgan'),
                        'katbahasa_id'      => request('katbahasa'),
                        'deskripsi'        	=> request('deskripsi')
                    ]);

        return redirect()->route('organ')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisasi $org)
    {
        
        $org->delete();

        return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');
    }
}
