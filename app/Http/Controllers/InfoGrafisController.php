<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\InfoGrafis;
use App\KatBahasa;


class InfoGrafisController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$no         = 1;
		$infografis = InfoGrafis::latest()->get();

        return view('admin.infografis.infografis', compact('no','infografis'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.infografis.tinfografis', compact('katbhs'));
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
        $cekid  = InfoGrafis::where('id', $id)->get();

        if (count($cekid) == 0) {

            $ext     = request('gambar')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('gambar'));

            if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png') {

                if ($size <= $sizemax) {

                    $file       = 'File-infografis-'.date('dmY').
                                    '-'.time().'.'.request('gambar')
                                    ->getClientOriginalExtension();
                    $upload     = request('gambar')
                                    ->move(public_path('infografis/'), strtolower($file));

                    $asup   = InfoGrafis::create([
								'id'           => $id,
								'katbahasa_id' => request('katbahasa_id'),
								'judul'        => request('judul'),
								'publikasi'    => request('publikasi'),
								'deskripsi'    => request('deskripsi'),
								'gambar'       => strtolower($file)
                            ]);

                    return redirect()
                                ->route('igrafis')
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
                        ->witherror('Extensi File infografis Bukan .jpeg, .jpg, .png  Mohon Upload File Yang Benar');
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
    public function edit(infografis $ifg)
    {

        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.infografis.einfografis', compact('ifg','katbhs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(infografis $ifg)
    {
        
        if (!empty(request('gambar'))) {

            $ext     = request('gambar')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('gambar'));

            if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png') {

                if ($size <= $sizemax) {

                    $arr    = ['.jpeg','.jpg','.png'];
                    $aran   = str_replace($arr, '', $ifg->gambar);
                    $file   = $aran.'.'.request('gambar')
                                    ->getClientOriginalExtension();
                    $old    = rename('infografis/'.$ifg->gambar, 
                                'infografis/'.$file.'-old');
                    $upload = request('gambar')
                                    ->move(public_path('infografis/'), $file);

                    $ifg->update([
								'katbahasa_id' => request('katbahasa_id'),
								'judul'        => request('judul'),
								'publikasi'    => request('publikasi'),
								'deskripsi'    => request('deskripsi'),
								'gambar'       => $file
                            ]);

                    return redirect()
                                ->route('igrafis')
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
                        ->witherror('Extensi File infografis Bukan .jpeg, .jpg, .png  Mohon Upload File Yang Benar');
            }
            
        }else{

            $ifg->update([
						'katbahasa_id' => request('katbahasa_id'),
						'judul'        => request('judul'),
						'publikasi'    => request('publikasi'),
						'deskripsi'    => request('deskripsi')
                    ]);

            return redirect()
                        ->route('igrafis')
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
    public function destroy(infografis $ifg)
    {

        $arr     = ['.jpeg','.JPEG','.jpg','.JPG','.png','.PNG'];
        $cfile   = str_replace($arr, '', $ifg->gambar); 
        $file1   = public_path('infografis/'.$ifg->gambar);

        foreach ($arr as $k) {

            $file2   = public_path('infografis/'.$cfile.$k.'-old');
            $delfile = File::delete($file1,$file2);

        }


            $ifg->delete();

            return back()
                    // ->withhapus('Successfully... Delete From Database')
                    ->withdelete('Berhasil... Hapus Data Dari Database');
    }

}
