<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Profil;
use App\KatBahasa;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $profil     = Profil::latest()->get();

        return view('admin.profil.profil', compact('no','profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.profil.tprofil', compact('katbhs'));

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
        $cekid  = Profil::where('id', $id)->get();

        if (count($cekid) == 0) {

            $asup   = Profil::create([
                        'id'                => $id,
                        'nprofil'           => request('nprofil'),
                        'katbahasa_id'      => request('katbahasa'),
                        'isi_profil'        => request('isi_profil')
                    ]);

            return redirect()->route('profil')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');

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
    public function edit(Profil $prf)
    {
        
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.profil.eprofil', compact('katbhs','prf'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Profil $prf)
    {
        $prf->update([
                        'nprofil'           => request('nprofil'),
                        'katbahasa_id'      => request('katbahasa'),
                        'isi_profil'        => request('isi_profil')
                    ]);

        return redirect()->route('profil')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $prf)
    {
        
        $prf->delete();

        return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');
    }

}
