<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;
use App\KatBahasa;
use App\KatBerita;
use App\Berita;
use App\Kontak;
use App\Testimoni;
use App\AlbumPhoto;
use App\AlbumVideo;
use App\CoverPhoto;
use App\HasilAkreditasi;
use App\InfoGrafis;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', '=', 'Berita')->first();
        $bn             = KatBerita::where('namakbrt', '=', 'Breaking News')->first();
        $pgm            = KatBerita::where('namakbrt', '=', 'Pengumuman')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $ftr            = Footer::where('njudul','=','7 Pendiri LAM-PTKes')->latest()->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(3)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $karyawans      = Testimoni::where('katbahasa_id', $kbhs->id)->limit(11)->latest()->get();
        $photos         = AlbumPhoto::limit(4)->latest()->get();
        $videos         = AlbumVideo::limit(2)->latest()->get();
        $brts           = Berita::where([
                                            ['katbahasa_id', $kbhs->id],
                                            ['katberita_id', $kbrt->id],
                                            ['is_show', '1'],
                                    ])
                            ->limit(2)
                            ->latest()
                            ->get();
	$artis = Berita::where([
                                            ['katbahasa_id', $kbhs->id],
                                            ['katberita_id', $kbrt->id],
                                            ['is_show', '1'],
                                    ])
                            ->limit(3)
                            ->latest()
                            ->skip(2)
                            ->get();

        $headlines      = Berita::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['headline_news', 'Ya'],
                                    ['is_show', '1'],
                                ])
                            ->limit(6)
                            ->latest()
                            ->get();

        $breaking       = Berita::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['katberita_id', $bn->id],
                                    ['is_show', '1'],
                                ])
                            ->latest()
                            ->get();

        $pengumumans    = Berita::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['katberita_id', $pgm->id],
                                    ['is_show', '1'],
                                ])
                            ->limit(3)
                            ->latest()
                            ->get();

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';

        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/getJumlahProsesAkreditasi",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/getJumlahProsesAkreditasi",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $result = json_decode($response);

        if (!$err) {
            // echo 'aa';
            $obj        = array(array('JML_ASSESOR'=>$result->data->permintaan_assesor));
            $obj1       = array(array('JML_AK'=>$result->data->ak));
            $obj2       = array(array('JML_AL'=>$result->data->al));
            $obj3       = array(array('JML_PROSES_VALIDASI'=>$result->data->proses_validasi));
            $obj4       = array(array('JML_SELESAI_VALIDASI'=>$result->data->selesai_validasi));
            $obj5       = array(array('JML_PROSES_MAJELIS'=>$result->data->proses_majelis));
        
        }else {
            // echo 'string';
            $obj        = array(array('JML_ASSESOR'=>0));
            $obj1       = array(array('JML_AK'=>0));
            $obj2       = array(array('JML_AL'=>0));
            $obj3       = array(array('JML_PROSES_VALIDASI'=>0));
            $obj4       = array(array('JML_SELESAI_VALIDASI'=>0));
            $obj5       = array(array('JML_PROSES_MAJELIS'=>0));
            
        }

        return view('awal.beranda.beranda',
                 compact('tentangs', 'headlines',  'brts','artis','breaking', 'photos',
                    'breaking','obj','obj1','obj2','obj3','obj4','obj5','pengumumans',
                       'footers', 'ft', 'ftr', 'karyawans','videos','kbrt'));

        // return $obj.'<br>'.
        //         $obj1.'<br>'.
        //         $obj2.'<br>'.
        //         $obj3.'<br>'.
        //         $obj4.'<br>'.
        //         $obj5;
        // return data_get(collect($obj, 0));
        // return $obj;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inggris()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $kbrt           = KatBerita::where('namakbrt', '=', 'Berita')->first();
        $bn             = KatBerita::where('namakbrt', '=', 'Breaking News')->first();
        $pgm            = KatBerita::where('namakbrt', '=', 'Pengumuman')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $ftr            = Footer::where('njudul','=','7 Pendiri LAM-PTKes')->latest()->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(3)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $karyawans      = Testimoni::where('katbahasa_id', $kbhs->id)->limit(11)->latest()->get();
        $photos         = AlbumPhoto::limit(4)->latest()->get();
        $videos         = AlbumVideo::limit(2)->latest()->get();
        $brts           = Berita::where([
                                            ['katbahasa_id', $kbhs->id],
                                            ['katberita_id', $kbrt->id],
                                            ['is_show', '1'],
                                    ])
                            ->limit(2)
                            ->latest()
                            ->get();

        $headlines      = Berita::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['headline_news', 'Ya'],
                                    ['is_show', '1'],
                                ])
                            ->limit(6)
                            ->latest()
                            ->get();

        $breaking       = Berita::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['katberita_id', $bn->id],
                                    ['is_show', '1'],
                                ])
                            ->latest()
                            ->get();

        $pengumumans    = Berita::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['katberita_id', $pgm->id],
                                    ['is_show', '1'],
                                ])
                            ->limit(3)
                            ->latest()
                            ->get();

        $cari   = ['Berita','Pengumuman','Standar','Regulasi','Artikel','Standar Pendidikan Profesi Dokter'];
        $ganti  = ['News','Announcement','Standard','Regulation','Article','Doctor Professional Education Standards'];

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';

        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/getJumlahProsesAkreditasi",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/getJumlahProsesAkreditasi",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $result = json_decode($response);


        $obj        = array(array('JML_ASSESOR'=>$result->data->permintaan_assesor));
        $obj1       = array(array('JML_AK'=>$result->data->ak));
        $obj2       = array(array('JML_AL'=>$result->data->al));
        $obj3       = array(array('JML_PROSES_VALIDASI'=>$result->data->proses_validasi));
        $obj4       = array(array('JML_SELESAI_VALIDASI'=>$result->data->selesai_validasi));
        $obj5       = array(array('JML_PROSES_MAJELIS'=>$result->data->proses_majelis));

        return view('awal.beranda.berandaen',
                 compact('tentangs', 'headlines',  'brts','breaking', 'photos',
                    'breaking','obj','obj1','obj2','obj3','obj4','obj5','pengumumans',
                       'footers', 'ft', 'ftr', 'karyawans','videos','kbrt','cari','ganti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tgraf()
    {
        $no         = 1;
        $kbhs       = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft         = Footer::where('njudul','=','navigasi')->get();
        $footers    = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs   = Kontak::where('katbahasa_id', $kbhs->id)
                        ->limit(1)
                        ->latest()
                        ->get();

        // $curl = curl_init();
        // $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';

        // curl_setopt_array($curl, array(
        // // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalGetInfoGrafis",
        // CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalGetInfoGrafis",
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => "",
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 300,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_SSL_VERIFYPEER => false,
        // CURLOPT_CUSTOMREQUEST => "POST",
        // // CURLOPT_POSTFIELDS => "",
        // CURLOPT_HTTPHEADER => array(
        //   "api-key: ".$api_key.""
        //   ),
        // ));

        // $response = curl_exec($curl);

        // $err = curl_error($curl);

        // curl_close($curl);

        // $result = json_decode($response, TRUE);

        // $kedokteran = $result['data']['kedokteran'];
        // $farmasi = $result['data']['farmasi'];
        // $gizi = $result['data']['gizi'];
        // $keslain = $result['data']['kesehatan_lain'];
        // $kebidanan = $result['data']['kebidanan'];
        // $kedokgigi = $result['data']['kedokteran_gigi'];
        // $kedokhewan = $result['data']['kedokteran_hewan'];
        // $keperawatan = $result['data']['keperawatan'];
        // $kesmas = $result['data']['kesehatan_masyarakat'];

      // return view('awal.infografis.infografis', 
      //   compact('tentangs','ft','no','kedokteran','farmasi','gizi','keslain','kebidanan','kedokgigi','kedokhewan','keperawatan','kesmas'));

        $infografis = InfoGrafis::latest()->paginate(3);

      return view('awal.infografis.infografis', compact('tentangs','ft','infografis'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tgrafen()
    {
        $no         = 1;
        $kbhs       = KatBahasa::where('namakbhs','English')->first();
        $ft         = Footer::where('njudul','=','navigasi')->get();
        $footers    = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs   = Kontak::where('katbahasa_id', $kbhs->id)
                        ->limit(1)
                        ->latest()
                        ->get();

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';

        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalGetInfoGrafis",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalGetInfoGrafis",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $result = json_decode($response, TRUE);

        $kedokteran = $result['data']['kedokteran'];
        $farmasi = $result['data']['farmasi'];
        $gizi = $result['data']['gizi'];
        $keslain = $result['data']['kesehatan_lain'];
        $kebidanan = $result['data']['kebidanan'];
        $kedokgigi = $result['data']['kedokteran_gigi'];
        $kedokhewan = $result['data']['kedokteran_hewan'];
        $keperawatan = $result['data']['keperawatan'];
        $kesmas = $result['data']['kesehatan_masyarakat'];


      return view('awal.infografis.infografisen', 
        compact('tentangs','ft','no','kedokteran','farmasi','gizi','keslain','kebidanan','kedokgigi','kedokhewan','keperawatan','kesmas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function albumdetail($cover)
    {

        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
                            ->limit(1)
                            ->latest()
                            ->get();
        $image          = AlbumPhoto::where('cover_id', $cover)->latest()->get();

        return view('awal.album.dphoto', compact('image','tentangs','footers','ft'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function albumdetailen($cover)
    {

        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
                            ->limit(1)
                            ->latest()
                            ->get();
        $image          = AlbumPhoto::where('cover_id', $cover)->latest()->get();

        return view('awal.album.dphotoen', compact('image','tentangs','footers','ft'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hubkami()
    {

        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
                            ->limit(1)
                            ->latest()
                            ->get();

        return view('awal.beranda.hubkami', compact('tentangs','footers','ft'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hubkamien()
    {

        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
                            ->limit(1)
                            ->latest()
                            ->get();

        return view('awal.beranda.hubkamien', compact('tentangs','footers','ft'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function photo()
    {

        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
                            ->limit(1)
                            ->latest()
                            ->get();
        $photos         = CoverPhoto::latest()->paginate(8);

        return view('awal.album.photo', 
            compact('photos', 'tentangs','footers','ft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function photoen()
    {

        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
                            ->limit(1)
                            ->latest()
                            ->get();
        $photos         = CoverPhoto::latest()->paginate(8);

        return view('awal.album.photoen', 
            compact('photos', 'tentangs','footers','ft'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function video()
    {

        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
                            ->limit(1)
                            ->latest()
                            ->get();
        $videos         = AlbumVideo::latest()->paginate(4);

        

        return view('awal.album.video', 
            compact('videos', 'tentangs','footers','ft'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function videoen()
    {

        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
                            ->limit(1)
                            ->latest()
                            ->get();
        $videos         = AlbumVideo::latest()->paginate(4);

        

        return view('awal.album.videoen', 
            compact('videos', 'tentangs','footers','ft'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function srtakre()
    {

        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
                            ->limit(1)
                            ->latest()
                            ->get();
        $no             = 1;
        $srtfakreditasi = HasilAkreditasi::latest()
                            ->where('is_show', '=', '1')
                            ->get();
        // $date = date('Y');

        return view('awal.akreditasi.ser', 
            compact('no','tentangs','srtfakreditasi','footers','ft'));
    }


    public function Sertifikat($sk_id,$ser_digital_id)
    {
        // echo $sk_id;
        // echo '<br>';
        // echo $ser_digital_id;
        // exit;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        // $sidang_majelis = '58'; //nanti ini lo buat berdasarkan pilihan sidang majelis ya mas
        $sidang_majelis     = request('sidang');

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/getSertifikatDigital",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "sk_akreditasi_id=".$sk_id."&sertifikat_digital_id=".$ser_digital_id,
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);


        if ($err) {
            echo "cURL Error #:" . $err; 
            exit;
        } else {

            // $sk_akreditasi_id = '91CAA1ADDF014C3698D46872998ED8E8';
            $sk_akreditasi_id = $sk_id;

            $akreditasis    = HasilAkreditasi::where('sk_akreditasi_id', '=', $sk_akreditasi_id)
                            ->latest()
                            ->get()
                            ->toArray();

            if(!empty($akreditasis)) {
                $data['nama_pt'] = $akreditasis[0]['nama_pt'];
                $data['nama_ps'] = $akreditasis[0]['nama_ps'];
                $data['jenjang'] = $akreditasis[0]['jenjang'];
            }else{
                echo "Sertifikat tidak ditemukan atau sudah dilakukan pergantian";
                exit;
            }

            $result = json_decode( $response);
            if ($result->message == 'Data founded!!') {
                $data['result'] = $result->data;
                if($sk_akreditasi_id == 'F39A51CAF0E0A51EE050007F01001D97') {
                    return view('sertifikat.print_unique', $data);
                }else{
                    return view('sertifikat.print', $data);
                }
            }else{
                echo "Sertifikat tidak ditemukan atau sudah dilakukan pergantian";
            }

        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function marakreen()
    {
        $no             = 1;
        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
                            ->limit(1)
                            ->latest()
                            ->get();

        $peringkat      = ['A', 'B', 'C','Unggul','Baik Sekali','Baik','TIDAK TERAKREDITASI'];
        $ganti          = ['Excellent','Good','Fair','Excellent','Very Good',
                            'Good','NOT ACCREDITED'];
        $statuscari     = ['MASIH BERLAKU',''];
        $status_ganti   = ['Valid','Invalid'];
        $hasil          = HasilAkreditasi::where([
                                ['is_show', '=', '1'],
                                ['jenjang', '=', 'PROFESI'],
                                ['rumpun_ilmu', '=', 'KEDOKTERAN']
                            ])
                            ->get();

        return view('awal.akreditasi.maen', 
        compact('no','hasil','tentangs','footers','ft','ganti','peringkat','statuscari','status_ganti'));

    }
    
}
