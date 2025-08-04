<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Testimoni;
use App\KatBahasa;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $testimoni  = Testimoni::latest()->get();

        return view('admin.testimoni.testimoni', compact('no','testimoni'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.testimoni.ttestimoni', compact('katbhs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ext    = request('nfile')->extension();
        // $mb     = filesize(request('nfile'));
        // $tomb   = number_format($mb / 1048576,2);
        $id     = str_replace('-', '', Str::uuid());
        $cekid  = Testimoni::where('id', $id)->get();

        if (count($cekid) == 0) {

            if ($ext == 'jpg' || $ext == 'jpeg' || $ext =='png') {
                
    	        
                $file       = 'testimoni'.'-'.time().'.'
                				.request('nfile')->getClientOriginalExtension();
                $upload     = request('nfile')
                                ->move(public_path('img/'), $file);

                $asup       = Testimoni::create([
                                'id'                => $id,
                                'katbahasa_id'      => request('katbahasa'),
                                'nama_lengkap'      => request('nama_lengkap'),
                                'jabatan'           => request('jabatan'),
                                'deskripsi'         => request('deskripsi'),
                                'nfile'       		=> $file
                            ]);

                return redirect()->route('testimoni')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
                
                
            }else {

                return back()->withsalah('File Bukan .jpg, .jpeg, .png')->witherror('Bentuk File Extensi Harus .jpg, .jpeg, .png');
            }

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
    public function edit(Testimoni $ttm)
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.testimoni.etestimoni', compact('ttm','katbhs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Testimoni $ttm)
    {

        $cek    = request('nfile');

        if (!empty($cek)) {

            $ext    = request('nfile')->extension();

            if ($ext == 'jpg' || $ext == 'jpeg' || $ext =='png') {

                    $arr        = ['.jpeg','.jpg','.png'];
                    $aran       = str_replace($arr, '', $ttm->nfile);
                    $file       = $aran.'.'.request('nfile')->getClientOriginalExtension();
                    $old        = rename('img/'.$ttm->nfile, 
                    				'img/'.$file.'-old');
                    $upload     = request('nfile')->move(public_path('img/'), $file);

                    $ttm->update([
                            'katbahasa_id'      => request('katbahasa'),
                            'nama_lengkap'      => request('nama_lengkap'),
                            'jabatan'           => request('jabatan'),
                            'deskripsi'         => request('deskripsi'),
                            'nfile'       		=> $file
                        ]);

                    return redirect()->route('testimoni')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
                
                
            }else {

                return back()->withsalah('File Bukan .jpg, .jpeg, .png')->witherror('Bentuk File Extensi Harus .jpg, .jpeg, .png');
            }
            
        }else{

            $ttm->update([
                            'katbahasa_id'      => request('katbahasa'),
                            'nama_lengkap'      => request('nama_lengkap'),
                            'jabatan'           => request('jabatan'),
                            'deskripsi'         => request('deskripsi')
                    ]);

            return redirect()->route('testimoni')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $ttm)
    {

        if (!file_exists('img/'.$ttm->nfile) && !file_exists('img/'.$ttm->nfile.'-old')) {
             
                $ttm->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }elseif(file_exists('img/'.$ttm->nfile) && file_exists('img/'.$ttm->nfile.'-old')) {

                $path       = public_path('img/');
                $fileName   = $ttm->nfile;
                $fileName1  = $ttm->nfile.'-old';
                unlink($path. $fileName);
                unlink($path. $fileName1);

                $ttm->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }else {
                
                $path       = public_path('img/');
                $fileName   = $ttm->nfile;
                unlink($path. $fileName);
                $ttm->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }
    }
}
