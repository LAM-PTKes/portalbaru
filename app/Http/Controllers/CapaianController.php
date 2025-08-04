<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\KatBahasa;
use App\CapaianTahunan;

class CapaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $katbhs     = KatBahasa::orderby('namakbhs')->get();
        $capaian    = CapaianTahunan::latest()->get();
        $bulan      = [
                        'January','February','March','April','May','June','July','August','September','October','November','December'
                        ];
        $ganti      = [
                        'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
                        ];

        return view('admin.capaian.capaian', compact('no','capaian','bulan','ganti','katbhs'));

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
        $cekid  = CapaianTahunan::where('id', $id)->get();

        if (count($cekid) == 0) {

            $ext    = request('nama_file')->extension();
            // $mb     = filesize(request('nama_file'));
            // $tomb   = number_format($mb / 1048576,2);
    		$bulan  = [
                        'January','February','March','April','May','June','July','August','September','October','November','December'
                        ];
    	    $ganti  = [
    	                'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
    	                ];

            if ($ext == 'rar' || $ext == 'zip' || $ext =='pdf' || $ext == 'docx' || $ext == 'doc' || $ext =='xlsx' || $ext == 'xls' || $ext == 'pptx' || $ext == 'ppt') {
                
    	        
                $file       = 'Capaian '.
                				str_replace($bulan, $ganti, date('F Y', strtotime(request('tahun'))))
                				.'-'.time().'.'.request('nama_file')->getClientOriginalExtension();
                $upload     = request('nama_file')
                                ->move(public_path('unduhan/'), $file);

                $asup       = CapaianTahunan::create([
                                'id'                => $id,
                                'katbahasa_id'      => request('katbahasa'),
                                'judul'             => request('judul'),
                                'tahun'             => date('Y-m-d', strtotime(request('tahun'))),
                                'nama_file'       	=> $file
                            ]);

                return redirect()->route('capaian')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
                
                
            }else {

                return back()->withsalah('File Bukan .rar, .zip, .pdf, .docx, .doc, .xlsx, .xls, .pptx, .ppt')->witherror('Bentuk File Extensi Harus .rar, .zip, .pdf, .docx, .doc, .xlsx, .xls, .pptx, .ppt');
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
    public function edit(CapaianTahunan $cpt)
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.capaian.ecapaian', compact('cpt','katbhs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CapaianTahunan $cpt)
    {

        $cek    = request('nama_file');

        if (!empty($cek)) {

            $ext    = request('nama_file')->extension();

            if ($ext == 'rar' || $ext == 'zip' || $ext =='pdf' || $ext == 'docx' || $ext == 'doc' || $ext =='xlsx' || $ext == 'xls' || $ext == 'pptx' || $ext == 'ppt') {

                    $arr        = ['.rar','.zip','.pdf','.docx',
                    				'.doc','.xlsx','.xls','.pptx','.ppt'];
                    $aran       = str_replace($arr, '', $cpt->nama_file);
                    $file       = $aran.'.'.request('nama_file')->getClientOriginalExtension();
                    $old        = rename('unduhan/'.$cpt->nama_file, 
                    				'unduhan/'.$file.'-old');
                    $upload     = request('nama_file')->move(public_path('unduhan/'), $file);

                    $cpt->update([
                            'katbahasa_id'      => request('katbahasa'),
                            'judul'             => request('judul'),
                            'tahun'             => date('Y-m-d', strtotime(request('tahun'))),
                            'nama_file'       	=> $file
                        ]);

                    return redirect()->route('capaian')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
                
                
            }else {

                return back()->withsalah('File Bukan .rar, .zip, .pdf, .docx, .doc, .xlsx, .xls, .pptx, .ppt')->witherror('Bentuk File Extensi Harus .rar, .zip, .pdf, .docx, .doc, .xlsx, .xls, .pptx, .ppt');
            }
            
        }else{

            $cpt->update([
                                        
                        'katbahasa_id'      => request('katbahasa'),
                        'judul'             => request('judul'),
                        'tahun'             => date('Y-m-d', strtotime(request('tahun')))
                    ]);

            return redirect()->route('capaian')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CapaianTahunan $cpt)
    {

        if (!file_exists('unduhan/'.$cpt->nama_file) && !file_exists('unduhan/'.$cpt->nama_file.'-old')) {
             
                $cpt->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }elseif(file_exists('unduhan/'.$cpt->nama_file) && file_exists('unduhan/'.$cpt->nama_file.'-old')) {

                $path       = public_path('unduhan/');
                $fileName   = $cpt->nama_file;
                $fileName1  = $cpt->nama_file.'-old';
                unlink($path. $fileName);
                unlink($path. $fileName1);

                $cpt->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }else {
                
                $path       = public_path('unduhan/');
                $fileName   = $cpt->nama_file;
                unlink($path. $fileName);
                $cpt->delete();

                return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');

            }
    }
}
