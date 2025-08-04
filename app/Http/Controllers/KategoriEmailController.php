<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\KategoriEmail;

class KategoriEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $katemail = KategoriEmail::orderby('nama_kat')->get();

        return view('admin.broadcastemail.katemail', compact('no','katemail'));

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

        $id         = str_replace('-', '', Str::uuid());
        $cekid      = KategoriEmail::where('id', $id)->get();

        if (count($cekid) == 0) {

            $asup   = KategoriEmail::create([
                        'id'       => $id,
                        'nama_kat' => request('nama_kat')
                    ]);

            return redirect()
                        ->route('katemail')
                        // ->withasup('Successfully... Save To Database')
                        ->withsuccess('Berhasil... Simpan Data Ke Database');
                    
        }else {

            return back()
                        // ->withsalah('Data Gagal Di Simpan Ke Database Id Sudah Digunakan')
                        ->witherror('Failled... Save To Database Id Already Used');
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
    public function edit()
    {

        $kte = KategoriEmail::where('id', request('id'))
                        ->update([
                                    'nama_kat'     => request('nama_kat')
                            ]);

        return back()
                    ->withsuccess('Successfully Update Database');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriEmail $kte)
    {

        $kte->delete();

        return back()
                // ->withhapus('Successfully... Delete From Database')
                ->withdelete('Berhasil... Hapus Data Dari Database');
    }
}
