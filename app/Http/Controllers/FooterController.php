<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\KatBahasa;
use App\Footer;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $footer 	= Footer::latest()->get();

        return view('admin.footer.footer', compact('no','footer'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.footer.tfooter', compact('katbhs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cek    = request('nfile');
        $id     = str_replace('-', '', Str::uuid());
        $cekid  = Footer::where('id', $id)->get();

        if (count($cekid) == 0) {

            if (!empty($cek)) {

                $ext    = request('nfile')->extension();
                // $mb     = filesize(request('nfile'));
                // $tomb   = number_format($mb / 1048576,2);
                
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext =='png') {
                    
                    
                    $file       = 'footer'.'-'.time().'.'
                                    .request('nfile')->getClientOriginalExtension();
                    $upload     = request('nfile')
                                    ->move(public_path('img/'), $file);

                    $asup       = Footer::create([
                                    'id'                => $id,
                                    'katbahasa_id'      => request('katbahasa'),
                                    'njudul'            => request('njudul'),
                                    'nlink'             => request('nlink'),
                                    'url'               => request('url'),
                                    'nfile'             => $file
                                ]);

                    return redirect()->route('footer')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
                    
                    
                }else {

                    return back()->withsalah('File Bukan .jpg, .jpeg, .png')->witherror('Bentuk File Extensi Harus .jpg, .jpeg, .png');
                }

            }else {

                $asup       = Footer::create([
                                'id'                => $id,
                                'katbahasa_id'      => request('katbahasa'),
                                'njudul'            => request('njudul'),
                                'nlink'             => request('nlink'),
                                'url'               => request('url')
                            ]);

                    return redirect()->route('footer')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
                    
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
    public function edit(Footer $fweb)
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.footer.efooter', compact('fweb','katbhs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Footer $fweb)
    {

        $cek    = request('nfile');

        if (!empty($cek)) {

            $ext    = request('nfile')->extension();

            if ($ext == 'jpg' || $ext == 'jpeg' || $ext =='png') {

                    $arr        = ['.jpeg','.jpg','.png'];
                    $aran       = str_replace($arr, '', $fweb->nfile);
                    $file       = $aran.'.'.request('nfile')->getClientOriginalExtension();
                    $old        = rename('img/'.$fweb->nfile, 
                    				'img/'.$file.'-old');
                    $upload     = request('nfile')->move(public_path('img/'), $file);

                    $fweb->update([
                            'katbahasa_id'      => request('katbahasa'),
                            'njudul'      		=> request('njudul'),
                            'nlink'           	=> request('nlink'),
                            'url'         		=> request('url'),
                            'nfile'       		=> $file
                        ]);

                    return redirect()->route('footer')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
                
                
            }else {

                return back()->withsalah('File Bukan .jpg, .jpeg, .png')->witherror('Bentuk File Extensi Harus .jpg, .jpeg, .png');
            }
            
        }else{

            $fweb->update([
                            'katbahasa_id'      => request('katbahasa'),
                            'njudul'      		=> request('njudul'),
                            'nlink'           	=> request('nlink'),
                            'url'         		=> request('url')
                    ]);

            return redirect()->route('footer')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $fweb)
    {

        if (!file_exists('img/'.$fweb->nfile) && !file_exists('img/'.$fweb->nfile.'-old')) {
             
                $fweb->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }elseif(file_exists('img/'.$fweb->nfile) && file_exists('img/'.$fweb->nfile.'-old')) {

                $path       = public_path('img/');
                $fileName   = $fweb->nfile;
                $fileName1  = $fweb->nfile.'-old';
                unlink($path. $fileName);
                unlink($path. $fileName1);

                $fweb->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }else {
                
                $path       = public_path('img/');
                $fileName   = $fweb->nfile;
                unlink($path. $fileName);
                $fweb->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }
    }
}
