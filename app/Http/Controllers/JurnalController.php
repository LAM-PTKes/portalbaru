<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Jurnal;
use App\KatBahasa;

class JurnalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no    = 1;
        $jurnal = Jurnal::latest()->get();

        return view('admin.jurnal.jurnal', compact('no', 'jurnal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.jurnal.tjurnal', compact('katbhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'katbahasa_id' => 'required|exists:kat_bahasas,id',
            'nama_penulis' => 'required|string|max:255',
            'judul_jurnal' => 'required|string|max:255',
            'kata_kunci'   => 'nullable|string|max:255',
            'abstrak'      => 'nullable|string',
            'publikasi'    => 'required|string',
            'file_jurnal'  => 'required|file|mimes:pdf|max:25600', // 25MB = 25600 KB
        ]);

        // Generate UUID yang unik
        do {
            $id = Str::uuid()->toString();
        } while (Jurnal::where('id', $id)->exists());

        $filename = null;

        if ($request->hasFile('file_jurnal')) {
            $file     = $request->file('file_jurnal');
            $judul    = Str::slug($request->judul_jurnal ?? 'jurnal');
            $ext      = $file->getClientOriginalExtension();
            $filename = 'File-jurnal-' . now()->format('dmY-His') . '.' . $ext;

            // Simpan file ke disk (misalnya 'nfs_documents')
            $file->storeAs('jurnal', strtolower($filename), 'nfs_documents');
        }

        // Simpan ke database
        Jurnal::create([
            'id'           => $id,
            'katbahasa_id' => $request->katbahasa_id,
            'nama_penulis' => $request->nama_penulis,
            'judul_jurnal' => $request->judul_jurnal,
            'kata_kunci'   => $request->kata_kunci,
            'abstrak'      => $request->abstrak,
            'publikasi'    => $request->publikasi,
            'file_jurnal'  => strtolower($filename),
        ]);

        return redirect()
            ->route('jurnal')
            ->with('success', 'Berhasil... Simpan Data Ke Database');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurnal $jnl)
    {

        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.jurnal.ejurnal', compact('jnl', 'katbhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurnal $jnl)
    {
        // Validasi
        $validated = $request->validate([
            'katbahasa_id' => 'required|exists:kat_bahasas,id',
            'nama_penulis' => 'required|string|max:255',
            'judul_jurnal' => 'required|string|max:255',
            'kata_kunci'   => 'nullable|string|max:255',
            'abstrak'      => 'nullable|string',
            'publikasi'    => 'required|string',
            'file_jurnal'  => 'nullable|file|mimes:pdf|max:25600', // 25MB = 25600 KB
        ]);

        $filename = $jnl->file_jurnal;

        if ($request->hasFile('file_jurnal')) {
            $file    = $request->file('file_jurnal');
            $judul   = Str::slug($request->judul_jurnal ?? 'jurnal');
            $ext     = $file->getClientOriginalExtension();
            $filename = 'File-jurnal-' . now()->format('dmY-His') . '.' . $ext;

            // Hapus file lama jika ada
            $oldPath = 'jurnal/' . $jnl->file_jurnal;
            if ($jnl->file_jurnal && Storage::disk('nfs_documents')->exists($oldPath)) {
                Storage::disk('nfs_documents')->delete($oldPath);
            }

            // Simpan file baru
            $file->storeAs('jurnal', strtolower($filename), 'nfs_documents');
        }

        // Update ke database
        $jnl->update([
            'katbahasa_id' => $request->katbahasa_id,
            'nama_penulis' => $request->nama_penulis,
            'judul_jurnal' => $request->judul_jurnal,
            'kata_kunci'   => $request->kata_kunci,
            'abstrak'      => $request->abstrak,
            'publikasi'    => $request->publikasi,
            'file_jurnal'  => strtolower($filename),
        ]);

        return redirect()
            ->route('jurnal')
            ->with('success', 'Berhasil... Update Database');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurnal $jnl)
    {

        $disk = Storage::disk('nfs_documents');

        // Siapkan file paths yang mungkin ada
        $filePaths = [];

        if (!empty($cpt->gambar)) {
            $filePaths[] = 'jurnal/' . $jnl->file_jurnal;
            $filePaths[] = 'jurnal/' . $jnl->file_jurnal . '-old';
        }

        // Hapus file jika ditemukan
        foreach ($filePaths as $path) {
            if ($disk->exists($path)) {
                $disk->delete($path);
            }
        }

        // Hapus record dari database
        $jnl->delete();

        return back()->with('delete', 'Berhasil... Hapus Data Dari Database');
    }
}
