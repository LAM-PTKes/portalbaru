<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\QAkreditasi;
use App\KatBahasa;


class QnAController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $qnas     	= QAkreditasi::latest()->get();

        return view('admin.qna.qna', compact('no','qnas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.qna.tqna', compact('katbhs'));

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
        $cekid  = QAkreditasi::where('id', $id)->get();

        if (count($cekid) == 0) {

            $asup   = QAkreditasi::create([
                        'id'               => $id,
                        'nqakre'           => request('nqakre'),
                        'katbahasa_id'     => request('katbahasa'),
                        'deskripsi'        => request('deskripsi')
                    ]);

            return redirect()->route('qna')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');

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
    public function edit(QAkreditasi $qna)
    {
        
        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.qna.eqna', compact('katbhs','qna'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QAkreditasi $qna)
    {
        $qna->update([
                        'nqakre'           => request('nqakre'),
                        'katbahasa_id'     => request('katbahasa'),
                        'deskripsi'        => request('deskripsi')
                    ]);

        return redirect()->route('qna')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(QAkreditasi $qna)
    {
        
        $qna->delete();

        return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');
    }
}
