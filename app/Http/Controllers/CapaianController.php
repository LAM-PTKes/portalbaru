<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\KatBahasa;
use App\CapaianTahunan;

class CapaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $katbhs     = KatBahasa::orderby('namakbhs')->get();
        $capaian    = CapaianTahunan::latest()->get();
        $bulan      = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $ganti      = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        return view('admin.capaian.capaian', compact('no', 'capaian', 'bulan', 'ganti', 'katbhs'));
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
     */
    public function store(Request $request)
    {
        // Validasi input dan file
        $request->validate([
            'katbahasa'  => 'required|exists:kat_bahasas,id',
            'judul'      => 'required|string|max:255',
            'tahun'      => 'required|date',
            'nama_file'  => 'required|file|mimes:rar,zip,pdf,doc,docx,xlsx,xls,ppt,pptx|max:20480', // 20MB
        ]);

        // Generate UUID dan pastikan unik (opsional)
        do {
            $id = str_replace('-', '', Str::uuid());
        } while (CapaianTahunan::where('id', $id)->exists());

        $file      = $request->file('nama_file');
        $ext       = $file->getClientOriginalExtension();

        // Konversi nama bulan ke dalam Bahasa Indonesia
        $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $bulanIndo    = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $bulanTahun = str_replace($bulanInggris, $bulanIndo, date('F Y', strtotime($request->tahun)));

        // Format nama file
        $filename = 'Capaian ' . $bulanTahun . '-' . time() . '.' . $ext;

        // Simpan file ke disk nfs_documents dalam folder "unduhan"
        $file->storeAs('unduhan', $filename, 'nfs_documents');

        // Simpan ke database
        CapaianTahunan::create([
            'id'            => $id,
            'katbahasa_id'  => $request->katbahasa,
            'judul'         => $request->judul,
            'tahun'         => date('Y-m-d', strtotime($request->tahun)),
            'nama_file'     => $filename,
        ]);

        return redirect()->route('capaian')
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
    public function edit(CapaianTahunan $cpt)
    {

        $katbhs     = KatBahasa::orderby('namakbhs')->get();

        return view('admin.capaian.ecapaian', compact('cpt', 'katbhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CapaianTahunan $cpt)
    {
        // Validasi input
        $request->validate([
            'katbahasa' => 'required|exists:kat_bahasas,id',
            'judul'     => 'required|string|max:255',
            'tahun'     => 'required|date',
            'nama_file' => 'nullable|file|mimes:rar,zip,pdf,doc,docx,xlsx,xls,ppt,pptx|max:20480',
        ]);

        $filename = $cpt->nama_file;

        if ($request->hasFile('nama_file')) {
            $file = $request->file('nama_file');
            $ext  = $file->getClientOriginalExtension();

            // Format bulan Indonesia
            $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $bulanIndo    = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $bulanTahun   = str_replace($bulanInggris, $bulanIndo, date('F Y', strtotime($request->tahun)));

            $filename = 'Capaian ' . $bulanTahun . '-' . time() . '.' . $ext;

            // Hapus file lama jika ada
            $oldFile = 'unduhan/' . $cpt->nama_file;
            if ($cpt->nama_file && Storage::disk('nfs_documents')->exists($oldFile)) {
                Storage::disk('nfs_documents')->delete($oldFile);
            }

            // Simpan file baru
            $file->storeAs('unduhan', $filename, 'nfs_documents');
        }

        // Update data ke DB
        $cpt->update([
            'katbahasa_id' => $request->katbahasa,
            'judul'        => $request->judul,
            'tahun'        => date('Y-m-d', strtotime($request->tahun)),
            'nama_file'    => $filename,
        ]);

        return redirect()->route('capaian')
            ->with('asup', 'Successfully... Update To Database')
            ->with('success', 'Berhasil... Update Data Ke Database');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CapaianTahunan $cpt)
    {
        $disk = Storage::disk('nfs_documents');

        // Siapkan file paths yang mungkin ada
        $filePaths = [];

        if (!empty($cpt->nama_file)) {
            $filePaths[] = 'unduhan/' . $cpt->nama_file;
            $filePaths[] = 'unduhan/' . $cpt->nama_file . '-old';
        }

        // Hapus file jika ditemukan
        foreach ($filePaths as $path) {
            if ($disk->exists($path)) {
                $disk->delete($path);
            }
        }

        // Hapus record dari database
        $cpt->delete();

        return back()
            ->with('hapus', 'Successfully... Delete From Database')
            ->with('delete', 'Berhasil... Hapus Data Dari Database');
    }
}
