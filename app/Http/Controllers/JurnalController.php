<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Jurnal;
use App\KatBahasa;

class JurnalController extends Controller
{
   
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no    = 1;
        $jurnal = Jurnal::latest()->get();

        return view('admin.jurnal.jurnal', compact('no','jurnal'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.jurnal.tjurnal', compact('katbhs'));
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
        $cekid  = Jurnal::where('id', $id)->get();

        if (count($cekid) == 0) {

            $ext     = request('file_jurnal')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('file_jurnal'));

            if ($ext == 'pdf') {

                if ($size <= $sizemax) {

                    $file       = 'File-jurnal-'.date('dmY').
                                    '-'.time().'.'.request('file_jurnal')
                                    ->getClientOriginalExtension();
                    $upload     = request('file_jurnal')
                                    ->move(public_path('jurnal/'), strtolower($file));

                    $asup   = Jurnal::create([
                                'id'           => $id,
                                'katbahasa_id' => request('katbahasa_id'),
                                'nama_penulis' => request('nama_penulis'),
                                'judul_jurnal' => request('judul_jurnal'),
                                'kata_kunci'   => request('kata_kunci'),
                                'abstrak'      => request('abstrak'),
                                'publikasi'    => request('publikasi'),
                                'file_jurnal'  => strtolower($file)
                            ]);

                    return redirect()
                                ->route('jurnal')
                                // ->withasup('Successfully... Save To Database')
                                ->withsuccess('Berhasil... Simpan Data Ke Database');
                    
                }else {
                
                    return back()
                            // ->withsalah('Failed... Input Data')
                            ->witherror('File Terlalu Besar,  Max Upload File 25 Mb');
                    
                }
                
            }else {
                
                return back()
                        // ->withsalah('Failed... Input Data')
                        ->witherror('Extensi File jurnal Bukan .pdf  Mohon Upload File Yang Benar');
            }

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
    public function edit(Jurnal $jnl)
    {

        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.jurnal.ejurnal', compact('jnl','katbhs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Jurnal $jnl)
    {
        
        if (!empty(request('file_jurnal'))) {

            $ext     = request('file_jurnal')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('file_jurnal'));

            if ($ext == 'pdf') {

                if ($size <= $sizemax) {

                    $arr    = ['.pdf'];
                    $aran   = str_replace($arr, '', $jnl->file_jurnal);
                    $file   = $aran.'.'.request('file_jurnal')
                                    ->getClientOriginalExtension();
                    $old    = rename('jurnal/'.$jnl->file_jurnal, 
                                'jurnal/'.$file.'-old');
                    $upload = request('file_jurnal')
                                    ->move(public_path('jurnal/'), $file);

                    $jnl->update([
								'katbahasa_id' => request('katbahasa_id'),
								'nama_penulis' => request('nama_penulis'),
								'judul_jurnal' => request('judul_jurnal'),
								'kata_kunci'   => request('kata_kunci'),
								'abstrak'      => request('abstrak'),
                                'publikasi'    => request('publikasi'),
								'file_jurnal'  => $file
                            ]);

                    return redirect()
                                ->route('jurnal')
                                // ->withasup('Successfully... Update To Database')
                                ->withsuccess('Berhasil... Update Database');
                    
                }else {
                
                    return back()
                            // ->withsalah('Failed... Input Data')
                            ->witherror('File Terlalu Besar,  Max Upload File 25 Mb');
                    
                }
                
            }else {
                
                return back()
                        // ->withsalah('Failed... Input Data')
                        ->witherror('Extensi File jurnal Bukan .pdf  Mohon Upload File Yang Benar');
            }
            
        }else{

            $jnl->update([
                            'katbahasa_id' => request('katbahasa_id'),
                            'nama_penulis' => request('nama_penulis'),
                            'judul_jurnal' => request('judul_jurnal'),
                            'kata_kunci'   => request('kata_kunci'),
                            'publikasi'    => request('publikasi'),
                            'abstrak'      => request('abstrak')
                    ]);

            return redirect()
                        ->route('jurnal')
                        // ->withasup('Successfully... Update To Database')
                        ->withsuccess('Berhasil... Update Database');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurnal $jnl)
    {

        $arr     = ['.pdf','.PDF'];
        $cfile   = str_replace($arr, '', $jnl->file_jurnal); 
        $file1   = public_path('jurnal/'.$jnl->file_jurnal);

        foreach ($arr as $k) {

            $file2   = public_path('jurnal/'.$cfile.$k.'-old');
            $delfile = File::delete($file1,$file2);

        }


            $jnl->delete();

            return back()
                    // ->withhapus('Successfully... Delete From Database')
                    ->withdelete('Berhasil... Hapus Data Dari Database');
    }

}
