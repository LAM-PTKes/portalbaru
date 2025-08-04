<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\HasilAkreditasi;
use App\Berita;

class SimpanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ch     =   curl_init();
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, 'https://lamptkes.org/kirimdb');
                    $result = curl_exec($ch);
                    curl_close($ch);

            $obj = json_decode($result, true);

        return $obj;

        foreach ($obj as  $v) {
            // echo $v['norgan'].'<br>';
            // return $v;

            $asup   = HasilAkreditasi::create([
                        'id'                => str_replace('-', '', Str::uuid()),
                        // 'katbahasa_id'      => $v['katbahasa_id'] == 1 ? '72f57c4787294e5f9810736e9391adbc' : '61e33957c7c24462ae016588759fa604',

                        'kode_pt'           => $v['kode_pt'],
                        'nama_pt'           => $v['nama_pt'],
                        'kode_ps'           => $v['kode_ps'],
                        'nama_ps'           => $v['nama_ps'],
                        'jenjang'           => $v['jenjang'],
                        'wil'           => $v['wil'],
                        'no_sk'           => $v['no_sk'],
                        'peringkat_akademis'           => $v['peringkat_akademis'],
                        'peringkat_profesi'           => $v['peringkat_profesi'],
                        'peringkat_spesialis'           => $v['peringkat_spesialis'],
                        'tgl_sk'           => $v['tgl_sk'],
                        'tgl_kadaluarsa'           => $v['tgl_kadaluarsa'],
                        'thn_sk'           => $v['thn_sk'],
                        'status_kadaluarsa'           => $v['tgl_kadaluarsa'] < date('Y-m-d') ? 
                                                            'DALUWARSA' : 'MASIH BERLAKU',
                        'rumpun_ilmu'           => $v['rumpun_ilmu'],
                        'is_show'           => $v['is_show'] == '1' ? '1' : '0',
                        'sidang'           => $v['sidang'],
                        'id_sms'           => $v['id_sms'],
                        'sk_akreditasi_id'           => $v['sk_akreditasi_id'],
                        'id_sms'           => $v['id_sms'],
                        'id_lawas'           => $v['id']
                    ]);

            // $asup = Berita::create([
            //             'id'                => str_replace('-', '', Str::uuid()),
            //             'katbahasa_id'      => $v['katbahasa_id'] == 1 ? '72f57c4787294e5f9810736e9391adbc' : '61e33957c7c24462ae016588759fa604',
            //             'katberita_id'  => '324809a35811472c82759fc9fac20d52',
            //             'judul'         => $v['judul'],
            //             'isi'         => $v['isi'],
            //             'file_gambar'         => $v['file_gambar'],
            //             'headline_news'         => $v['headline_news'],
            //             'populer'         => $v['populer'],
            //             'is_show'         => $v['is_show']


            //         ]);
        }

        return 'cek db';

// (($condition_1) ? "output_1" : (($condition_2) ?  "output_2" : "output_3"));

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
        //
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
    public function destroy($id)
    {
        //
    }
}
