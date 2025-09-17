<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        $beritas    = Berita::where('is_show', '1')->latest()->get();

        return view('admin.berita.berita', compact('no', 'beritas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpublish()
    {
        $no         = 1;
        $beritas    = Berita::where('is_show', '0')->latest()->get();

        return view('admin.berita.berita', compact('no', 'beritas'));
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
        $regulid    = KatBerita::where('namakbrt', 'Regulasi')->first();

        // return $regulid->id;
        return view('admin.berita.tberita', compact('katbrt', 'katbhs', 'regulid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->isi);
        // return $request->isi;
        // Validasi input
        $request->validate([
            'katbahasa'      => 'required|exists:kat_bahasas,id',
            'katberita'      => 'required|exists:kat_beritas,id',
            'judul'          => 'required|string|max:255',
            'isi'            => 'required|string',
            'headline_news'  => 'required|in:Ya,Tidak',
            'is_show'        => 'required|in:0,1',
            'kat_regulasi'   => 'nullable|string',
            'file_gambar'    => 'nullable|image|mimes:jpeg,jpg,png|max:5120', // max 5MB
        ]);

        // return request('kat_regulasi');
        // Generate ID dan pastikan belum dipakai (opsional)
        do {
            $id = str_replace('-', '', Str::uuid());
        } while (Berita::where('id', $id)->exists());

        $filename = null;

        if ($request->hasFile('file_gambar')) {
            $file     = $request->file('file_gambar');
            $ext      = $file->getClientOriginalExtension();
            $katbrt   = KatBerita::findOrFail($request->katberita);
            $basename = strtolower(str_replace(' ', '', $katbrt->namakbrt)) . '-' . date('dmY') . '-' . time();
            $filename = $basename . '.' . $ext;

            // Simpan gambar ke folder public/img menggunakan storeAs
            $path = $file->storeAs('img', $filename, 'nfs_documents');
        }

        // Simpan data ke database
        $berita = Berita::create([
            'id'              => $id,
            'katbahasa_id'    => $request->katbahasa,
            'katberita_id'    => $request->katberita,
            'judul'           => $request->judul,
            'isi'             => $request->isi,
            'kat_regulasi'    => $request->kat_regulasi ?: null,
            'file_gambar'     => $filename,
            'headline_news'   => $request->headline_news,
            'is_show'         => $request->is_show,
        ]);

        $route = $request->is_show == '1' ? 'berita' : 'brtunpublish';

        return redirect()->route($route)
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
    public function edit(Berita $berita)
    {

        $katbrt     = KatBerita::orderby('namakbrt')->get();
        $katbhs     = KatBahasa::orderby('namakbhs')->get();
        $regulid    = KatBerita::where('namakbrt', 'Regulasi')->first();

        return view('admin.berita.eberita', compact('berita', 'katbrt', 'katbhs', 'regulid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'katbahasa'     => 'required|exists:kat_bahasas,id',
            'katberita'     => 'required|exists:kat_beritas,id',
            'judul'         => 'required|string|max:255',
            'isi'           => 'required|string',
            'headline_news' => 'required|in:Ya,Tidak',
            'is_show'       => 'required|in:0,1',
            'kat_regulasi'  => 'nullable|string',
            'file_gambar'   => 'nullable|image|mimes:jpeg,jpg,png|max:5120', // 5MB
        ]);

        $filename = $berita->file_gambar;

        if ($request->hasFile('file_gambar')) {
            $file     = $request->file('file_gambar');
            $ext      = $file->getClientOriginalExtension();
            $namakbrt = $berita->katberita->namakbrt ?? 'berita';
            $filename = strtolower(str_replace(' ', '', $namakbrt)) . '-' . date('dmY') . '-' . time() . '.' . $ext;

            // Hapus file lama jika ada
            $oldFile = 'img/' . $berita->file_gambar;
            if ($berita->file_gambar && Storage::disk('nfs_documents')->exists($oldFile)) {
                Storage::disk('nfs_documents')->delete($oldFile);
            }

            // Simpan file baru
            $file->storeAs('img', $filename, 'nfs_documents');
        }

        // Update ke database
        $berita->update([
            'katbahasa_id'   => $request->katbahasa,
            'katberita_id'   => $request->katberita,
            'judul'          => $request->judul,
            'isi'            => $request->isi,
            'kat_regulasi'   => $request->kat_regulasi ?: null,
            'file_gambar'    => $filename,
            'headline_news'  => $request->headline_news,
            'is_show'        => $request->is_show,
        ]);

        $route = $request->is_show == '1' ? 'berita' : 'brtunpublish';

        return redirect()->route($route)
            ->with('asup', 'Successfully... Update To Database')
            ->with('success', 'Berhasil... Update Data Ke Database');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        $disk = Storage::disk('nfs_documents');

        // Siapkan path file gambar asli dan -old
        $filePaths = [];

        if (!empty($berita->file_gambar)) {
            $filePaths[] = 'img/' . $berita->file_gambar;
            $filePaths[] = 'img/' . $berita->file_gambar . '-old';
        }

        // Hapus file jika ditemukan
        foreach ($filePaths as $path) {
            if ($disk->exists($path)) {
                $disk->delete($path);
            }
        }

        // Hapus data dari database
        $berita->delete();

        return back()
            ->with('hapus', 'Successfully... Delete From Database')
            ->with('delete', 'Berhasil... Hapus Data Dari Database');
    }
}
