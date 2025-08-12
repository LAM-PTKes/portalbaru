<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Renstra;
use App\KatBahasa;

class RenstraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $no      = 1;
        $renstra = Renstra::latest()->get();
        $katbhs  = KatBahasa::orderby('namakbhs')->get();

        return view('admin.renstra.renstra', compact('no', 'renstra', 'katbhs'));
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
     */ public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'katbahasa_id' => 'required|integer',
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'publikasi'    => 'required|date',
            'nfile'        => 'required|file|mimes:pdf|max:25600', // 25MB
        ]);

        // Buat UUID dan pastikan unik
        $id = str_replace('-', '', Str::uuid());
        if (Renstra::where('id', $id)->exists()) {
            return back()->witherror('Gagal... ID sudah digunakan.');
        }

        // Simpan file
        $file     = $request->file('nfile');
        $filename = 'File-renstra-' . date('dmY') . '-' . time() . '.' . $file->getClientOriginalExtension();
        $path     = $file->storeAs('renstra', strtolower($filename), 'nfs_documents');

        // Simpan ke database
        Renstra::create([
            'id'           => $id,
            'katbahasa_id' => $request->katbahasa_id,
            'judul'        => $request->judul,
            'deskripsi'    => $request->deskripsi,
            'publikasi'    => $request->publikasi,
            'nfile'        => strtolower($filename)
        ]);

        return redirect()
            ->route('renstra')
            ->withSuccess('Berhasil... Data tersimpan.');
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
    public function edit(Request $request)
    {
        $jnl = Renstra::findOrFail($request->id);

        // Validasi input
        $rules = [
            'katbahasa_id' => 'required|integer',
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'publikasi'    => 'required|date',
        ];

        // Kalau ada file baru, tambahkan validasi file
        if ($request->hasFile('nfile')) {
            $rules['nfile'] = 'file|mimes:pdf|max:25600'; // 25 MB
        }

        $request->validate($rules);

        // Kalau ada file baru → hapus file lama, lalu upload yang baru
        if ($request->hasFile('nfile')) {
            // Hapus file lama
            if ($jnl->nfile && Storage::disk('nfs_documents')->exists('renstra/' . $jnl->nfile)) {
                Storage::disk('nfs_documents')->delete('renstra/' . $jnl->nfile);
            }

            // Upload file baru
            $file     = $request->file('nfile');
            $filename = 'File-renstra-' . date('dmY') . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('renstra', strtolower($filename), 'nfs_documents');

            // Update data dengan file baru
            $jnl->update([
                'katbahasa_id' => $request->katbahasa_id,
                'judul'        => $request->judul,
                'deskripsi'    => $request->deskripsi,
                'publikasi'    => $request->publikasi,
                'nfile'        => strtolower($filename)
            ]);
        } else {
            // Update data tanpa ganti file
            $jnl->update([
                'katbahasa_id' => $request->katbahasa_id,
                'judul'        => $request->judul,
                'deskripsi'    => $request->deskripsi,
                'publikasi'    => $request->publikasi
            ]);
        }

        return redirect()
            ->route('renstra')
            ->withsuccess('Berhasil... Data berhasil diperbarui.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renstra $rnt)
    {
        // Hapus file dari storage jika ada
        if ($rnt->nfile && Storage::disk('nfs_documents')->exists('renstra/' . $rnt->nfile)) {
            Storage::disk('nfs_documents')->delete('renstra/' . $rnt->nfile);
        }

        // Hapus data dari database
        $rnt->delete();

        return back()->withDelete('Berhasil... Hapus Data Dari Database');
    }
}
