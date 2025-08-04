<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Berita;
use App\KatBerita;
use App\KatBahasa;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $beritas    = Berita::where('is_show','1')->latest()->get();

        return view('admin.berita.berita', compact('no','beritas'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpublish()
    {
        $no         = 1;
        $beritas    = Berita::where('is_show','0')->latest()->get();

        return view('admin.berita.berita', compact('no','beritas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katbrt     = KatBerita::orderby('namakbrt')->get();
        $katbhs     = KatBahasa::orderby('namakbhs')->get();
        $regulid    = KatBerita::where('namakbrt','Regulasi')->first();
        
        // return $regulid->id;
        return view('admin.berita.tberita', compact('katbrt','katbhs','regulid'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek    = request('file_gambar');
        $id     = str_replace('-', '', Str::uuid());
        $cekid  = Berita::where('id', $id)->get();

        if (count($cekid) == 0) {

            if (!empty($cek)) {
                
                $ext    = request('file_gambar')->extension();
                $katbrt = KatBerita::where('id', request('katberita'))->first();
                // $mb     = filesize(request('file_gambar'));
                // $tomb   = number_format($mb / 1048576,2);

                if ($ext == 'jpeg' || $ext == 'jpg' || $ext =='png') {
                    
                    $file       = $katbrt->namakbrt.'-'.date('dmY').
                                    '-'.time().'.'.request('file_gambar')
                                    ->getClientOriginalExtension();
                    $upload     = request('file_gambar')
                                    ->move(public_path('img/'), str_replace(' ', '', strtolower($file)));

                    $asup       = Berita::create([
                                    'id'                => $id,
                                    'katbahasa_id'      => request('katbahasa'),
                                    'katberita_id'      => request('katberita'),
                                    'judul'             => request('judul'),
                                    'isi'               => request('isi'),
                                    'kat_regulasi'      => empty(request('kat_regulasi')) ? null : request('kat_regulasi'),
                                    'file_gambar'       => str_replace(' ', '', strtolower($file)),
                                    'headline_news'     => request('headline_news'),
                                    'is_show'           => request('is_show')
                                ]);

                    if (request('is_show') == '1') {

                        return redirect()->route('berita')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
                    }else {

                        return redirect()->route('brtunpublish')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
                    }
                    
                }else {

                    return back()->withsalah('Image Harus File .png, .jpg atau .jpeg')->witherror('Image Berita Bukan Berupa File .png, .jpg atau .jpeg');
                }

            }else {

                $asup       = Berita::create([
                                'id'                => $id,
                                'katbahasa_id'      => request('katbahasa'),
                                'katberita_id'      => request('katberita'),
                                'judul'             => request('judul'),
                                'isi'               => request('isi'),
                                'kat_regulasi'      => empty(request('kat_regulasi')) ? null : request('kat_regulasi'),
                                'headline_news'     => request('headline_news'),
                                'is_show'           => request('is_show')
                            ]);

                if (request('is_show') == '1') {

                    return redirect()->route('berita')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
                }else {

                    return redirect()->route('brtunpublish')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
                }
            }
        }else {

            return back()->withsalah('Data Gagal Di Simpan Ke Database Id Berita Sudah Digunakan')->witherror('Failled... Save To Database Id Already Used');

        }
        
        // return 'ok';
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
    public function edit(Berita $berita)
    {

        $katbrt     = KatBerita::orderby('namakbrt')->get();
        $katbhs     = KatBahasa::orderby('namakbhs')->get();
        $regulid    = KatBerita::where('namakbrt','Regulasi')->first();

        return view('admin.berita.eberita', compact('berita','katbrt','katbhs','regulid'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Berita $berita)
    {

        $cek    = request('file_gambar');

        if (!empty($cek)) {

            $ext    = request('file_gambar')->extension();

            if ($ext == 'jpeg' || $ext == 'jpg' || $ext =='png') {

                    if (!empty($berita->file_gambar)) {
                    
                        $arr        = ['.jpeg','.jpg','.png','.JPG','.JPEG','.PNG'];
                        $aran       = str_replace($arr, '', $berita->file_gambar);
                        $file       = str_replace(' ', '', $aran.'.'.request('file_gambar')
                                            ->getClientOriginalExtension());
                        $old        = rename('img/'.$berita->file_gambar, 'img/'.$file.'-old');
                        $upload     = request('file_gambar')->move(public_path('img/'), $file);

                    }else {

                        $file       = $berita->katberita->namakbrt.'-'.date('dmY').
                                        '-'.time().'.'.request('file_gambar')
                                        ->getClientOriginalExtension();
                        $upload     = request('file_gambar')
                                        ->move(public_path('img/'), str_replace(' ', '', strtolower($file)));
                    }

                    $berita->update([
                                'katbahasa_id'      => request('katbahasa'),
                                'katberita_id'      => request('katberita'),
                                'judul'             => request('judul'),
                                'isi'               => request('isi'),
                                'kat_regulasi'      => empty(request('kat_regulasi')) ? null : request('kat_regulasi'),
                                'file_gambar'       => empty($berita->file_gambar) ? 
                                                        str_replace(' ', '', strtolower($file)) :
                                                        $file,
                                'headline_news'     => request('headline_news'),
                                'is_show'           => request('is_show')
                            ]);


                if (request('is_show') == '1') {

                    return redirect()->route('berita')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
                }else {

                    return redirect()->route('brtunpublish')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
                }
                
            }else {

                return back()->withsalah('Image Harus File .png, .jpg atau .jpeg')->witherror('Image Berita Bukan Berupa File .png, .jpg atau .jpeg');
            }
            
        }else{

            $berita->update([
                        'katbahasa_id'      => request('katbahasa'),
                        'katberita_id'      => request('katberita'),
                        'judul'             => request('judul'),
                        'isi'               => request('isi'),
                        'kat_regulasi'      => empty(request('kat_regulasi')) ? null : request('kat_regulasi'),
                        'headline_news'     => request('headline_news'),
                        'is_show'           => request('is_show')
                    ]);

            if (request('is_show') == '1') {

                return redirect()->route('berita')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
            }else {

                return redirect()->route('brtunpublish')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
            }

        }

        // return request('kat_regulasi');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {

        if (empty($berita->file_gambar) || !file_exists('img/'.$berita->file_gambar) && !file_exists('img/'.$berita->file_gambar.'-old')) {
             
                $berita->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }elseif(file_exists('img/'.$berita->file_gambar) && file_exists('img/'.$berita->file_gambar.'-old')) {

                $path       = public_path('img/');
                $fileName   = $berita->file_gambar;
                $fileName1  = $berita->file_gambar.'-old';
                unlink($path. $fileName);
                unlink($path. $fileName1);

                $berita->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }else {
                
                $path       = public_path('img/');
                $fileName   = $berita->file_gambar;
                unlink($path. $fileName);
                $berita->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }
    }
}
