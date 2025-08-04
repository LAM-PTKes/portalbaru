<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Riset;
use App\KatBahasa;

class RisetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no    = 1;
        $riset = Riset::latest()->get();

        return view('admin.riset.riset', compact('no','riset'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.riset.triset', compact('katbhs'));
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
        $cekid  = Riset::where('id', $id)->get();

        if (count($cekid) == 0) {

            $ext     = request('file_riset')->extension();
            $ext1    = request('gambar_riset')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('file_riset'));
            $size1   = filesize(request('gambar_riset'));

            if ($ext == 'pdf') {

                if ($size <= $sizemax) {

                    if ($ext1 == 'jpeg' || $ext1 == 'jpg' || $ext1 == 'png') {

                        if ($size1 <= $sizemax) {

                            $file       = 'File-Riset-'.date('dmY').
                                            '-'.time().'.'.request('file_riset')
                                            ->getClientOriginalExtension();
                            $upload     = request('file_riset')
                                            ->move(public_path('riset/'), strtolower($file));
                            $file1      = 'File-Image-Riset-'.date('dmY').
                                            '-'.time().'.'.request('gambar_riset')
                                            ->getClientOriginalExtension();
                            $upload1    = request('gambar_riset')
                                            ->move(public_path('riset/'), strtolower($file1));

                            $asup   = Riset::create([
                                        'id'                    => $id,
                                        'judul_riset'           => request('judul_riset'),
                                        'pengarang_riset'       => request('pengarang_riset'),
                                        'katbahasa_id'          => request('katbahasa_id'),
                                        'publikasi'             => request('publikasi'),
                                        'ringkasan_hasil_riset' => request('ringkasan_hasil_riset'),
                                        'file_riset'            => strtolower($file),
                                        'gambar_riset'          => strtolower($file1)
                                    ]);

                            return redirect()
                                        ->route('riset')
                                        // ->withasup('Successfully... Save To Database')
                                        ->withsuccess('Berhasil... Simpan Data Ke Database');
                            
                        }else {
                
                            return back()
                                    // ->withsalah('Failed... Input Data')
                                    ->witherror('File Image Terlalu Besar,  Max Upload File 25 Mb');
                            
                        }
                        
                    }else {
                
                        return back()
                                // ->withsalah('Failed... Input Data')
                                ->witherror('Extensi File Image Bukan .jpeg, .png, & .jpg  Mohon Upload File Yang Benar');
                        
                    }
                    
                }else {
                
                    return back()
                            // ->withsalah('Failed... Input Data')
                            ->witherror('File Terlalu Besar,  Max Upload File 25 Mb');
                    
                }
                
            }else {
                
                return back()
                        // ->withsalah('Failed... Input Data')
                        ->witherror('Extensi File Riset Bukan .pdf  Mohon Upload File Yang Benar');
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
    public function edit(Riset $rst)
    {

        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.riset.eriset', compact('rst','katbhs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Riset $rst)
    {
        
        if (!empty(request('file_riset')) && !empty(request('gambar_riset'))) {

            $ext     = request('file_riset')->extension();
            $ext1    = request('gambar_riset')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('file_riset'));
            $size1   = filesize(request('gambar_riset'));

            if ($ext == 'pdf') {

                if ($size <= $sizemax) {

                    if ($ext1 == 'jpeg' || $ext1 == 'jpg' || $ext1 == 'png') {

                        if ($size1 <= $sizemax) {

                                $arr    = ['.pdf'];
                                $aran   = str_replace($arr, '', $rst->file_riset);
                                $file   = $aran.'.'.request('file_riset')
                                                ->getClientOriginalExtension();
                                $old    = rename('riset/'.$rst->file_riset, 
                                            'riset/'.$file.'-old');
                                $upload = request('file_riset')
                                                ->move(public_path('riset/'), $file);

                                $arr1    = ['.jpeg','.jpg','.png'];
                                $aran1   = str_replace($arr1, '', $rst->gambar_riset);
                                $file1   = $aran1.'.'.request('file_riset')
                                                ->getClientOriginalExtension();
                                $old1    = rename('riset/'.$rst->gambar_riset, 
                                            'riset/'.$file1.'-old');
                                $upload1 = request('gambar_riset')
                                                ->move(public_path('riset/'), $file1);

                                $rst->update([
                                            'judul_riset'           => request('judul_riset'),
                                            'pengarang_riset'       => request('pengarang_riset'),
                                            'katbahasa_id'          => request('katbahasa_id'),
                                            'publikasi'             => request('publikasi'),
                                            'ringkasan_hasil_riset' => request('ringkasan_hasil_riset'),
                                            'file_riset'            => $file,
                                            'gambar_riset'          => $file1
                                        ]);

                                return redirect()
                                            ->route('riset')
                                            // ->withasup('Successfully... Update To Database')
                                            ->withsuccess('Berhasil... Update Database');
                            
                        }else {
                
                            return back()
                                    // ->withsalah('Failed... Input Data')
                                    ->witherror('File Image Terlalu Besar,  Max Upload File 25 Mb');
                            
                        }
                        
                    }else {
                
                        return back()
                                // ->withsalah('Failed... Input Data')
                                ->witherror('Extensi File Image Riset Bukan .jpeg, .jpg, & .png  Mohon Upload File Yang Benar');
                        
                    }
                    
                }else {
                
                    return back()
                            // ->withsalah('Failed... Input Data')
                            ->witherror('File Terlalu Besar,  Max Upload File 25 Mb');
                    
                }
                
            }else {
                
                return back()
                        // ->withsalah('Failed... Input Data')
                        ->witherror('Extensi File Riset Bukan .pdf  Mohon Upload File Yang Benar');
            }
            
        }elseif (!empty(request('file_riset')) && empty(request('gambar_riset'))) {

            $ext     = request('file_riset')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('file_riset'));

            if ($ext == 'pdf') {

                if ($size <= $sizemax) {

                    $arr    = ['.pdf'];
                    $aran   = str_replace($arr, '', $rst->file_riset);
                    $file   = $aran.'.'.request('file_riset')
                                    ->getClientOriginalExtension();
                    $old    = rename('riset/'.$rst->file_riset, 
                                'riset/'.$file.'-old');
                    $upload = request('file_riset')
                                    ->move(public_path('riset/'), $file);

                    $rst->update([
                                'judul_riset'           => request('judul_riset'),
                                'pengarang_riset'       => request('pengarang_riset'),
                                'katbahasa_id'          => request('katbahasa_id'),
                                'publikasi'             => request('publikasi'),
                                'ringkasan_hasil_riset' => request('ringkasan_hasil_riset'),
                                'file_riset'            => $file
                            ]);

                    return redirect()
                                ->route('riset')
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
                        ->witherror('Extensi File Riset Bukan .pdf  Mohon Upload File Yang Benar');
            }
            
        }elseif (empty(request('file_riset')) && !empty(request('gambar_riset'))) {

            $ext     = request('gambar_riset')->extension();
            $sizemax = '26214400'; // 25 Mb
            $size    = filesize(request('gambar_riset'));

            if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png') {

                if ($size <= $sizemax) {

                    $arr    = ['.jpeg','.jpg','.png'];
                    $aran   = str_replace($arr, '', $rst->gambar_riset);
                    $file   = $aran.'.'.request('gambar_riset')
                                    ->getClientOriginalExtension();
                    $old    = rename('riset/'.$rst->gambar_riset, 
                                'riset/'.$file.'-old');
                    $upload = request('gambar_riset')
                                    ->move(public_path('riset/'), $file);

                    $rst->update([
                                'judul_riset'           => request('judul_riset'),
                                'pengarang_riset'       => request('pengarang_riset'),
                                'katbahasa_id'          => request('katbahasa_id'),
                                'publikasi'             => request('publikasi'),
                                'ringkasan_hasil_riset' => request('ringkasan_hasil_riset'),
                                'gambar_riset'          => $file
                            ]);

                    return redirect()
                                ->route('riset')
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
                        ->witherror('Extensi File Riset Bukan .pdf  Mohon Upload File Yang Benar');
            }
            
        }else{

            $rst->update([
                        'judul_riset'           => request('judul_riset'),
                        'pengarang_riset'       => request('pengarang_riset'),
                        'katbahasa_id'          => request('katbahasa_id'),
                        'publikasi'             => request('publikasi'),
                        'ringkasan_hasil_riset' => request('ringkasan_hasil_riset')
                    ]);

            return redirect()
                        ->route('riset')
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
    public function destroy(Riset $rst)
    {

        $arr    = ['.pdf','.PDF','.jpeg','.jpg','.png','.JPEG','.PNG','.JPG'];
        $cfile  = str_replace($arr, '', $rst->file_riset); 
        $cfile1 = str_replace($arr, '', $rst->gambar_riset); 
        $file1  = public_path('riset/'.$rst->file_riset);
        $file3  = public_path('riset/'.$rst->gambar_riset);

        foreach ($arr as $k) {

            $file2   = public_path('riset/'.$cfile.$k.'-old');
            $file4   = public_path('riset/'.$cfile1.$k.'-old');
            $delfile = File::delete($file1,$file2,$file3,$file4);

        }


            $rst->delete();

            return back()
                    // ->withhapus('Successfully... Delete From Database')
                    ->withdelete('Berhasil... Hapus Data Dari Database');
    }
}
