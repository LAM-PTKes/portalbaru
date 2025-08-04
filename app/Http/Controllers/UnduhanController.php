<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Unduhan;
use App\KatBahasa;
use App\KatUnduhan;
use Illuminate\Support\Facades\Storage;


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
        $request->validate([
            'katbahasa'          => 'required|exists:kat_bahasas,id',
            'katunduhan'         => 'required|exists:kat_unduhans,id',
            'judul'              => 'required|string|max:255',
            'jenjang'            => 'nullable|string|max:100',
            'bidang_ilmu'        => 'nullable|string|max:255',
            'deskripsi'          => 'nullable|string',
            'pengguna_instrumen' => 'nullable|string',
            'nama_file'          => 'required|file|mimes:rar,zip,pdf,doc,docx,xlsx,xls,ppt,pptx|max:20480', // 20MB
        ]);

        $id = (string) Str::uuid();

        if (Unduhan::where('id', $id)->exists()) {
            return back()->with('salah', 'ID sudah digunakan, silakan coba lagi')->with('error', 'ID already exists');
        }

        try {
            $file     = $request->file('nama_file');
            $katundh  = KatUnduhan::findOrFail($request->katunduhan);

            $filename = $katundh->namaundh . '-' . date('dmY') . '-' . time() . '.' . $file->getClientOriginalExtension();

            // Simpan file ke disk NFS
            $path = Storage::disk('nfs_documents')->putFileAs('unduhan', $file, $filename);

            if (!$path) {
                throw new \Exception('Gagal menyimpan file ke disk nfs_documents.');
            }

            // Simpan data ke database
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
        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan unduhan:', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString()
            ]);

            return back()->with('salah', 'Terjadi kesalahan saat menyimpan data atau file.')
                ->with('error', $e->getMessage());
        }
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
    public function update(Unduhan $und)
    {

        $cek    = request('nama_file');

        if (!empty($cek)) {

            $ext    = request('nama_file')->extension();

            if ($ext == 'rar' || $ext == 'zip' || $ext == 'pdf' || $ext == 'docx' || $ext == 'doc' || $ext == 'xlsx' || $ext == 'xls' || $ext == 'pptx' || $ext == 'ppt') {

                $arr        = [
                    '.rar',
                    '.zip',
                    '.pdf',
                    '.docx',
                    '.doc',
                    '.xlsx',
                    '.xls',
                    '.pptx',
                    '.ppt'
                ];
                $aran       = str_replace($arr, '', $und->nama_file);
                $file       = $aran . '.' . request('nama_file')->getClientOriginalExtension();
                $old        = rename(
                    'unduhan/' . $und->nama_file,
                    'unduhan/' . $file . '-old'
                );
                $upload     = request('nama_file')->move(public_path('unduhan/'), $file);

                $und->update([
                    'katbahasa_id'       => request('katbahasa'),
                    'katunduhan_id'      => request('katunduhan'),
                    'judul'              => request('judul'),
                    'jenjang'            => request('jenjang'),
                    'bidang_ilmu'        => request('bidang_ilmu'),
                    'deskripsi'          => request('deskripsi'),
                    'pengguna_instrumen' => empty(request('pengguna_instrumen')) ? null : request('pengguna_instrumen'),
                    'nama_file'          => $file
                ]);

                return redirect()->route('unduhan')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
            } else {

                return back()->withsalah('File Bukan .rar, .zip, .pdf, .docx, .doc, .xlsx, .xls, .pptx, .ppt')->witherror('Bentuk File Extensi Harus .rar, .zip, .pdf, .docx, .doc, .xlsx, .xls, .pptx, .ppt');
            }
        } else {

            $und->update([
                'katbahasa_id'       => request('katbahasa'),
                'katunduhan_id'      => request('katunduhan'),
                'judul'              => request('judul'),
                'jenjang'            => request('jenjang'),
                'bidang_ilmu'        => request('bidang_ilmu'),
                'pengguna_instrumen' => empty(request('pengguna_instrumen')) ? null : request('pengguna_instrumen'),
                'deskripsi'          => request('deskripsi')
            ]);

            return redirect()->route('unduhan')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
        }
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
