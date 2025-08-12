<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Newsletter;
use App\KatBahasa;

class NewsletterController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $newsletter = Newsletter::latest()->get();

        return view('admin.newsletter.newsletter', compact('no', 'newsletter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.newsletter.tnewsletter', compact('katbhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'katbahasa_id' => 'required|string',
            'judul'        => 'required|string|max:255',
            'publikasi'    => 'required|string',
            'deskripsi'    => 'nullable|string',
            'gambar'       => 'required|file|mimes:jpeg,jpg,png|max:25600', // 25 MB = 25600 KB
        ], [
            'gambar.mimes' => 'Extensi file harus .jpeg, .jpg, atau .png',
            'gambar.max'   => 'File terlalu besar, maksimal 25 MB',
        ]);

        // Generate UUID tanpa tanda "-"
        $id = str_replace('-', '', Str::uuid());

        // Pastikan ID belum dipakai
        if (Newsletter::where('id', $id)->exists()) {
            return back()->withError('Gagal... ID sudah digunakan');
        }

        // Simpan file ke storage
        $filename = 'File-newsletter-' . date('dmY') . '-' . time() . '.' . $request->file('gambar')->extension();
        $path     = $request->file('gambar')->storeAs('newsletter', strtolower($filename), 'nfs_documents');

        // Simpan ke database
        Newsletter::create([
            'id'           => $id,
            'katbahasa_id' => $request->katbahasa_id,
            'judul'        => $request->judul,
            'publikasi'    => $request->publikasi,
            'deskripsi'    => $request->deskripsi,
            'gambar'       => strtolower($filename),
        ]);

        return redirect()
            ->route('nletter')
            ->withSuccess('Berhasil... Simpan Data Ke Database');
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
    public function edit(Newsletter $nlt)
    {

        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.newsletter.enewsletter', compact('nlt', 'katbhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $nlt)
    {
        // Validasi
        $rules = [
            'katbahasa_id' => 'required|string',
            'judul'        => 'required|string|max:255',
            'publikasi'    => 'required|string',
            'deskripsi'    => 'nullable|string',
        ];

        // Tambahkan validasi file hanya jika ada file baru
        if ($request->hasFile('gambar')) {
            $rules['gambar'] = 'file|mimes:jpeg,jpg,png|max:25600'; // 25 MB
        }

        $request->validate($rules, [
            'gambar.mimes' => 'Extensi file harus .jpeg, .jpg, atau .png',
            'gambar.max'   => 'File terlalu besar, maksimal 25 MB',
        ]);

        // Kalau ada file baru
        if ($request->hasFile('gambar')) {
            // Hapus file lama (kalau ada)
            if ($nlt->gambar && Storage::disk('nfs_documents')->exists('newsletter/' . $nlt->gambar)) {
                Storage::disk('nfs_documents')->delete('newsletter/' . $nlt->gambar);
            }

            // Simpan file baru
            $filename = 'File-newsletter-' . date('dmY') . '-' . time() . '.' . $request->file('gambar')->extension();
            $request->file('gambar')->storeAs('newsletter', strtolower($filename), 'nfs_documents');

            // Update dengan gambar baru
            $nlt->update([
                'katbahasa_id' => $request->katbahasa_id,
                'judul'        => $request->judul,
                'publikasi'    => $request->publikasi,
                'deskripsi'    => $request->deskripsi,
                'gambar'       => strtolower($filename),
            ]);
        } else {
            // Update tanpa ganti gambar
            $nlt->update([
                'katbahasa_id' => $request->katbahasa_id,
                'judul'        => $request->judul,
                'publikasi'    => $request->publikasi,
                'deskripsi'    => $request->deskripsi,
            ]);
        }

        return redirect()
            ->route('nletter')
            ->withSuccess('Berhasil... Update Database');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $nlt)
    {
        // Hapus file lama jika ada
        if ($nlt->gambar && Storage::disk('nfs_documents')->exists('newsletter/' . $nlt->gambar)) {
            Storage::disk('nfs_documents')->delete('newsletter/' . $nlt->gambar);
        }

        // Hapus data di database
        $nlt->delete();

        return back()->withdelete('Berhasil... Hapus Data Dari Database');
    }
}
