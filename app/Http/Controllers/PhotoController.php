<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\KatBahasa;
use App\CoverPhoto;
use App\AlbumPhoto;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $photo      = AlbumPhoto::latest()->get();

        return view('admin.photo.photo', compact('no', 'photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();
        $cover         = CoverPhoto::orderby('nama_cover_id')->get();

        return view('admin.photo.tphoto', compact('katbhs', 'cover'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $limit 	= 10 * 1024 * 1024;
        // $tomb   	= number_format($mb / 1048576,2);
        // $valid 	= array('png','jpg','jpeg');
        $valid     = ['png', 'jpg', 'jpeg'];
        $gnt    = ['.jpg', '.jpeg', '.png'];
        $jml     = count(request('nama_file'));
        $no     = 1;

        foreach (request('nama_file') as $v) {

            $ext = $v->extension();



            if (!in_array($ext, $valid)) {

                redirect()->route('photo')->witherror('System Mendeteksi Ada File Selain .jpg, .jpeg, .png Tidak Di Simpan Ke Database');
                continue;
            } else {


                $id     = str_replace('-', '', Str::uuid());
                $cekid  = AlbumPhoto::where('id', $id)->get();

                if (count($cekid) == 0) {


                    $file   = request('cover_id') . '-' . date('dmY', strtotime(request('thn_albump'))) . '-' . time() . $no++ . '.' . $v->getClientOriginalExtension();
                    $v->storeAs('album/gallery/', strtolower($file), 'nfs_documents');

                    $asup   = AlbumPhoto::create([
                        'id'           => $id,
                        'katbahasa_id' => request('katbahasa'),
                        'cover_id'     => request('cover_id'),
                        'nphoto'       => request('nphoto'),
                        'thn_albump'   => date('Y-m-d', strtotime(request('thn_albump'))),
                        'nama_file'    => strtolower($file)
                    ]);
                } else {

                    return back()->withsalah('Data Gagal Di Simpan Ke Database Id Sudah Digunakan User lain')->witherror('Failled... Save To Database Id Already Used');
                }
            }
        }


        return redirect()->route('photo')->withasup('Successfully... Save To Database')->withsuccess('Berhasil... Simpan Data Ke Database');
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
    public function edit(AlbumPhoto $pht)
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();
        $cover         = CoverPhoto::orderby('nama_cover_id')->get();

        return view('admin.photo.ephoto', compact('pht', 'katbhs', 'cover'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(AlbumPhoto $pht)
    {
        $fileBaru = request()->file('nama_file');

        // Kalau ada file baru yang diupload
        if ($fileBaru) {
            $ext = strtolower($fileBaru->extension());

            // Validasi ekstensi
            if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                return back()->withsalah('File Bukan .jpg, .jpeg, .png')
                    ->witherror('Bentuk File Extensi Harus .jpg, .jpeg, .png');
            }

            // Hapus file lama kalau ada
            if (Storage::disk('nfs_documents')->exists('album/gallery/' . $pht->nama_file)) {
                Storage::disk('nfs_documents')->delete('album/gallery/' . $pht->nama_file);
            }

            // Nama file baru tetap pakai pola lama
            $arr    = ['.jpeg', '.jpg', '.png'];
            $aran   = str_replace($arr, '', $pht->nama_file);
            $namaFileBaru = strtolower($aran . '.' . $ext);

            // Simpan file baru
            $fileBaru->storeAs('album/gallery', $namaFileBaru, 'nfs_documents');

            // Update DB termasuk nama file
            $pht->update([
                'katbahasa_id' => request('katbahasa'),
                'cover_id'     => request('cover_id'),
                'nphoto'       => request('nphoto'),
                'thn_albump'   => date('Y-m-d', strtotime(request('thn_albump'))),
                'nama_file'    => $namaFileBaru
            ]);
        } else {
            // Kalau tidak ada file baru, update data selain file
            $pht->update([
                'katbahasa_id' => request('katbahasa'),
                'cover_id'     => request('cover_id'),
                'nphoto'       => request('nphoto'),
                'thn_albump'   => date('Y-m-d', strtotime(request('thn_albump')))
            ]);
        }

        return redirect()->route('photo')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(AlbumPhoto $pht)
    {
        // Hapus file dari storage jika ada
        if ($pht->nfile && Storage::disk('nfs_documents')->exists('album/gallery/' . $pht->nama_file)) {
            Storage::disk('nfs_documents')->delete('album/gallery/' . $pht->nama_file);
        }

        // Hapus data dari database
        $pht->delete();

        return back()->withDelete('Berhasil... Hapus Data Dari Database');
    }


    public function lanjut()
    {

        // for ($i = 0; $i <= 10; $i++) {

        // 	if ($i == 5) {
        // 		// break;
        // 		// continue;
        // 		return true;
        // 	}
        // 	echo $i.'<br>';
        // }

        // collect([1,2,3,4])->each(function ($item){
        //           if ($item == 2) {
        //               return false;
        //           }
        //           echo $item.'<br>';
        // });
    }
}
