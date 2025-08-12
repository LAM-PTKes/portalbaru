<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\KatBahasa;
use App\Footer;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $footer     = Footer::latest()->get();

        return view('admin.footer.footer', compact('no', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.footer.tfooter', compact('katbhs'));
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
        $request->validate([
            'katbahasa' => 'required|exists:kat_bahasas,id',
            'njudul'    => 'required|string|max:255',
            'nlink'     => 'nullable|string|max:255',
            'url'       => 'nullable|url',
            'nfile'     => 'nullable|file|mimes:jpg,jpeg,png|max:5120', // maks 5MB
        ]);

        $id     = (string) Str::uuid();
        $file   = $request->file('nfile');
        $filename = null;

        if ($file) {
            $filename = 'footer-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('img', $filename, 'nfs_documents'); // Simpan ke disk NFS
        }

        Footer::create([
            'id'           => str_replace('-', '', $id),
            'katbahasa_id' => $request->katbahasa,
            'njudul'       => $request->njudul,
            'nlink'        => $request->nlink,
            'url'          => $request->url,
            'nfile'        => $filename,
        ]);

        return redirect()->route('footer')
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
    public function edit(Footer $fweb)
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.footer.efooter', compact('fweb', 'katbhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footer $fweb)
    {
        $request->validate([
            'katbahasa' => 'required|exists:kat_bahasas,id',
            'njudul'    => 'required|string|max:255',
            'nlink'     => 'nullable|string|max:255',
            'url'       => 'nullable|url',
            'nfile'     => 'nullable|file|mimes:jpg,jpeg,png|max:5120', // max 5MB
        ]);

        $file     = $request->file('nfile');
        $filename = $fweb->nfile;
        $disk     = Storage::disk('nfs_documents');

        // Jika ada file baru
        if ($file) {
            // Hapus file lama jika ada
            if ($filename && $disk->exists('img/' . $filename)) {
                $disk->delete('img/' . $filename);
            }

            // Simpan file baru
            $filename = 'footer-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('img', $filename, 'nfs_documents');
        }

        // Update data
        $fweb->update([
            'katbahasa_id' => $request->katbahasa,
            'njudul'       => $request->njudul,
            'nlink'        => $request->nlink,
            'url'          => $request->url,
            'nfile'        => $filename,
        ]);

        return redirect()->route('footer')
            ->with('success', 'Berhasil... Update Data Ke Database');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $fweb)
    {
        $disk = Storage::disk('nfs_documents');
        $filePath     = 'img/' . $fweb->nfile;
        $filePathOld  = 'img/' . $fweb->nfile . '-old';

        // Hapus file utama jika ada
        if ($fweb->nfile && $disk->exists($filePath)) {
            $disk->delete($filePath);
        }

        // Hapus file cadangan jika ada
        if ($fweb->nfile && $disk->exists($filePathOld)) {
            $disk->delete($filePathOld);
        }

        // Hapus data dari database
        $fweb->delete();

        return back()
            ->with('hapus', 'Successfully... Delete From Database')
            ->with('delete', 'Berhasil... Hapus Data Dari Database');
    }
}
