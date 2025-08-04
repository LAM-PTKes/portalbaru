<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Survey;
use App\KatBahasa;

class SurveyController extends Controller
{
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$no     = 1;
		$survey = Survey::latest()->get();

        return view('admin.survey.survey', compact('no','survey'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.survey.tsurvey', compact('katbhs'));
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
        $cekid  = Survey::where('id', $id)->get();

        if (count($cekid) == 0) {

            $asup   = Survey::create([
						'id'                => $id,
						'katbahasa_id'      => request('katbahasa_id'),
						'judul'             => request('judul'),
						'tujuan'            => request('tujuan'),
						'metode'            => request('metode'),
						'responden'         => request('responden'),
						'waktu_pelaksanaan' => date('Y-m-d',strtotime(request('waktu_pelaksanaan'))),
						'tgl_tutup'         => date('Y-m-d',strtotime(request('tgl_tutup'))),
						'link'              => request('link'),
						'publikasi'         => request('publikasi')
                    ]);

            return redirect()
                        ->route('survey')
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $srv)
    {

        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.survey.esurvey', compact('srv','katbhs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Survey $srv)
    {
        

	    $srv->update([
					'katbahasa_id'      => request('katbahasa_id'),
					'judul'             => request('judul'),
					'tujuan'            => request('tujuan'),
					'metode'            => request('metode'),
					'responden'         => request('responden'),
					'waktu_pelaksanaan' => date('Y-m-d',strtotime(request('waktu_pelaksanaan'))),
					'tgl_tutup'         => date('Y-m-d',strtotime(request('tgl_tutup'))),
					'link'              => request('link'),
					'publikasi'         => request('publikasi')
	            ]);

	    return redirect()
	                ->route('survey')
	                // ->withasup('Successfully... Update To Database')
	                ->withsuccess('Berhasil... Update Database');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $srv)
    {

        $srv->delete();

        return back()
                // ->withhapus('Successfully... Delete From Database')
                ->withdelete('Berhasil... Hapus Data Dari Database');

    }
}
