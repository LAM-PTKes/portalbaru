<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\KatUnduhan;

class KategoriUnduhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no             = 1;
        $katunduhan     = KatUnduhan::latest()->get();

        return view('admin.unduhan.katunduhan', compact('no', 'katunduhan'));
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
        $cekid  = KatUnduhan::where('id', $id)->get();

        if (count($cekid) == 0) {

            $asup   = KatUnduhan::create([
                            'id'            => $id,
                            'namaundh'      => request('namaundh'),
                            'keterangan'    => request('keterangan')
                    ]);

            return back()->withasup('Data Berhasil Di Simpan Ke Database')->withSuccess('Successfully... Save To Database');

        }else {

            return back()->withsalah('Data Gagal Di Simpan Ke Database Id Sudah Digunakan User lain')->witherror('Failled... Save To Database Id Already Used');

        }
        // return redirect()->route('katunduhan')->withasup('Data Berhasil Di Simpan Ke Database');
        // return redirect()->back()->withasup('Data Berhasil Di Simpan Ke Database');
        // echo 'kkk';
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
    public function edit(KatUnduhan $undh)
    {

        return view('admin.unduhan.ekatunduhan', compact('undh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatUnduhan $undh)
    {

        $undh->update([
            'namaundh'      => request('namaundh'),
            'keterangan'    => request('keterangan')
        ]);

        return redirect()->route('katunduhan')->withasup('Data Berhasil Di Update')->withSuccess('Successfully... Update Database');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KatUnduhan $undh)
    {
        $undh->delete();

        return back()->withhapus('Data Berhasil Di Hapus')->withdelete('Successfully... Delete Database');
    }
}