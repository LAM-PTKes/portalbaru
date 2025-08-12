<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Riset;
use App\KatBahasa;

class RisetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no    = 1;
        $riset = Riset::latest()->get();

        return view('admin.riset.riset', compact('no', 'riset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.riset.triset', compact('katbhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ public function store(Request $request)
    {
        // Buat UUID unik
        $id = str_replace('-', '', Str::uuid());
        if (Riset::where('id', $id)->exists()) {
            return back()->withError('Gagal... ID sudah digunakan.');
        }

        // Validasi input
        $request->validate([
            'judul_riset'           => 'required|string|max:255',
            'pengarang_riset'       => 'required|string|max:255',
            'katbahasa_id'          => 'required|string',
            'publikasi'             => 'required|string',
            'ringkasan_hasil_riset' => 'nullable|string',
            'file_riset'            => 'required|file|mimes:pdf|max:25600', // 25MB
            'gambar_riset'          => 'required|file|mimes:jpeg,jpg,png|max:25600', // 25MB
        ]);

        // Upload file riset
        $fileRisetName = 'File-Riset-' . date('dmY') . '-' . time() . '.' . $request->file('file_riset')->getClientOriginalExtension();
        $request->file('file_riset')->storeAs('riset', strtolower($fileRisetName), 'nfs_documents');

        // Upload gambar riset
        $gambarRisetName = 'File-Image-Riset-' . date('dmY') . '-' . time() . '.' . $request->file('gambar_riset')->getClientOriginalExtension();
        $request->file('gambar_riset')->storeAs('riset', strtolower($gambarRisetName), 'nfs_documents');

        // Simpan ke database
        Riset::create([
            'id'                    => $id,
            'judul_riset'           => $request->judul_riset,
            'pengarang_riset'       => $request->pengarang_riset,
            'katbahasa_id'          => $request->katbahasa_id,
            'publikasi'             => $request->publikasi,
            'ringkasan_hasil_riset' => $request->ringkasan_hasil_riset,
            'file_riset'            => strtolower($fileRisetName),
            'gambar_riset'          => strtolower($gambarRisetName)
        ]);

        return redirect()
            ->route('riset')
            ->withsuccess('Berhasil... Simpan Data Ke Database');
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
    public function edit(Riset $rst)
    {

        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.riset.eriset', compact('rst', 'katbhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ public function update(Request $request, Riset $rst)
    {
        // Validasi dasar
        $rules = [
            'judul_riset'           => 'required|string|max:255',
            'pengarang_riset'       => 'required|string|max:255',
            'katbahasa_id'          => 'required|string',
            'publikasi'             => 'required|string',
            'ringkasan_hasil_riset' => 'nullable|string',
        ];

        // Jika file riset diupload
        if ($request->hasFile('file_riset')) {
            $rules['file_riset'] = 'file|mimes:pdf|max:25600'; // 25MB
        }

        // Jika gambar riset diupload
        if ($request->hasFile('gambar_riset')) {
            $rules['gambar_riset'] = 'file|mimes:jpeg,jpg,png|max:25600'; // 25MB
        }

        $request->validate($rules);

        // Kalau file_riset baru diupload, hapus file lama lalu upload baru
        if ($request->hasFile('file_riset')) {
            if ($rst->file_riset && Storage::disk('nfs_documents')->exists('riset/' . $rst->file_riset)) {
                Storage::disk('nfs_documents')->delete('riset/' . $rst->file_riset);
            }
            $fileRisetName = 'File-Riset-' . date('dmY') . '-' . time() . '.' . $request->file('file_riset')->getClientOriginalExtension();
            $request->file('file_riset')->storeAs('riset', strtolower($fileRisetName), 'nfs_documents');
            $rst->file_riset = strtolower($fileRisetName);
        }

        // Kalau gambar_riset baru diupload, hapus file lama lalu upload baru
        if ($request->hasFile('gambar_riset')) {
            if ($rst->gambar_riset && Storage::disk('nfs_documents')->exists('riset/' . $rst->gambar_riset)) {
                Storage::disk('nfs_documents')->delete('riset/' . $rst->gambar_riset);
            }
            $gambarRisetName = 'File-Image-Riset-' . date('dmY') . '-' . time() . '.' . $request->file('gambar_riset')->getClientOriginalExtension();
            $request->file('gambar_riset')->storeAs('riset', strtolower($gambarRisetName), 'nfs_documents');
            $rst->gambar_riset = strtolower($gambarRisetName);
        }

        // Update field lainnya
        $rst->judul_riset           = $request->judul_riset;
        $rst->pengarang_riset       = $request->pengarang_riset;
        $rst->katbahasa_id          = $request->katbahasa_id;
        $rst->publikasi             = $request->publikasi;
        $rst->ringkasan_hasil_riset = $request->ringkasan_hasil_riset;
        $rst->save();

        return redirect()
            ->route('riset')
            ->withSuccess('Berhasil... Update Database');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ public function destroy(Riset $rst)
    {
        // Hapus file riset jika ada
        if ($rst->file_riset && Storage::disk('nfs_documents')->exists('riset/' . $rst->file_riset)) {
            Storage::disk('nfs_documents')->delete('riset/' . $rst->file_riset);
        }

        // Hapus gambar riset jika ada
        if ($rst->gambar_riset && Storage::disk('nfs_documents')->exists('riset/' . $rst->gambar_riset)) {
            Storage::disk('nfs_documents')->delete('riset/' . $rst->gambar_riset);
        }

        // Hapus record database
        $rst->delete();

        return back()->withDelete('Berhasil... Hapus Data Dari Database');
    }
}
