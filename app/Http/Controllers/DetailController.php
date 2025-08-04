<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;
use App\Kontak;
use App\Agenda;
use App\Profil;
use App\Berita;
use App\KatBahasa;
use App\KatBerita;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail_berita(Berita $new)
    {
        
        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();
        
        $pengumumans    = Berita::where([
                                            ['katbahasa_id', $kbhs->id],
                                            ['katberita_id', $kbrt->id],
                                            ['is_show', '1'],
                                    ])
                            ->limit(3)
                            ->latest()
                            ->get();

        $feed           = Berita::findOrFail($new->id);
        $feed->populer  = $new->populer+1;
        $feed->save();
        // echo $feed;

    return view('awal.berita.dberita',
        compact('agendas','tentangs','footers','ft','new','pengumumans'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail_beritaen(Berita $new)
    {
        
        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();
        
        $pengumumans    = Berita::where([
                                            ['katbahasa_id', $kbhs->id],
                                            ['katberita_id', $kbrt->id],
                                            ['is_show', '1'],
                                    ])
                            ->limit(3)
                            ->latest()
                            ->get();

        $feed           = Berita::findOrFail($new->id);
        $feed->populer  = $new->populer+1;
        $feed->save();
        // echo $feed;


        $cari           = ['Berita', 'Pengumuman','Standar','Regulasi',
                            'Standar Pendidikan Profesi Dokter','Artikel'];
        $ganti          = ['News','Announcement','Standard','Regulation',
                            'Doctor Professional Education Standards','Article'];

        $rg     =   [
                        'Undang-Undang','Peraturan Presiden',
                        'Peraturan Pemerintah','Peraturan Menteri',
                        'Peraturan BAN-PT','Peraturan LAM-PTKes'
                    ];
        $grg    =   [
                        'Constitution','Presidential decree',
                        'Government Regulations','Ministerial Regulations',
                        'NAAHE Regulations','IAAHEH Regulations'
                    ];

    // return $new->kat_regulasi;
    // return $new;
    return view('awal.berita.dberitaen',
        compact('agendas','tentangs','footers','ft','new','pengumumans','cari','ganti','rg','grg'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dagenda(Agenda $agenda)
    {
        
        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $populer        = Berita::where([
                                        ['katbahasa_id', $kbhs->id],
                                        ['populer', '>', 0],
                                        ['is_show', '1'],
                                ])
                            ->limit(3)
                            ->orderby('populer', 'desc')
                            ->get();
        $pengumumans    = Berita::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['katberita_id', $kbrt->id],
                                    ['is_show', '1'],
                                ])
                            ->limit(3)
                            ->latest()
                            ->get();


        return view('awal.kegiatan.dkegiatan', 
            compact('tentangs', 'populer', 'agenda', 'pengumumans','footers','ft'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dagendaen(Agenda $agenda)
    {
        
        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $populer        = Berita::where([
                                        ['katbahasa_id', $kbhs->id],
                                        ['populer', '>', 0],
                                        ['is_show', '1'],
                                ])
                            ->limit(3)
                            ->orderby('populer', 'desc')
                            ->get();
        $pengumumans    = Berita::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['katberita_id', $kbrt->id],
                                    ['is_show', '1'],
                                ])
                            ->limit(3)
                            ->latest()
                            ->get();


        return view('awal.kegiatan.dkegiatanen', 
            compact('tentangs', 'populer', 'agenda', 'pengumumans','footers','ft'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prosesakre()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';

        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=pemberian_assesor_detail",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.passesor', 
            compact('result','no','tentangs','footers','ft'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prosesakreen()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';

        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=pemberian_assesor_detail",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.passesoren', 
            compact('result','no','tentangs','footers','ft'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function akdetailen()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';

        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=ak_detail",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.aken', 
            compact('result','no','tentangs','footers','ft'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function akdetail()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=ak_detail",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.ak', 
            compact('result','no','tentangs','footers','ft'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aldetail()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        
        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=al_detail",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.al', 
            compact('result','no','tentangs','footers','ft'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aldetailen()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        
        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=al_detail",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.alen', 
            compact('result','no','tentangs','footers','ft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pvdetail()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        
        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=proses_validasi",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.pvalidasi', 
            compact('result','no','tentangs','footers','ft'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pvdetailen()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        
        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=proses_validasi",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.pvalidasien', 
            compact('result','no','tentangs','footers','ft'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function svdetail()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        
        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=selesai_validasi",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.svalidasi', 
            compact('result','no','tentangs','footers','ft'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function svdetailen()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        
        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=selesai_validasi",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.svalidasien', 
            compact('result','no','tentangs','footers','ft'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pmdetail()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        
        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=proses_majelis",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.smajelis', 
            compact('result','no','tentangs','footers','ft'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pmdetailen()
    {
        
        $kbhs           = KatBahasa::where('namakbhs','English')->first();
        $ft             = Footer::where('njudul','=','navigasi')->get();
        $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';
        
        curl_setopt_array($curl, array(
        // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalDetailProsesAkre",
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalDetailProsesAkre",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "proses=proses_majelis",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view('awal.akreditasi.smajelisen', 
            compact('result','no','tentangs','footers','ft'));
    }
}
