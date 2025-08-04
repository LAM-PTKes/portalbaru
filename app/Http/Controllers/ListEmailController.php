<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\KategoriEmail;
use App\ListEmail;

class ListEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $no        = 1;
        $katemail  = KategoriEmail::orderby('nama_kat')->get();
        $listemail = ListEmail::orderby('katemail_id')->get();

        return view('admin.broadcastemail.listemail', compact('no','listemail','katemail'));

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
        $cekid      = ListEmail::where('id', $id)->get();

        if (count($cekid) == 0) {

            $asup   = ListEmail::create([
                        'id'          => $id,
                        'katemail_id' => request('katemail_id'),
                        'nama'        => request('nama'),
                        'email'       => request('email')
                    ]);

            return redirect()
                        ->route('listemail')
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

        $kte = ListEmail::where('id', request('id'))
                        ->update([
                                    'katemail_id' => request('katemail_id'),
                                    'nama'        => request('nama'),
                                    'email'       => request('email')
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
    public function destroy(ListEmail $lsm)
    {

        $lsm->delete();

        return back()
                // ->withhapus('Successfully... Delete From Database')
                ->withdelete('Berhasil... Hapus Data Dari Database');
    }
}
