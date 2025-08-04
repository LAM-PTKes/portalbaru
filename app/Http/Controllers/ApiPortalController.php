<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class ApiPortalController extends Controller
{
    
    public function ProsesSKAlihBentuk(Request $request)
    {
        $api_key = hash('sha256', 'APIPortalLampkesBentukByAnas!');
        if ($api_key != $request->headers->all()['api-key'][0]) {

            return response()->json([
                'status' => 'Gagal, Api Code Tidak Diterima!',
                'message' => 'Unauthorized!'
            ], 401);
            exit;
        }else{

            $check=DB::select("SELECT id 
                               FROM hasil_akreditasis 
                               WHERE id_sms='".$request->id_sms_baru."'");


            $tanggal_kadaluarsa = date('Y-m-d', strtotime($request->tanggal_akhir_sk));
           
            if (empty($check)) {
                $data_insert = [ 
                        'id'                    => str_replace('-', '', Str::uuid()),
                        'kode_pt'               => $request->kode_pt_baru,
                        'nama_pt'               => $request->nama_pt_baru,
                        'kode_ps'               => $request->kode_ps_baru,
                        'nama_ps'               => $request->nama_ps_baru,
                        'jenjang'               => $request->jenjang_baru,
                        'no_sk'                 => $request->nomor_sk_baru,
                        'peringkat_akademis'    => $request->peringkat_akademis,
                        'peringkat_profesi'     => $request->peringkat_profesi,
                        'peringkat_spesialis'   => $request->peringkat_spesialis,
                        'tgl_kadaluarsa'        => $tanggal_kadaluarsa,
                        'thn_sk'                => $request->tahun_sk,
                        'tgl_sk'                => date('Y-m-d', strtotime($request->tanggal_sk)),
                        'status_kadaluarsa'     => $tanggal_kadaluarsa < date('Y-m-d') ? 
                                                    'DALUWARSA' : 'MASIH BERLAKU',
                        'rumpun_ilmu'           => $request->rumpun_ilmu,
                        'is_show'               => '1',
                        'id_sms'                => $request->id_sms_baru,
                        'sk_akreditasi_id'      => $request->sk_akreditasi_id_baru,
                        'sidang'                => $request->sidang_majelis,
                        'created_at'            => date('Y-m-d H:i:s')
                    ];
                $insert = DB::table('hasil_akreditasis')->insert($data_insert);
            }else{
                $data_update = [ 
                        'kode_pt'               => $request->kode_pt_baru,
                        'nama_pt'               => $request->nama_pt_baru,
                        'kode_ps'               => $request->kode_ps_baru,
                        'nama_ps'               => $request->nama_ps_baru,
                        'jenjang'               => $request->jenjang_baru,
                        'no_sk'                 => $request->nomor_sk_baru,
                        'peringkat_akademis'    => $request->peringkat_akademis,
                        'peringkat_profesi'     => $request->peringkat_profesi,
                        'peringkat_spesialis'   => $request->peringkat_spesialis,
                        'tgl_kadaluarsa'        => $tanggal_kadaluarsa,
                        'thn_sk'                => $request->tahun_sk,
                        'tgl_sk'                => date('Y-m-d', strtotime($request->tanggal_sk)),
                        'status_kadaluarsa'     => $tanggal_kadaluarsa < date('Y-m-d') ? 
                                                    'DALUWARSA' : 'MASIH BERLAKU',
                        'rumpun_ilmu'           => $request->rumpun_ilmu,
                        'is_show'               => '1',
                        'id_sms'                => $request->id_sms_baru,
                        'sk_akreditasi_id'      => $request->sk_akreditasi_id_baru,
                        'sidang'                => $request->sidang_majelis,
                        'updated_at'            => date('Y-m-d H:i:s')
                    ];
                $insert = DB::table('hasil_akreditasis')
                         ->where('id_sms', $request->id_sms_baru)
                         ->update($data_update);
            }

            $update = DB::table('hasil_akreditasis')
                    ->where('no_sk', $request->no_sk_lama)
                    ->update(
                        [
                            'is_show' => '0',
                            'updated_at' => date('Y-m-d H:i:s')

                        ]
                    );

            if ($insert == TRUE AND $update == TRUE) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil'
                ], 200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal'
                ], 200);
            }
            
        }
    }


    public function EditKolomHasilAkre(Request $request)
    {
        $api_key = hash('sha256', 'APIPortalLampkesBentukByAnas!');
        if ($api_key != $request->headers->all()['api-key'][0]) {

            return response()->json([
                'status' => 'Gagal, Api Code Tidak Diterima!',
                'message' => 'Unauthorized!'
            ], 401);
            exit;
        }else{

            if ($request->subject == 'nama_pt_sk') {
                $data_update = [ 
                                'nama_pt'               => $request->nama_subject,
                                'updated_at'            => date('Y-m-d H:i:s')
                               ];
            }elseif ($request->subject == 'nama_ps_sk') {
                $data_update = [ 
                                'nama_ps'               => $request->nama_subject,
                                'updated_at'            => date('Y-m-d H:i:s')
                               ];
            }elseif ($request->subject == 'jenjang_sk') {
                $data_update = [ 
                                'jenjang'               => $request->nama_subject,
                                'updated_at'            => date('Y-m-d H:i:s')
                               ];
            }elseif ($request->subject == 'no_sk') {
                $data_update = [ 
                                'no_sk'                 => $request->nama_subject,
                                'updated_at'            => date('Y-m-d H:i:s')
                               ];
            }

            $update = DB::table('hasil_akreditasis')
                     ->where('sk_akreditasi_id', $request->sk_akreditasi_id)
                     ->update($data_update);

            if ($update == TRUE) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil'
                ], 200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal'
                ], 200);
            }
            
        }
    }

    public function InsertUpdateSK(Request $request)
    {
        $api_key = hash('sha256', 'APIPortalLampkesBentukByAnas!');
        if ($api_key != $request->headers->all()['api-key'][0]) {

            return response()->json([
                'status' => 'Gagal, Api Code Tidak Diterima!',
                'message' => 'Unauthorized!'
            ], 401);
            exit;
        }else{

            $result=DB::select("SELECT id,
                                        kode_pt,
                                        nama_pt,
                                        kode_ps,
                                        nama_ps,
                                        jenjang,
                                        no_sk,
                                        peringkat_akademis,
                                        peringkat_profesi,
                                        peringkat_spesialis,
                                        tgl_kadaluarsa,
                                        thn_sk,
                                        tgl_sk,
                                        status_kadaluarsa,
                                        rumpun_ilmu,
                                        is_show,
                                        id_sms,
                                        sk_akreditasi_id,
                                        sidang
                                FROM hasil_akreditasis 
                                WHERE id_sms='".$request->id_sms."'
                                ORDER BY tgl_kadaluarsa desc");

            if (empty($result)) {
                return response()->json([
                    'status' => 'Mohon maaf, ID tidak ditemukan!',
                    'message' => 'Not found!'
                ], 204);
                exit;
            }else{
                
                if($request->jenis == 'update perpanjangan sk reguler') {
                    DB::beginTransaction();
    
                    try {
    
                        $data_update = [ 
                                'tgl_kadaluarsa'        => date('Y-m-d', strtotime($request->tgl_sk_kadaluarsa)),
                                'updated_at'            => date('Y-m-d H:i:s')
                            ];
                        $update = DB::table('hasil_akreditasis')
                                ->where('id', $result[0]->id)
                                ->update($data_update);
                        
                        DB::commit();
    
                        return response()->json([
                            'success' => true,
                            'message' => 'Berhasil'
                        ], 200);
    
                    } catch (\Exception $e) {
                        DB::rollback();
                        return response()->json([
                            'success' => false,
                            'message' => $e->getMessage()
                        ], 200);
                    
                    }
    
                }else{
                    
                    DB::beginTransaction();
    
                    try {
                        $data_insert = [ 
                                'id'                    => str_replace('-', '', Str::uuid()),
                                'kode_pt'               => $result[0]->kode_pt,
                                'nama_pt'               => $result[0]->nama_pt,
                                'kode_ps'               => $result[0]->kode_ps,
                                'nama_ps'               => $result[0]->nama_ps,
                                'jenjang'               => $result[0]->jenjang,
                                'no_sk'                 => $request->sk_baru,
                                'peringkat_akademis'    => $result[0]->peringkat_akademis,
                                'peringkat_profesi'     => $result[0]->peringkat_profesi,
                                'peringkat_spesialis'   => $result[0]->peringkat_spesialis,
                                'tgl_kadaluarsa'        => date('Y-m-d', strtotime($request->tgl_sk_kadaluarsa)),
                                'thn_sk'                => $request->tahun_sk,
                                'tgl_sk'                => date('Y-m-d', strtotime($request->tgl_sk)),
                                'status_kadaluarsa'     => 'MASIH BERLAKU',
                                'rumpun_ilmu'           => $result[0]->rumpun_ilmu,
                                'is_show'               => '1',
                                'id_sms'                => $result[0]->id_sms,
                                'sk_akreditasi_id'      => $request->sk_akreditasi_id_baru,
                                'sidang'                => $result[0]->sidang,
                                'created_at'            => date('Y-m-d H:i:s')
                            ];
                        $insert = DB::table('hasil_akreditasis')->insert($data_insert);
    
                        $data_update = [ 
                                'is_show'               => '0',
                                'updated_at'            => date('Y-m-d H:i:s')
                            ];
                        $update = DB::table('hasil_akreditasis')
                                ->where('id', $result[0]->id)
                                ->update($data_update);
                        
                        DB::commit();
    
                        return response()->json([
                            'success' => true,
                            'message' => 'Berhasil'
                        ], 200);
    
                    } catch (\Exception $e) {
                        DB::rollback();
                        return response()->json([
                            'success' => false,
                            'message' => $e->getMessage()
                        ], 200);
                    
                    }
                    
                }
            }
        }
    }

    public function ProsesSKPerubahanNama(Request $request)
    {
        $api_key = hash('sha256', 'APIPortalLampkesBentukByAnas!');
        if ($api_key != $request->headers->all()['api-key'][0]) {

            return response()->json([
                'status' => 'Gagal, Api Code Tidak Diterima!',
                'message' => 'Unauthorized!'
            ], 401);
            exit;
        }else{

            $check=DB::select("SELECT id 
                               FROM hasil_akreditasis 
                               WHERE no_sk='".$request->nomor_sk_baru."'
                               ORDER BY created_at DESC");


            $tanggal_kadaluarsa = date('Y-m-d', strtotime($request->tanggal_akhir_sk));
           
            if (count($check) <= 1) {

                $update = DB::table('hasil_akreditasis')
                    ->where('no_sk', $request->no_sk_lama)
                    ->update(
                        [
                            'is_show' => '0',
                            'updated_at' => date('Y-m-d H:i:s')

                        ]
                    );

                $data_insert = [ 
                        'id'                    => str_replace('-', '', Str::uuid()),
                        'kode_pt'               => $request->kode_pt_baru,
                        'nama_pt'               => $request->nama_pt_baru,
                        'kode_ps'               => $request->kode_ps_baru,
                        'nama_ps'               => $request->nama_ps_baru,
                        'jenjang'               => $request->jenjang_baru,
                        'no_sk'                 => $request->nomor_sk_baru,
                        'peringkat_akademis'    => $request->peringkat_akademis,
                        'peringkat_profesi'     => $request->peringkat_profesi,
                        'peringkat_spesialis'   => $request->peringkat_spesialis,
                        'tgl_kadaluarsa'        => $tanggal_kadaluarsa,
                        'thn_sk'                => $request->tahun_sk,
                        'tgl_sk'                => date('Y-m-d', strtotime($request->tanggal_sk)),
                        'status_kadaluarsa'     => $tanggal_kadaluarsa < date('Y-m-d') ? 
                                                    'DALUWARSA' : 'MASIH BERLAKU',
                        'rumpun_ilmu'           => $request->rumpun_ilmu,
                        'is_show'               => '1',
                        'id_sms'                => $request->id_sms_baru,
                        'sk_akreditasi_id'      => $request->sk_akreditasi_id_baru,
                        'sidang'                => $request->sidang_majelis,
                        'created_at'            => date('Y-m-d H:i:s')
                    ];
                $insert = DB::table('hasil_akreditasis')->insert($data_insert);
            }else{

                $update = DB::table('hasil_akreditasis')
                    ->where('no_sk', $request->no_sk_lama)
                    ->update(
                        [
                            'is_show' => '0',
                            'updated_at' => date('Y-m-d H:i:s')

                        ]
                    );

                $data_update = [ 
                        'kode_pt'               => $request->kode_pt_baru,
                        'nama_pt'               => $request->nama_pt_baru,
                        'kode_ps'               => $request->kode_ps_baru,
                        'nama_ps'               => $request->nama_ps_baru,
                        'jenjang'               => $request->jenjang_baru,
                        'no_sk'                 => $request->nomor_sk_baru,
                        'peringkat_akademis'    => $request->peringkat_akademis,
                        'peringkat_profesi'     => $request->peringkat_profesi,
                        'peringkat_spesialis'   => $request->peringkat_spesialis,
                        'tgl_kadaluarsa'        => $tanggal_kadaluarsa,
                        'thn_sk'                => $request->tahun_sk,
                        'tgl_sk'                => date('Y-m-d', strtotime($request->tanggal_sk)),
                        'status_kadaluarsa'     => $tanggal_kadaluarsa < date('Y-m-d') ? 
                                                    'DALUWARSA' : 'MASIH BERLAKU',
                        'rumpun_ilmu'           => $request->rumpun_ilmu,
                        'is_show'               => '1',
                        'id_sms'                => $request->id_sms_baru,
                        'sk_akreditasi_id'      => $request->sk_akreditasi_id_baru,
                        'sidang'                => $request->sidang_majelis,
                        'updated_at'            => date('Y-m-d H:i:s')
                    ];
                $insert = DB::table('hasil_akreditasis')
                         ->where('id', $check[0]->id)
                         ->update($data_update);
            }

            if ($insert == TRUE AND $update == TRUE) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil'
                ], 200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal'
                ], 200);
            }
            
        }
    }

    public function InsertUpdateSKProdiBaru(Request $request)
    {
        $api_key = hash('sha256', 'APIPortalLampkesBentukByAnas!');
        if ($api_key != $request->headers->all()['api-key'][0]) {

            return response()->json([
                'status' => 'Gagal, Api Code Tidak Diterima!',
                'message' => 'Unauthorized!'
            ], 401);
            exit;
        }else{

            if($request->jenis == 'update') {

                
                DB::beginTransaction();

                try {

                    $data_update = [ 
                            'kode_pt'               => $request->kode_pt,
                            'nama_pt'               => $request->nama_pt,
                            'kode_ps'               => $request->kode_ps,
                            'nama_ps'               => $request->nama_ps,
                            'jenjang'               => $request->jenjang,
                            'no_sk'                 => $request->no_sk,
                            'peringkat'             => $request->peringkat,
                            'tgl_kadaluarsa'        => date('Y-m-d', strtotime($request->tgl_kadaluarsa)),
                            'thn_sk'                => $request->thn_sk,
                            'tgl_sk'                => date('Y-m-d', strtotime($request->tgl_sk)),
                            'status_kadaluarsa'     => 'MASIH BERLAKU',
                            'rumpun_ilmu'           => $request->rumpun_ilmu,
                            'kategori'              => ($request->is_ptnbh == '1') ? 'PTN-BH' : 'NON PTN-BH',
                            'is_show'               => $request->is_show,
                            'id_sms'                => $request->id_sms,
                            'sk_akreditasi_id'      => $request->sk_akreditasi_id,
                            'created_at'            => $request->created_at
                        ];
                    $update = DB::table('sk_prodi_barus')
                            ->where('sk_akreditasi_id', $request->sk_akreditasi_id)
			    ->where('id_sms', $request->id_sms)
                            ->update($data_update);
                    DB::commit();

                    return response()->json([
                        'success' => true,
                        'message' => 'Berhasil'
                    ], 200);

                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json([
                        'success' => false,
                        'message' => $e->getMessage()
                    ], 200);
                
                }

            }else{
                
                DB::beginTransaction();
                
                try {
                    $data_insert = [ 
                            'id'                    => str_replace('-', '', Str::uuid()),
                            'kode_pt'               => $request->kode_pt,
                            'nama_pt'               => $request->nama_pt,
                            'kode_ps'               => $request->kode_ps,
                            'nama_ps'               => $request->nama_ps,
                            'jenjang'               => $request->jenjang,
                            'no_sk'                 => $request->no_sk,
                            'peringkat'             => $request->peringkat,
                            'tgl_kadaluarsa'        => date('Y-m-d', strtotime($request->tgl_kadaluarsa)),
                            'thn_sk'                => $request->thn_sk,
                            'tgl_sk'                => date('Y-m-d', strtotime($request->tgl_sk)),
                            'status_kadaluarsa'     => 'MASIH BERLAKU',
                            'kategori'              => ($request->is_ptnbh == '1') ? 'PTN-BH' : 'NON PTN-BH',
                            'rumpun_ilmu'           => $request->rumpun_ilmu,
                            'is_show'               => $request->is_show,
                            'id_sms'                => $request->id_sms,
                            'sk_akreditasi_id'      => $request->sk_akreditasi_id,
                            'created_at'            => $request->created_at
                        ];
                    $insert = DB::table('sk_prodi_barus')->insert($data_insert);
                    
                    DB::commit();

                    return response()->json([
                        'success' => true,
                        'message' => 'Berhasil'
                    ], 200);

                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json([
                        'success' => false,
                        'message' => $e->getMessage()
                    ], 200);
                
                }
                
            }
        }
    }

    public function UpdateIsShowSK(Request $request)
    {
        $api_key = hash('sha256', 'APIPortalLampkesBentukByAnas!');
        if ($api_key != $request->headers->all()['api-key'][0]) {

            return response()->json([
                'status' => 'Gagal, Api Code Tidak Diterima!',
                'message' => 'Unauthorized!'
            ], 401);
            exit;
        }else{

            $data_arr = explode("|",$request->sk_akreditasi_id);
            DB::beginTransaction();

            try {

                for ($i=0; $i < count($data_arr); $i++) { 

                    $get=DB::select("SELECT kode_pt,kode_ps,peringkat_akademis,peringkat_profesi,peringkat_spesialis
                                    FROM hasil_akreditasis 
                                    WHERE sk_akreditasi_id='".$data_arr[$i]."'");

                    $update_old = DB::table('hasil_akreditasis')
                                ->where('kode_pt', $get[0]->kode_pt)
                                ->where('kode_ps', $get[0]->kode_ps)
                                ->where('is_show', '1')
                                ->update([ 
                                    'is_show'               => '0',
                                    'updated_at'            => date('Y-m-d H:i:s')
                                ]);

                    if($get[0]->peringkat_akademis == 'TIDAK TERAKREDITASI' || $get[0]->peringkat_profesi == 'TIDAK TERAKREDITASI' || $get[0]->peringkat_spesialis == 'TIDAK TERAKREDITASI') {
                        $is_show = '0';
                    }else {
                        $is_show = '1';
                    }
                                
                    $data_update = [ 
                        'is_show'               => $is_show,
                        'updated_at'            => date('Y-m-d H:i:s')
                    ];

                    $update = DB::table('hasil_akreditasis')
                        ->where('sk_akreditasi_id', $data_arr[$i])
                        ->update($data_update);
                }
                
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil'
                ], 200);

            } catch (\Exception $e) {
                DB::rollback();
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 200);
            
            }
        }
    }

}
