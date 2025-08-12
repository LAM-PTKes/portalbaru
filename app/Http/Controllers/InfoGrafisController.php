<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\InfoGrafis;
use App\KatBahasa;


class InfoGrafisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $infografis = InfoGrafis::latest()->get();

        return view('admin.infografis.infografis', compact('no', 'infografis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.infografis.tinfografis', compact('katbhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'katbahasa_id' => 'required|exists:kat_bahasas,id',
            'judul'        => 'required|string|max:255',
            'publikasi'    => 'nullable|string',
            'deskripsi'    => 'nullable|string',
            'gambar'       => 'required|file|mimes:jpeg,jpg,png|max:25600', // 25MB = 25600KB
        ]);

        // Generate ID dan nama file
        $id = (string) Str::uuid();
        if (InfoGrafis::where('id', $id)->exists()) {
            return back()->with('salah', 'ID sudah digunakan')->with('error', 'ID Already Used');
        }

        $file     = $request->file('gambar');
        $ext      = $file->getClientOriginalExtension();
        $filename = 'file-infografis-' . date('dmY') . '-' . time() . '.' . strtolower($ext);

        // Simpan file ke disk 'nfs_documents'
        $path = $file->storeAs('unduhan', $filename, 'nfs_documents');

        // Simpan ke database
        InfoGrafis::create([
            'id'           => str_replace('-', '', $id),
            'katbahasa_id' => $request->katbahasa_id,
            'judul'        => $request->judul,
            'publikasi'    => $request->publikasi,
            'deskripsi'    => $request->deskripsi,
            'gambar'       => $filename,
        ]);

        return redirect()->route('igrafis')
            ->withasup('Successfully... Save To Database')
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
    public function edit(infografis $ifg)
    {

        $katbhs = KatBahasa::orderby('namakbhs')->get();

        return view('admin.infografis.einfografis', compact('ifg', 'katbhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infografis $ifg)
    {
        // Validasi input
        $request->validate([
            'katbahasa_id' => 'required|exists:kat_bahasas,id',
            'judul'        => 'required|string|max:255',
            'publikasi'    => 'required|string',
            'deskripsi'    => 'nullable|string',
            'gambar'       => 'nullable|file|mimes:jpeg,jpg,png|max:25600', // Max 25MB
        ]);

        $filename = $ifg->gambar;

        if ($request->hasFile('gambar')) {
            $file     = $request->file('gambar');
            $ext      = $file->getClientOriginalExtension();
            $judul    = Str::slug($request->judul ?? 'infografis');
            $filename = $judul . '-' . now()->format('dmY-His') . '.' . $ext;

            // Hapus file lama jika ada
            $oldPath = 'unduhan/' . $ifg->gambar;
            if ($ifg->gambar && Storage::disk('nfs_documents')->exists($oldPath)) {
                Storage::disk('nfs_documents')->delete($oldPath);
            }

            // Simpan file baru
            $file->storeAs('unduhan', $filename, 'nfs_documents');
        }

        // Update database
        $ifg->update([
            'katbahasa_id' => $request->katbahasa_id,
            'judul'        => $request->judul,
            'publikasi'    => $request->publikasi,
            'deskripsi'    => $request->deskripsi,
            'gambar'       => $filename,
        ]);

        return redirect()->route('igrafis')
            ->with('asup', 'Successfully... Update To Database')
            ->with('success', 'Berhasil... Update Data Ke Database');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(infografis $ifg)
    {

        $disk = Storage::disk('nfs_documents');

        // Siapkan file paths yang mungkin ada
        $filePaths = [];

        if (!empty($cpt->gambar)) {
            $filePaths[] = 'unduhan/' . $ifg->gambar;
            $filePaths[] = 'unduhan/' . $ifg->gambar . '-old';
        }

        // Hapus file jika ditemukan
        foreach ($filePaths as $path) {
            if ($disk->exists($path)) {
                $disk->delete($path);
            }
        }

        // Hapus record dari database
        $ifg->delete();

        return back()
            ->with('hapus', 'Successfully... Delete From Database')
            ->with('delete', 'Berhasil... Hapus Data Dari Database');
    }
}
