<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Riset;
use App\KatBahasa;
use App\KatBerita;
use App\Berita;
use App\Footer;
use App\Kontak;
use App\Survey;
use App\Jurnal;
use App\Newsletter;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $no       = 1;
        $no1      = 1;
        $no2      = 1;
        $no3      = 1;
        $no4      = 1;
        $no5      = 1;
        $no6      = 1;
        $no7      = 1;
        $kbhs     = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/getGrafikPortal",
        // CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/getListPTDikti",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
          "api-key: ".$api_key.""
          ),
        ));

 
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $result = json_decode($response);


        if ($err) {

                // echo "cURL Data founded!!#:" . $err; 
                // exit;
            abort('503');

        } else {

           $datatppb = $result->data->tp_per_bidangilmu;
           $datatppp = $result->data->tp_per_provinsi;
           $datatper = $result->data->peringkat_per_provinsi;
           $datatpp  = $result->data->peringkat_per_pemilik;

        }

        // return count($datapt);
        // return json_encode($datapt);
        // dd($result);
        // return collect($result->data)->all();
        // foreach ($datatpp as $v) {
        //     // echo $v->datatper.' ('.$v->total.')<br>';
        //     echo $v->peringkat.'<br>';
        // }
        // echo collect($databi)->first()->kedokteran;
        // return collect($datatppb)->pluck('kedokteran')->max();
        // return collect($datatper)->nama_provinsi;

        // return collect($datatpp)->where('peringkat','A')->pluck('ptn')->max();


        return view('awal.statistik.statistik', compact('no','no1','no2','no3','no4','no5','no6','no7','ft','footers','tentangs','datatppb','datatppp','datatper','datatpp'));

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
