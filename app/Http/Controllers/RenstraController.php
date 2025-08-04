<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Renstra;
use App\KatBahasa;

class RenstraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $no      = 1;
        $renstra = Renstra::latest()->get();
        $katbhs  = KatBahasa::orderby('namakbhs')->get();

        return view('admin.renstra.renstra', compact('no','renstra','katbhs'));

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
        $cekid  = Renstra::where('id', $id)->get();

        if (count($cekid) == 0) {

            $ext     = request('nfile')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('nfile'));

            if ($ext == 'pdf') {

                if ($size <= $sizemax) {

                    $file       = 'File-renstra-'.date('dmY').
                                    '-'.time().'.'.request('nfile')
                                    ->getClientOriginalExtension();
                    $upload     = request('nfile')
                                    ->move(public_path('renstra/'), strtolower($file));

                    $asup   = Renstra::create([
                                'id'           => $id,
                                'katbahasa_id' => request('katbahasa_id'),
                                'judul'        => request('judul'),
                                'deskripsi'    => request('deskripsi'),
                                'publikasi'    => request('publikasi'),
                                'nfile'        => strtolower($file)
                            ]);

                    return redirect()
                                ->route('renstra')
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
                        ->witherror('Extensi File Renstra Bukan .pdf  Mohon Upload File Yang Benar');
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
            
        $jnl     = Renstra::where('id', request('id'))->first();
        
        if (!empty(request('nfile'))) {

            $ext     = request('nfile')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('nfile'));


            if ($ext == 'pdf') {

                if ($size <= $sizemax) {

                    $arr    = ['.pdf'];
                    $aran   = str_replace($arr, '', $jnl->nfile);
                    $file   = $aran.'.'.request('nfile')
                                    ->getClientOriginalExtension();
                    $old    = rename('renstra/'.$jnl->nfile, 
                                'renstra/'.$file.'-old');
                    $upload = request('nfile')
                                    ->move(public_path('renstra/'), $file);

                    $jnl->update([
                                'katbahasa_id' => request('katbahasa_id'),
                                'judul'        => request('judul'),
                                'deskripsi'    => request('deskripsi'),
                                'publikasi'    => request('publikasi'),
                                'nfile'        => strtolower($file)
                            ]);

                    return redirect()
                                ->route('renstra')
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
                        ->witherror('Extensi File Renstra Bukan .pdf  Mohon Upload File Yang Benar');
            }
            
        }else{

            $jnl->update([
                                'katbahasa_id' => request('katbahasa_id'),
                                'judul'        => request('judul'),
                                'deskripsi'    => request('deskripsi'),
                                'publikasi'    => request('publikasi')
                    ]);

            return redirect()
                        ->route('renstra')
                        // ->withasup('Successfully... Update To Database')
                        ->withsuccess('Berhasil... Update Database');

        }
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
    public function destroy(Renstra $rnt)
    {

        $arr     = ['.pdf','.PDF'];
        $cfile   = str_replace($arr, '', $rnt->nfile); 
        $file1   = public_path('renstra/'.$rnt->nfile);

        foreach ($arr as $k) {

            $file2   = public_path('renstra/'.$cfile.$k.'-old');
            $delfile = File::delete($file1,$file2);

        }


            $rnt->delete();

            return back()
                    // ->withhapus('Successfully... Delete From Database')
                    ->withdelete('Berhasil... Hapus Data Dari Database');
    }
    
}
