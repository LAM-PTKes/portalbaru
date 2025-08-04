<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\HasilAkreditasi;


class AkreditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no             = 1;
        $akreditasi     = HasilAkreditasi::where('is_show','1')->latest()->get();

        return view('admin.akreditasi.akreditasi',compact('no','akreditasi'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpublish()
    {
        
        $no             = 1;
        $sidang         = HasilAkreditasi::max('sidang');
        $akreditasi     = HasilAkreditasi::where([
                                    ['is_show','0'],
                                    ['sidang','<=', $sidang]
                                ])
                            ->latest()
                            ->get();

        return view('admin.akreditasi.upakreditasi',compact('no','akreditasi'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addsimak()
    {

        // $sidang         = HasilAkreditasi::select('sidang')
        //                     // ->latest()
        //                     ->orderby('sidang', 'desc')
        //                     ->distinct('sidang')
        //                     ->get();
        $sidang         = HasilAkreditasi::max('sidang');
        $akreditasi     = HasilAkreditasi::where([
                                    ['is_show', '2'],
                                    ['sidang',$sidang]
                                ])
                            ->orderby('nama_pt')
                            ->get();
        $no=1;
        
        return view('admin.akreditasi.takreditasi', compact('akreditasi','no','sidang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publishsimak(Request $request)
    {
        $sidang     = request('sidang_ke');
        $cek        = HasilAkreditasi::where([
                                    ['is_show', '2'],
                                    ['sidang', $sidang ]
                                ])
                            ->get();
        $aya        = HasilAkreditasi::where([
                                    ['is_show', '=', '1'],
                                    ['sidang', $sidang ]
                                ])
                            ->get();
        // return $cek;
        if (count($cek) > 0) {

            foreach ($cek as $v) {
                
                $db     = HasilAkreditasi::where([
                                        ['kode_pt', $v->kode_pt],
                                        ['kode_ps', $v->kode_ps],
                                        ['sidang', '!=', $sidang],

                                    ])
                                ->update([
                                           'is_show' => '0'
                                    ]);
            }
        
            $akreditasi     = HasilAkreditasi::where([
                                        ['is_show', '2'],
                                        ['sidang', $sidang ]
                                    ])
                                ->update([
                                           'is_show' => '1'
                                        ]);

            return back()
                    ->withasup('Successfully... Publish Sidang Ke '.$sidang.' Ada '.count($cek).' Yang Di Publish')
                    ->withsuccess('Sidang Majelis Ke '.$sidang.' Berhasil Di Publish '.' Ada '.count($cek).' Yang Di Publish');

        }elseif (count($aya) > 0) {

            return back()
                    ->withsalah('Failed... Publish Sidang Ke '.$sidang.' Sudah Di Publish Sebelumnya')
                    ->witherror('Sidang Sidang Majelis Ke '.$sidang.' Gagal Di Publish');

        }else {
            
            return back()
                      ->withsalah('Failed... Publish Sidang Ke '.$sidang)
                      ->witherror('Sidang Sidang Majelis Ke '.$sidang.' Gagal Di Publish');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statuspub(HasilAkreditasi $hasil)
    {
        
        $hasil->update([

                'is_show'               => '1'
        ]);

        return back()
                  ->withasup('Successfully... Update To Database')
                  ->withsuccess('Berhasil... Publish Hasil Akreditasi Nama Perguruan Tinggi : '.$hasil->nama_pt);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusunpub(HasilAkreditasi $hasil)
    {
        
        $hasil->update([

                'is_show'               => '0'
        ]);

        return back()->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Unpublish Hasil Akreditasi Nama Perguruan Tinggi : '.$hasil->nama_pt);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        // $sidang_majelis = '58'; //nanti ini lo buat berdasarkan pilihan sidang majelis ya mas
        $sidang_majelis     = request('sidang');

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/getHasilMajelis",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "sidang_majelis=".$sidang_majelis,
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $result = json_decode($response);
        // // return count($result->data);
        // return $result->data;

        // if ($err) {
        //         echo "cURL Error #:" . $err; 
        //         exit;
        // } else {

        //    return $result->data;

        // }

        $akre   = HasilAkreditasi::where('sidang', $sidang_majelis)->get();
        $cekdb  = HasilAkreditasi::max('id_lawas');
        $tbhid  = $cekdb+1;
        $idlws  = 1;

        if (count($akre) == 0) {

            if ($err) {
                echo "cURL Error #:" . $err; 
                exit;
            } else {

                // $result = json_decode( $response);

                if (!empty($result->data)) {

                    foreach ($result->data as $key) {

                            $kode_pt                = $key->kode_pt;
                            $nama_pt                = $key->nama_pt;
                            $kode_ps                = $key->kode_ps;
                            $nama_ps                = $key->nama_ps;
                            $jenjang_ps             = $key->jenjang_ps;
                            $nomor_sk               = $key->nomor_sk;
                            $peringkat_akademis     = $key->peringkat_akademis;
                            $peringkat_profesi      = $key->peringkat_profesi;
                            $peringkat_spesialis    = $key->peringkat_spesialis;
                            $tanggal_kadaluarsa     = $key->tanggal_kadaluarsa;
                            $tahun_sk               = $key->tahun_sk;
                            $tgl_sk                 = $key->tanggal_sk;
                            $no_urut                = $key->no_urut;
                            $status_kadaluarsa      = $key->status_kadaluarsa;
                            $rumpun_ilmu            = $key->rumpun_ilmu;
                            $id_sms                 = $key->id_sms;
                            $sk_akreditasi_id       = $key->sk_akreditasi_id;

                   
                            HasilAkreditasi::create([

                                'id'                    => str_replace('-', '', Str::uuid()),
                                'kode_pt'               => $kode_pt,
                                'nama_pt'               => $nama_pt,
                                'kode_ps'               => $kode_ps,
                                'nama_ps'               => $nama_ps,
                                'jenjang'               => $jenjang_ps,
                                'no_sk'                 => $nomor_sk,
                                'peringkat_akademis'    => $peringkat_akademis == 'Err' ?
                                                           'TIDAK TERAKREDITASI': $peringkat_akademis,
                                'peringkat_profesi'     => $peringkat_profesi == 'Err'  ?
                                                           'TIDAK TERAKREDITASI': $peringkat_profesi,
                                'peringkat_spesialis'   => $peringkat_spesialis == 'Err' ?
                                                           'TIDAK TERAKREDITASI': $peringkat_spesialis,
                                'tgl_kadaluarsa'        => $tanggal_kadaluarsa,
                                'thn_sk'                => $tahun_sk,
                                'tgl_sk'                => date('Y-m-d', strtotime($tgl_sk)),
                                'status_kadaluarsa'     => $tanggal_kadaluarsa < date('Y-m-d') ? 
                                                            'DALUWARSA' : 'MASIH BERLAKU',
                                'rumpun_ilmu'           => $rumpun_ilmu,
                                'is_show'               => '2',
                                'id_sms'                => $id_sms,
                                'sk_akreditasi_id'      => $sk_akreditasi_id,
                                'sidang'                => $sidang_majelis,
                                'id_lawas'              => !empty($cekdb) ? $tbhid++ : $idlws++

                            ]);

                    }
                   
                    return back()->withasup('Successfully... Save To Database')->withsuccess('Sidang Majelis Ke '.$sidang_majelis.' Berhasil Disimpan Ke Database');
                    
                }else {

                    return back()->withsalah('Failed... Save To Database')->witherror('Sidang Majelis Ke '.$sidang_majelis.' Belum Ada');

                }
                
            }

        }else {
            
             return back()->withsalah('Failed... Save To Database')->witherror('Sidang Majelis Ke '.$sidang_majelis.' Sudah Ada Di Database');

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
    public function edit(HasilAkreditasi $hasil)
    {
        
        return view('admin.akreditasi.eakreditasi', compact('hasil'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HasilAkreditasi $hasil)
    {
        
        $hasil->update([

                'kode_pt'               => request('kode_pt'),
                'kode_ps'               => request('kode_ps'),
                'nama_pt'               => request('nama_pt'),
                'nama_ps'               => request('nama_ps'),
                'jenjang'               => request('jenjang'),
                'no_sk'                 => request('no_sk'),
                'peringkat_akademis'    => request('peringkat_akademis'),
                'peringkat_profesi'     => request('peringkat_profesi'),
                'peringkat_spesialis'   => request('peringkat_spesialis'),
                'tgl_kadaluarsa'        => date('Y-m-d', strtotime(request('tgl_kadaluarsa'))),
                'thn_sk'                => request('thn_sk'),
                'status_kadaluarsa'     => request('status_kadaluarsa'),
                'rumpun_ilmu'           => request('rumpun_ilmu'),
                'id_sms'                => request('id_sms'),
                'sk_akreditasi_id'      => request('sk_akreditasi_id'),
                'sidang'                => request('sidang'),
                'is_show'               => request('is_show')
        ]);

        if ($hasil->is_show == '1') {
            
            return redirect()->route('akreditasi')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
            
        }else {

            return redirect()->route('unpublishhasilakre')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Update Data Ke Database');
        }

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
