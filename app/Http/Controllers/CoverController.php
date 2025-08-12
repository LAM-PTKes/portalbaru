<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        $cover      = CoverPhoto::latest()->get();

        return view('admin.cover.cover', compact('no', 'cover'));
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
        // Validasi input dan file
        $request->validate([
            'katbahasa'      => 'required|exists:kat_bahasas,id',
            'nama_cover_id'  => 'required|string|max:255',
            'nama_cover_en'  => 'required|string|max:255',
            'deskripsi'      => 'nullable|string',
            'nfile'          => 'required|image|mimes:jpg,jpeg,png|max:5120', // max 5MB
        ]);

        // Generate ID unik
        do {
            $id = str_replace('-', '', Str::uuid());
        } while (CoverPhoto::where('id', $id)->exists());

        $file     = $request->file('nfile');
        $ext      = $file->getClientOriginalExtension();
        $filename = 'cover-' . time() . '.' . $ext;

        // Simpan ke disk nfs_documents (folder "cover")
        $file->storeAs('cover', $filename, 'nfs_documents');

        // Simpan data ke DB
        CoverPhoto::create([
            'id'             => $id,
            'katbahasa_id'   => $request->katbahasa,
            'nama_cover_id'  => $request->nama_cover_id,
            'nama_cover_en'  => $request->nama_cover_en,
            'deskripsi'      => $request->deskripsi,
            'nfile'          => $filename,
        ]);

        return redirect()->route('cover')
            ->with('asup', 'Successfully... Save To Database')
            ->with('success', 'Berhasil... Simpan Data Ke Database');
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

        return view('admin.cover.ecover', compact('cvr', 'katbhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoverPhoto $cvr)
    {
        // Validasi input dan file opsional
        $request->validate([
            'katbahasa'     => 'required|exists:kat_bahasas,id',
            'nama_cover_id' => 'required|string|max:255',
            'nama_cover_en' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'nfile'         => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $filename = $cvr->nfile;

        if ($request->hasFile('nfile')) {
            $file = $request->file('nfile');
            $ext  = $file->getClientOriginalExtension();

            // Format nama file baru
            $filename = 'cover-' . time() . '.' . $ext;

            // Hapus file lama jika ada
            $disk = Storage::disk('nfs_documents');
            $oldFile = 'cover/' . $cvr->nfile;
            if ($cvr->nfile && $disk->exists($oldFile)) {
                $disk->delete($oldFile);
            }

            // Simpan file baru
            $file->storeAs('cover', $filename, 'nfs_documents');
        }

        // Update data ke database
        $cvr->update([
            'katbahasa_id'   => $request->katbahasa,
            'nama_cover_id'  => $request->nama_cover_id,
            'nama_cover_en'  => $request->nama_cover_en,
            'deskripsi'      => $request->deskripsi,
            'nfile'          => $filename,
        ]);

        return redirect()->route('cover')
            ->with('asup', 'Successfully... Update To Database')
            ->with('success', 'Berhasil... Update Data Ke Database');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoverPhoto $cvr)
    {
        $disk = Storage::disk('nfs_documents');

        // Hapus file cover (utama dan -old)
        $coverFiles = [
            'cover/' . $cvr->nfile,
            'cover/' . $cvr->nfile . '-old',
        ];

        foreach ($coverFiles as $coverFile) {
            if ($disk->exists($coverFile)) {
                $disk->delete($coverFile);
            }
        }

        // Hapus semua album photo terkait
        $photos = AlbumPhoto::where('cover_id', $cvr->id)->get();

        foreach ($photos as $photo) {
            $photoFiles = [
                'album/gallery/' . $photo->nama_file,
                'album/gallery/' . $photo->nama_file . '-old',
            ];

            foreach ($photoFiles as $path) {
                if ($disk->exists($path)) {
                    $disk->delete($path);
                }
            }

            // Hapus record dari tabel album_photo
            $photo->delete();
        }

        // Hapus data cover
        $cvr->delete();

        return back()
            ->with('hapus', 'Successfully... Delete From Database')
            ->with('delete', 'Berhasil... Hapus Data Dari Database');
    }
}
