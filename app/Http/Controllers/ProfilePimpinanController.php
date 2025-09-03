<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\KatBahasa;
use App\KategoriProfile;
use App\ProfilePimpinan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilePimpinanController extends Controller
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
        $profil = ProfilePimpinan::orderby('nama')->get();

        return view('admin.profil.pimpinan', compact('no', 'bhs', 'profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetProfile(Request $request)
    {
        $dt = KategoriProfile::where('katbahasa_id', $request->q)
            ->orderBy('nama_profile')
            ->get();

        // $html = '<option value="">Pilih Profil</option>';
        // foreach ($dt as $k) {
        //     $html .= '<option value="' . $k->id . '">' . $k->nama_profile . '</option>';
        // }

        // return response($html);
        return response()->json(['data' => $dt]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetJabatan(Request $request)
    {
        $dt = Jabatan::where('katbahasa_id', $request->q)
            ->orderBy('jabatan')
            ->get();

        return response()->json(['data' => $dt]);
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
            'katbahasa_id'  => 'required|string',
            'katprofile_id' => 'required|string',
            'jabatan_id'    => 'required|string',
            'nama'          => 'required|string',
            'no_urut'       => 'required|integer',
            'img'           => 'required|file|mimes:jpg,jpeg,png|max:20480',
        ]);

        do {
            $id = str_replace('-', '', Str::uuid());
        } while (ProfilePimpinan::where('id', $id)->exists());

        $file     = $request->file('img');
        $filename = date('dmY') . '-' . time() . '.' . $file->getClientOriginalExtension();
        $path     = $file->storeAs('img', $filename, 'nfs_documents');

        ProfilePimpinan::create([
            'id'            => $id,
            'katbahasa_id'  => $request->katbahasa_id,
            'katprofile_id' => $request->katprofile_id,
            'jabatan_id'    => $request->jabatan_id,
            'nama'          => $request->nama,
            'no_urut'       => $request->no_urut,
            'img'           => $filename,
        ]);

        return back()->withsuccess('Data berhasil simpan kedatabase');
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
    public function edit($id)
    {
        //
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
        $request->validate([
            'ekatbahasa_id'  => 'required|string',
            'ekatprofile_id' => 'required|string',
            'ejabatan_id'    => 'required|string',
            'enama'          => 'required|string',
            'eno_urut'       => 'required|integer',
            'eimg'           => 'nullable|file|mimes:jpg,jpeg,png|max:20480',
        ]);

        $up = ProfilePimpinan::find($request->id);

        if (!$up) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        $data = [
            'katbahasa_id'  => $request->ekatbahasa_id,
            'katprofile_id' => $request->ekatprofile_id,
            'jabatan_id'    => $request->ejabatan_id,
            'nama'          => $request->enama,
            'no_urut'       => $request->eno_urut,
        ];

        // kalau ada file baru
        if ($request->hasFile('eimg')) {
            // hapus file lama
            if ($up->img && Storage::disk('nfs_documents')->exists('img/' . $up->img)) {
                Storage::disk('nfs_documents')->delete('img/' . $up->img);
            }

            // upload file baru
            $file     = $request->file('eimg');
            $filename = date('dmY') . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path     = $file->storeAs('img', $filename, 'nfs_documents');

            $data['img'] = $filename; // atau $path kalau mau simpan path lengkap
        }

        $up->update($data);

        return back()->with('success', 'Update data berhasil');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilePimpinan $ppl)
    {
        $data = ProfilePimpinan::find($ppl);

        if (!$data) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        // hapus file kalau ada
        if ($data->img && Storage::disk('nfs_documents')->exists('img/' . $data->img)) {
            Storage::disk('nfs_documents')->delete('img/' . $data->img);
        }

        $data->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
