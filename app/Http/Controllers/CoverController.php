<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\KatBahasa;
use App\CoverPhoto;
use App\AlbumPhoto;

class CoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $cover  	= CoverPhoto::latest()->get();

        return view('admin.cover.cover', compact('no','cover'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.cover.tcover', compact('katbhs'));

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
        $cekid  = CoverPhoto::where('id', $id)->get();

        if (count($cekid) == 0) {

            $ext    = request('nfile')->extension();
            // $mb     = filesize(request('nfile'));
            // $tomb   = number_format($mb / 1048576,2);

            if ($ext == 'jpg' || $ext == 'jpeg' || $ext =='png') {
                
    	        
                $file       = 'cover'.'-'.time().'.'
                				.request('nfile')->getClientOriginalExtension();
                $upload     = request('nfile')
                                ->move(public_path('cover/'), $file);

                $asup       = CoverPhoto::create([
                                'id'                => $id,
                                'katbahasa_id'      => request('katbahasa'),
                                'nama_cover_id'     => request('nama_cover_id'),
                                'nama_cover_en'     => request('nama_cover_en'),
                                'deskripsi'         => request('deskripsi'),
                                'nfile'       		=> $file
                            ]);

                return redirect()->route('cover')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
                
                
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
    public function edit(CoverPhoto $cvr)
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.cover.ecover', compact('cvr','katbhs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoverPhoto $cvr)
    {

        $cek    = request('nfile');

        if (!empty($cek)) {

            $ext    = request('nfile')->extension();

            if ($ext == 'jpg' || $ext == 'jpeg' || $ext =='png') {

                    $arr        = ['.jpeg','.jpg','.png'];
                    $aran       = str_replace($arr, '', $cvr->nfile);
                    $file       = $aran.'.'.request('nfile')->getClientOriginalExtension();
                    $old        = rename('cover/'.$cvr->nfile, 
                    				'cover/'.$file.'-old');
                    $upload     = request('nfile')->move(public_path('cover/'), $file);

                    $cvr->update([
                            'katbahasa_id'      => request('katbahasa'),
                            'nama_cover_id'     => request('nama_cover_id'),
                            'nama_cover_en'     => request('nama_cover_en'),
                            'deskripsi'         => request('deskripsi'),
                            'nfile'       		=> $file
                        ]);

                    return redirect()->route('cover')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
                
                
            }else {

                return back()->withsalah('File Bukan .jpg, .jpeg, .png')->witherror('Bentuk File Extensi Harus .jpg, .jpeg, .png');
            }
            
        }else{

            $cvr->update([
                            'katbahasa_id'      => request('katbahasa'),
                            'nama_cover_id'     => request('nama_cover_id'),
                            'nama_cover_en'     => request('nama_cover_en'),
                            'deskripsi'         => request('deskripsi')
                    ]);

            return redirect()->route('cover')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoverPhoto $cvr)
    {

        if (!file_exists('cover/'.$cvr->nfile) && !file_exists('cover/'.$cvr->nfile.'-old')) {
             

                $photo      = AlbumPhoto::where('cover_id', $cvr->id)->get();
                $pathphoto  = public_path('album/gallery/');
                foreach ($photo as $v) {
                     
                     if (file_exists('album/gallery/'.$v->nama_file) && file_exists('album/gallery/'.$v->nama_file.'-old')) {
                         unlink($pathphoto.$v->nama_file);
                         unlink($pathphoto.$v->nama_file.'-old');
                     }elseif(file_exists('album/gallery/'.$v->nama_file)) {
                         unlink($pathphoto.$v->nama_file);
                     }
                 } 

                 $cvr->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }elseif(file_exists('cover/'.$cvr->nfile) && file_exists('cover/'.$cvr->nfile.'-old')) {

                $photo      = AlbumPhoto::where('cover_id', $cvr->id)->get();
                $pathphoto  = public_path('album/gallery/');
                foreach ($photo as $v) {
                     
                     if (file_exists('album/gallery/'.$v->nama_file) && file_exists('album/gallery/'.$v->nama_file.'-old')) {
                         unlink($pathphoto.$v->nama_file);
                         unlink($pathphoto.$v->nama_file.'-old');
                     }elseif(file_exists('album/gallery/'.$v->nama_file)) {
                         unlink($pathphoto.$v->nama_file);
                     }
                 } 

                $path       = public_path('cover/');
                $fileName   = $cvr->nfile;
                $fileName1  = $cvr->nfile.'-old';
                unlink($path. $fileName);
                unlink($path. $fileName1);

                $cvr->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }else {

                $photo      = AlbumPhoto::where('cover_id', $cvr->id)->get();
                $pathphoto  = public_path('album/gallery/');
                foreach ($photo as $v) {
                     
                     if (file_exists('album/gallery/'.$v->nama_file) && file_exists('album/gallery/'.$v->nama_file.'-old')) {
                         unlink($pathphoto.$v->nama_file);
                         unlink($pathphoto.$v->nama_file.'-old');
                     }elseif(file_exists('album/gallery/'.$v->nama_file)) {
                         unlink($pathphoto.$v->nama_file);
                     }
                 } 
                
                $path       = public_path('cover/');
                $fileName   = $cvr->nfile;
                unlink($path. $fileName);
                $cvr->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }
        
    }
}
