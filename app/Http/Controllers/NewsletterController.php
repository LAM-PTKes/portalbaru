<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Newsletter;
use App\KatBahasa;

class NewsletterController extends Controller
{
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$no         = 1;
		$newsletter = Newsletter::latest()->get();

        return view('admin.newsletter.newsletter', compact('no','newsletter'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.newsletter.tnewsletter', compact('katbhs'));
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
        $cekid  = Newsletter::where('id', $id)->get();

        if (count($cekid) == 0) {

            $ext     = request('gambar')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('gambar'));

            if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png') {

                if ($size <= $sizemax) {

                    $file       = 'File-newsletter-'.date('dmY').
                                    '-'.time().'.'.request('gambar')
                                    ->getClientOriginalExtension();
                    $upload     = request('gambar')
                                    ->move(public_path('newsletter/'), strtolower($file));

                    $asup   = Newsletter::create([
								'id'           => $id,
								'katbahasa_id' => request('katbahasa_id'),
								'judul'        => request('judul'),
								'publikasi'    => request('publikasi'),
								'deskripsi'    => request('deskripsi'),
								'gambar'       => strtolower($file)
                            ]);

                    return redirect()
                                ->route('nletter')
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
                        ->witherror('Extensi File newsletter Bukan .jpeg, .jpg, .png  Mohon Upload File Yang Benar');
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
    public function edit(Newsletter $nlt)
    {

        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.newsletter.enewsletter', compact('nlt','katbhs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Newsletter $nlt)
    {
        
        if (!empty(request('gambar'))) {

            $ext     = request('gambar')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('gambar'));

            if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png') {

                if ($size <= $sizemax) {

                    $arr    = ['.jpeg','.jpg','.png'];
                    $aran   = str_replace($arr, '', $nlt->gambar);
                    $file   = $aran.'.'.request('gambar')
                                    ->getClientOriginalExtension();
                    $old    = rename('newsletter/'.$nlt->gambar, 
                                'newsletter/'.$file.'-old');
                    $upload = request('gambar')
                                    ->move(public_path('newsletter/'), $file);

                    $nlt->update([
								'katbahasa_id' => request('katbahasa_id'),
								'judul'        => request('judul'),
								'publikasi'    => request('publikasi'),
								'deskripsi'    => request('deskripsi'),
								'gambar'       => $file
                            ]);

                    return redirect()
                                ->route('nletter')
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
                        ->witherror('Extensi File newsletter Bukan .jpeg, .jpg, .png  Mohon Upload File Yang Benar');
            }
            
        }else{

            $nlt->update([
						'katbahasa_id' => request('katbahasa_id'),
						'judul'        => request('judul'),
						'publikasi'    => request('publikasi'),
						'deskripsi'    => request('deskripsi')
                    ]);

            return redirect()
                        ->route('nletter')
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
    public function destroy(Newsletter $nlt)
    {

        $arr     = ['.jpeg','.JPEG','.jpg','.JPG','.png','.PNG'];
        $cfile   = str_replace($arr, '', $nlt->gambar); 
        $file1   = public_path('newsletter/'.$nlt->gambar);

        foreach ($arr as $k) {

            $file2   = public_path('newsletter/'.$cfile.$k.'-old');
            $delfile = File::delete($file1,$file2);

        }


            $nlt->delete();

            return back()
                    // ->withhapus('Successfully... Delete From Database')
                    ->withdelete('Berhasil... Hapus Data Dari Database');
    }

}
