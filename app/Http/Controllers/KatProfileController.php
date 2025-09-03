<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\KatBahasa;
use App\KategoriProfile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KatProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no     = 1;
        $bhs    = KatBahasa::orderby('namakbhs')->get();
        $katpro = KategoriProfile::orderby('nama_profile')->get();

        return view('admin.kategori.katprofile', compact('no', 'katpro', 'bhs'));
        // return $bhs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jabatan()
    {
        $no  = 1;
        $bhs = KatBahasa::orderby('namakbhs')->get();
        $jbt = Jabatan::orderby('jabatan')->get();

        return view('admin.kategori.katjabatan', compact('no', 'jbt', 'bhs'));
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
            'katbahasa_id'   => 'required|string',
            'nama_profile'   => 'required|string',
        ]);

        do {
            $id = str_replace('-', '', Str::uuid());
        } while (KategoriProfile::where('id', $id)->exists());

        // Simpan data
        KategoriProfile::create([
            'id'           => $id,
            'katbahasa_id' => $request->katbahasa_id,
            'nama_profile' => $request->nama_profile,
        ]);

        return back()->withsuccess('Data berhasil diinput');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'katbahasa_id' => 'required|string',
            'jabatan'      => 'required|string|unique:jabatans',
        ]);

        do {
            $id = str_replace('-', '', Str::uuid());
        } while (Jabatan::where('id', $id)->exists());

        // Simpan data
        Jabatan::create([
            'id'           => $id,
            'katbahasa_id' => $request->katbahasa_id,
            'jabatan'      => $request->jabatan,
        ]);

        return back()->withsuccess('Data berhasil diinput');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $cek = Jabatan::find($request->id);

        if (!$cek) {
            return back()->witherror('Data tidak ditemukan');
        }

        $cek->update([

            'katbahasa_id' => $request->ekatbahasa_id,
            'jabatan'      => $request->ejabatan,
        ]);

        return back()->withsucces('Update data Berhasil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cek = KategoriProfile::find($request->id);

        if (!$cek) {
            return back()->witherror('Data tidak ditemukan');
        }

        $cek->update([

            'katbahasa_id' => $request->ekatbahasa_id,
            'nama_profile' => $request->enama_profile,
        ]);

        return back()->withsucces('Update data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriProfile $ktg)
    {
        if (!$ktg) {
            return back()->witherror('Data tidak ditemukan');
        }

        $ktg->delete();
        return back()->withhapus('Delete data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DelKatJabatan(Jabatan $jbt)
    {
        if (!$jbt) {
            return back()->witherror('Data tidak ditemukan');
        }

        $jbt->delete();
        return back()->withhapus('Delete data Berhasil');
    }
}
