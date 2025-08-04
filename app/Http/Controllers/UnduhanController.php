<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Unduhan;
use App\KatBahasa;
use App\KatUnduhan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class UnduhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $unduhan    = Unduhan::latest()->get();

        return view('admin.unduhan.unduhan', compact('no', 'unduhan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();
        $katundh    = KatUnduhan::orderby('namaundh')->get();

        return view('admin.unduhan.tunduhan', compact('katbhs', 'katundh'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input dan file upload
        $request->validate([
            'katbahasa'          => 'required|exists:kat_bahasas,id',
            'katunduhan'         => 'required|exists:kat_unduhans,id',
            'judul'              => 'required|string|max:255',
            'jenjang'            => 'nullable|string|max:100',
            'bidang_ilmu'        => 'nullable|string|max:255',
            'deskripsi'          => 'nullable|string',
            'pengguna_instrumen' => 'nullable|string',
            'nama_file'          => 'required|file|mimes:rar,zip,pdf,doc,docx,xlsx,xls,ppt,pptx|max:20480', // max 20MB
        ]);

        $id = (string) Str::uuid();

        // Pastikan UUID belum dipakai (opsional)
        if (Unduhan::where('id', $id)->exists()) {
            return back()->with('salah', 'ID sudah digunakan, silakan coba lagi')->with('error', 'ID already exists');
        }

        $file     = $request->file('nama_file');
        $katundh  = KatUnduhan::findOrFail($request->katunduhan);

        // Format nama file
        $filename = $katundh->namaundh . '-' . date('dmY') . '-' . time() . '.' . $file->getClientOriginalExtension();

        // Simpan file ke disk 'nfs_documents'
        $path = $file->storeAs('unduhan', $filename, 'nfs_documents');

        // Simpan ke database
        Unduhan::create([
            'id'                 => $id,
            'katbahasa_id'       => $request->katbahasa,
            'katunduhan_id'      => $request->katunduhan,
            'judul'              => $request->judul,
            'jenjang'            => $request->jenjang,
            'bidang_ilmu'        => $request->bidang_ilmu,
            'deskripsi'          => $request->deskripsi,
            'pengguna_instrumen' => $request->pengguna_instrumen ?: null,
            'nama_file'          => $filename,
        ]);

        return redirect()->route('unduhan')
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
    public function edit(Unduhan $und)
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();
        $katundh    = KatUnduhan::orderby('namaundh')->get();

        return view('admin.unduhan.eunduhan', compact('und', 'katbhs', 'katundh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unduhan $und)
    {
        // Validasi input
        $request->validate([
            'katbahasa'          => 'required|exists:kat_bahasas,id',
            'katunduhan'         => 'required|exists:kat_unduhans,id',
            'judul'              => 'required|string|max:255',
            'jenjang'            => 'nullable|string|max:100',
            'bidang_ilmu'        => 'nullable|string|max:255',
            'deskripsi'          => 'nullable|string',
            'pengguna_instrumen' => 'nullable|string',
            'nama_file'          => 'nullable|file|mimes:rar,zip,pdf,doc,docx,xlsx,xls,ppt,pptx|max:20480',
        ]);

        $filename = $und->nama_file; // pakai nama lama kalau tidak ada file baru

        if ($request->hasFile('nama_file')) {
            $file       = $request->file('nama_file');
            $ext        = $file->getClientOriginalExtension();
            $namaundh   = $und->katunduhan->namaundh ?? 'file';
            $filename   = $namaundh . '-' . date('dmY') . '-' . time() . '.' . $ext;

            // Hapus file lama jika ada
            $oldFilePath = 'unduhan/' . $und->nama_file;
            if ($und->nama_file && Storage::disk('nfs_documents')->exists($oldFilePath)) {
                Storage::disk('nfs_documents')->delete($oldFilePath);
            }

            // Simpan file baru
            $file->storeAs('unduhan', $filename, 'nfs_documents');
        }

        // Update database
        $und->update([
            'katbahasa_id'       => $request->katbahasa,
            'katunduhan_id'      => $request->katunduhan,
            'judul'              => $request->judul,
            'jenjang'            => $request->jenjang,
            'bidang_ilmu'        => $request->bidang_ilmu,
            'deskripsi'          => $request->deskripsi,
            'pengguna_instrumen' => $request->pengguna_instrumen ?: null,
            'nama_file'          => $filename,
        ]);

        return redirect()->route('unduhan')
            ->with('asup', 'Successfully... Update To Database')
            ->with('success', 'Berhasil... Update Data Ke Database');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unduhan $und)
    {

        // Path file dalam storage NFS
        $filePath = 'unduhan/' . $und->nama_file;
        $filePathOld = 'unduhan/' . $und->nama_file . '-old';

        // Kumpulkan file yang akan dihapus
        $filesToDelete = [];

        // Cek dan tambahkan file yang ada ke array
        if (Storage::disk('nfs_documents')->exists($filePath)) {
            $filesToDelete[] = $filePath;
        }

        if (Storage::disk('nfs_documents')->exists($filePathOld)) {
            $filesToDelete[] = $filePathOld;
        }

        // Hapus file yang ditemukan (jika ada)
        if (!empty($filesToDelete)) {
            Storage::disk('nfs_documents')->delete($filesToDelete);
        }

        // Hapus record dari database
        $und->delete();

        return back()
            ->with('hapus', 'Successfully... Delete From Database')
            ->with('delete', 'Berhasil... Hapus Data Dari Database');
    }
}
