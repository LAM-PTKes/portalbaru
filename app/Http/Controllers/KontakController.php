<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\KatBahasa;
use App\Kontak;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $kontak 	= Kontak::latest()->get();

        return view('admin.kontak.kontak', compact('no','kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.kontak.tkontak', compact('katbhs'));

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
        $cekid  = Kontak::where('id', $id)->get();

        if (count($cekid) == 0) {

            $asup   = Kontak::create([
                        'id'                => $id,
                        'ntentang'          => request('ntentang'),
                        'tlp'           	=> request('tlp'),
                        'ponsel'           	=> request('ponsel'),
                        'kantor'           	=> request('kantor'),
                        'jam_kerja'         => request('jam_kerja'),
                        'email'             => request('email'),
                        'alamat'           	=> request('alamat'),
                        'katbahasa_id'      => request('katbahasa'),
                        'link'        		=> request('link')
                    ]);

            return redirect()->route('kontak')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');

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
    public function edit(Kontak $ktk)
    {
        
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.kontak.ekontak', compact('katbhs','ktk'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Kontak $ktk)
    {
        $ktk->update([
                        'ntentang'          => request('ntentang'),
                        'tlp'           	=> request('tlp'),
                        'ponsel'           	=> request('ponsel'),
                        'kantor'           	=> request('kantor'),
                        'jam_kerja'         => request('jam_kerja'),
                        'email'             => request('email'),
                        'alamat'           	=> request('alamat'),
                        'katbahasa_id'      => request('katbahasa'),
                        'link'        		=> request('link')
                    ]);

        return redirect()->route('kontak')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontak $ktk)
    {
        
        $ktk->delete();

        return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');
    }
}
