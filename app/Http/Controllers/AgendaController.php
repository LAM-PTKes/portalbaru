<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Agenda;
use App\KatBahasa;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         	= 1;
        $agenda     	= Agenda::latest()->get();

        return view('admin.agenda.agenda', compact('no','agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.agenda.tagenda', compact('katbhs'));

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
        $cekid  = Agenda::where('id', $id)->get();

        if (count($cekid) == 0) {
            
            $asup   = Agenda::create([
                        'id'                => $id,
                        'nagenda'       	=> request('nagenda'),
                        'penyelenggara'     => request('penyelenggara'),
                        'lokasi'      		=> request('lokasi'),
                        'kontak'      		=> request('kontak'),
                        'website'      		=> request('website'),
                        'kota'      		=> request('kota'),
                        'tanggal_kegiatan'  => date('Y-m-d', strtotime(request('tanggal_kegiatan'))),
                        'waktu_kegiatan'    => request('waktu_kegiatan'),
    	            	'katbahasa_id'    	=> request('katbahasa'),
                        'deskripsi'        	=> request('deskripsi')
    				]);

            return redirect()->route('agenda')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');

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
    public function edit(Agenda $agn)
    {
        
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.agenda.eagenda', compact('katbhs','agn'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Agenda $agn)
    {
        $agn->update([
	            'nagenda'       	=> request('nagenda'),
	            'penyelenggara'     => request('penyelenggara'),
	            'lokasi'      		=> request('lokasi'),
	            'kontak'      		=> request('kontak'),
	            'website'      		=> request('website'),
	            'kota'      		=> request('kota'),
	            'tanggal_kegiatan'  => date('Y-m-d', strtotime(request('tanggal_kegiatan'))),
	            'waktu_kegiatan'    => request('waktu_kegiatan'),
	            'katbahasa_id'    	=> request('katbahasa'),
	            'deskripsi'        	=> request('deskripsi')
            ]);

        return redirect()->route('agenda')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agn)
    {
        
        $agn->delete();

        return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');
    }
}
