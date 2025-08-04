<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Rencana;
use App\KatBahasa;

class RencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         	= 1;
        $rencana     	= Rencana::latest()->get();

        return view('admin.rencana.rencana', compact('no','rencana'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.rencana.trencana', compact('katbhs'));

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
        $cekid  = Rencana::where('id', $id)->get();

        if (count($cekid) == 0) {

            $asup   = Rencana::create([
                        'id'                => $id,
                        'nrencana'       	=> request('nrencana'),
                        'katbahasa_id'      => request('katbahasa'),
                        'deskripsi'        	=> request('deskripsi')
                    ]);

            return redirect()->route('rencana')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');

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
    public function edit(Rencana $rcn)
    {
        
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.rencana.erencana', compact('katbhs','rcn'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Rencana $rcn)
    {
        $rcn->update([
                        'nrencana'        	=> request('nrencana'),
                        'katbahasa_id'      => request('katbahasa'),
                        'deskripsi'        	=> request('deskripsi')
                    ]);

        return redirect()->route('rencana')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rencana $rcn)
    {
        
        $rcn->delete();

        return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');
    }
}
