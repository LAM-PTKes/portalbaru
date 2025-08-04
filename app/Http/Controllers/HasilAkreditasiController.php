<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KatBahasa;
use App\Footer;
use App\Kontak;
use App\Agenda;
use App\Unduhan;
use App\KatUnduhan;
use App\QAkreditasi;
use App\Berita;
use App\KatBerita;
use App\HasilAkreditasi;
use App\SkProdiBaru;
use App\HasilAkreditasiMini;
use Illuminate\Support\Str;

class HasilAkreditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function db_prodi()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
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
            CURLOPT_POSTFIELDS => "proses=sedang_proses_simak",
            CURLOPT_HTTPHEADER => array(
                "api-key: " . $api_key . ""
            ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view(
            'awal.akreditasi.prosesakre',
            compact('result', 'no', 'tentangs', 'footers', 'ft')
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function db_prodien()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
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
            CURLOPT_POSTFIELDS => "proses=sedang_proses_simak",
            CURLOPT_HTTPHEADER => array(
                "api-key: " . $api_key . ""
            ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $result = $res['data'];

        return view(
            'awal.akreditasi.prosesakreen',
            compact('result', 'no', 'tentangs', 'footers', 'ft')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function riwayat()
    {

        $x          = explode(',', strval($_GET['q']));
        $pt         = $x[0];
        $ps         = $x[1];
        $riwayat    = HasilAkreditasi::where([
            ['kode_pt', $pt],
            ['kode_ps', $ps],
        ])
            ->latest()
            ->get();
        $no         = 1;

        $bulan      =   [
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
        $ganti      =   [
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

        echo '<table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Perguruan Tinggi</th>
                        <th>Program Studi</th>
                        <th>Jenjang</th>
                        <th>Nomor SK</th>
                        <th>Tahun SK</th>
                        <th>Peringkat Akreditasi</th>
                        <th>Tanggal Daluwarsa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($riwayat as $k) {

            if ($k->is_show == '0' || $k->is_show == '1') {
                echo    '<tr>';
                echo    '<td align="center">' . $no++ . '</td>';
                echo    '<td>' . $k->nama_pt . '</td>';
                echo    '<td>' . $k->nama_ps . '</td>';
                echo    '<td>' . $k->jenjang . '</td>';
                echo    '<td>' . $k->no_sk . '</td>';
                echo    '<td>' . $k->thn_sk . '</td>';
                echo    '<td align="center">' .
                    $k->peringkat_akademis .
                    $k->peringkat_profesi .
                    $k->peringkat_spesialis .
                    '</td>';
                echo    '<td>' .
                    str_replace($bulan, $ganti, date('d F Y', strtotime($k->tgl_kadaluarsa))) .
                    '</td>';
                if ($k->is_show == '0') {
                    echo '<td>Tidak Aktif</td>';
                } elseif (date('Y-m-d', strtotime($k->tgl_kadaluarsa)) <= date('Y-m-d')) {
                    echo '<td>Tidak Aktif</td>';
                } else {
                    echo '<td>Aktif</td>';
                }
                echo    '</tr>';
            }
        }

        echo '</tbody></table>';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function caridha(Request $request)
    {
        $no             = 1;
        $cari1          = $request->get('nama_ps');
        $cari2          = $request->get('nama_pt');
        $cari3          = $request->get('jenjang');
        $cari5          = $request->get('cek');
        $cari6          = $request->get('thn');
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        // $hasil          = HasilAkreditasi::where([
        //                         ['status_kadaluarsa', 'like', '%'.$cari5.'%'],
        //                         ['nama_pt', 'like', '%'.$cari2.'%'],
        //                         ['nama_ps', 'like', '%'.$cari1.'%'],
        //                         ['jenjang', 'like', '%'.$cari3.'%'],
        //                         ['tgl_kadaluarsa', 'like', '%'.$cari6.'%' ],
        //                         ['is_show', '=', '1']
        //                     ])
        //                     ->get();
        if ($cari5 == 'all') {

            $hasil  = HasilAkreditasi::where('is_show', '1')
                ->latest()
                ->get();
            // echo 'kbh';

        } elseif ($cari5 == '0') {


            $alih   = HasilAkreditasi::where(function ($q) use ($cari2, $cari1, $cari3, $cari6) {
                if (!empty($cari2)) {
                    $q->where([
                        ['nama_pt', 'like', '%' . $cari2 . '%'],
                        ['status_kadaluarsa', 'ALIH BENTUK'],
                    ]);
                }
                if (!empty($cari1)) {
                    $q->where([
                        ['nama_ps', 'like', '%' . $cari1 . '%'],
                        ['status_kadaluarsa', 'ALIH BENTUK'],
                    ]);
                }
                if (!empty($cari3)) {
                    $q->where([
                        ['jenjang', $cari3],
                        ['status_kadaluarsa', 'ALIH BENTUK'],

                    ]);
                }
                if (!empty($cari6)) {
                    $q->where([
                        // ['tgl_kadaluarsa', 'like', '%'.$cari6.'%'],
                        ['status_kadaluarsa', 'ALIH BENTUK'],
                    ]);
                    $q->whereYear('tgl_kadaluarsa', $cari6);
                }
            });

            $hasil  = HasilAkreditasi::where(function ($q) use ($cari2, $cari1, $cari3, $cari6) {
                if (!empty($cari2)) {
                    $q->where([
                        ['nama_pt', 'like', '%' . $cari2 . '%'],
                        ['status_kadaluarsa', 'DALUWARSA'],
                    ]);
                }
                if (!empty($cari1)) {
                    $q->where([
                        ['nama_ps', 'like', '%' . $cari1 . '%'],
                        ['status_kadaluarsa', 'DALUWARSA'],
                    ]);
                }
                if (!empty($cari3)) {
                    $q->where([
                        ['jenjang', $cari3],
                        ['status_kadaluarsa', 'DALUWARSA'],

                    ]);
                }
                if (!empty($cari6)) {
                    $q->where([
                        // ['tgl_kadaluarsa', 'like', '%'.$cari6.'%'],
                        ['status_kadaluarsa', 'DALUWARSA'],
                    ]);
                    $q->whereYear('tgl_kadaluarsa', $cari6);
                }
                // $q->where('status_kadaluarsa','DALUWARSA');
                $q->orwhere('status_kadaluarsa', 'ALIH BENTUK');
            })
                ->where('is_show', '1')
                ->union($alih)
                ->get();
        } elseif ($cari5 == '1') {

            $hasil  = HasilAkreditasi::where(function ($q) use ($cari2, $cari1, $cari3, $cari6) {
                if (!empty($cari2)) {
                    $q->where([
                        ['nama_pt', 'like', '%' . $cari2 . '%'],
                    ]);
                }
                if (!empty($cari1)) {
                    $q->where([
                        ['nama_ps', 'like', '%' . $cari1 . '%'],

                    ]);
                }
                if (!empty($cari3)) {
                    $q->where([
                        ['jenjang', $cari3],
                    ]);
                }
                if (!empty($cari6)) {
                    $q->where([
                        ['tgl_kadaluarsa', 'like', '%' . $cari6 . '%'],

                    ]);
                }
            })
                ->where([
                    ['status_kadaluarsa', 'MASIH BERLAKU'],
                    ['is_show', '1'],
                ])
                ->whereDate('tgl_kadaluarsa', '>', date('Y-m-d'))
                ->get();

            // echo '1';

        } else {



            $hasil  = HasilAkreditasi::where(function ($q) use ($cari2, $cari1, $cari3, $cari6) {
                if (!empty($cari2)) {
                    $q->where([
                        ['nama_pt', 'like', '%' . $cari2 . '%'],
                    ]);
                }
                if (!empty($cari1)) {
                    $q->where([
                        ['nama_ps', 'like', '%' . $cari1 . '%'],

                    ]);
                }
                if (!empty($cari3)) {
                    $q->where([
                        ['jenjang', $cari3],
                    ]);
                }
                if (!empty($cari6)) {
                    $q->where([
                        ['tgl_kadaluarsa', 'like', '%' . $cari6 . '%'],

                    ]);
                }
            })
                ->where('is_show', '1')
                ->get();

            // echo 'lain';
            // return $hasil;

        }

        $bulan          = [
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
        $ganti          = [
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
        // echo 'ss';
        // return $cari2;
        // return count($hasil);
        // return $hasil;
        return view(
            'awal.akreditasi.caridbha',
            compact('no', 'tentangs', 'hasil', 'footers', 'ft', 'cari1', 'cari2', 'cari3', 'cari5', 'cari6', 'bulan', 'ganti')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function caridhaen(Request $request)
    {
        $no             = 1;
        $cari1          = $request->get('nama_ps');
        $cari2          = $request->get('nama_pt');
        $cari3          = $request->get('jenjang');
        $cari5          = $request->get('cek');
        $cari6          = $request->get('thn');
        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $hasil          = HasilAkreditasi::where([
            // ['status_kadaluarsa', 'like', '%'.$cari5.'%'],
            // ['nama_pt', 'like', '%'.$cari2.'%'],
            // ['nama_ps', 'like', '%'.$cari1.'%'],
            // ['jenjang', 'like', '%'.$cari3.'%'],
            // ['tgl_kadaluarsa', 'like', '%'.$cari6.'%' ],
            ['is_show', '=', '1']
        ])
            ->get();

        // $hasil = HasilAkreditasi::distinct()->select('nama_ps')->get();


        $peringkat   = ['Unggul', 'Baik Sekali', 'Baik', 'TIDAK TERAKREDITASI', 'A', 'B', 'C'];
        $ganti       = ['Excellent', 'Very Good', 'Good', 'NOT ACCREDITED', 'Excellent', 'Good', 'Fair'];
        $statuscari  = ['MASIH BERLAKU', 'DALUWARSA', ''];
        $statusganti = ['VALID', 'INVALID', 'NOT ACCREDITED'];
        $lvl         = [
            'DIPLOMA TIGA',
            'DIPLOMA EMPAT',
            'DIPLOMA',
            'SARJANA TERAPAN',
            'SARJANA',
            'PENDIDIKAN PROFESI',
            'PROFESI',
            'MAGISTER TERAPAN',
            'MAGISTER',
            'DOKTOR',
            'SUB SPESIALIS',
            'SPESIALIS'
        ];
        $glvl        = [
            'DIPLOMA-III',
            'DIPLOMA-IV',
            'DIPLOMA',
            'UNDERGRADUATE',
            'BACHELOR',
            'PROFESSIONAL EDUCATION',
            'PROFESSIONAL',
            'APPLIED MASTER',
            'MASTER',
            'DOCTOR',
            'SUBSPECIALIST',
            'SUBSPECIALIST'
        ];
        $nmps        = [
            'PROMOSI KESEHATAN',
            'ILMU PENDIDIKAN KEDOKTERAN DAN KESEHATAN',
            'PENDIDIKAN PROFESI APOTEKER',
            'PENDIDIKAN PROFESI APOTEER',
            'ADMINISTRASI DAN KEBIJAKAN KESEHATAN',
            'ADMINISTRASI KESEHATAN',
            'ADMINISTRASI RUMAH SAKIT',
            'AGRIBISNIS VETERINER',
            'AKUPUNKTUR MEDIK',
            'AKUPUNKTUR',
            'AKUPUNTUR',
            'ANALIS FARMASI DAN MAKANAN',
            'ANALIS FARMASI',
            'ANALIS KESEHATAN',
            'ANDROLOGI',
            'ANESTESIOLOGI DAN TERAPI INTENSIF',
            'ANESTESIOLOGI DAN REANIMASI',
            'ANESTESIOLOGI',
            'ANTI AGING DAN AESTHETIC MEDICINE',
            'PROFESI APOTEKER',
            'PENDIDIKAN PROFESI APOTEKER',
            'APOTEKER',
            'ASURANSI KESEHATAN',
            'AUDIOLOGI',
            'ILMU BEDAH ANAK',
            'BEDAH ANAK',
            'ILMU BEDAH MULUT DAN MAKSILOFASIAL',
            'BEDAH MULUT DAN MAKSILOFASIAL',
            'ILMU BEDAH ORTHOPAEDI DAN TRAUMATOLOGI',
            'BEDAH ORTHOPAEDI DAN TRAUMATOLOGI',
            'BEDAH PLASTIK REKONSTRUKSI DAN ESTETIK',
            'BEDAH PLASTIK REKONSTRUKSI DAN ESTETIS',
            'ILMU BEDAH SARAF',
            'BEDAH SARAF',
            'BEDAH THORAKS KARDIOVASKULAR',
            'PENDIDIKAN PROFESI BIDAN',
            'PROFESI BIDAN',
            'PENDIDIKAN JARAK JAUH KEBIDANAN',
            'PENDIDIKAN BIDAN',
            'BIDAN PENDIDIK',
            'ILMU KEBIDANAN DAN PENYAKIT KANDUNGAN',
            'ILMU KEBIDANAN',
            'KEBIDANAN',
            'BIDAN',
            'BIOLOGI REPRODUKSI',
            'ILMU KEDOKTERAN BIOMEDIK',
            'ILMU BIOMEDIK',
            'PENDIDIKAN PROFESI DIETISIEN',
            'DIETISIEN',
            'RADIOLOGI KEDOKTERAN GIGI',
            'PULMONOLOGI DAN ILMU KEDOKTERAN RESPIRASI',
            'PULMONOLOGI DAN KEDOKTERAN RESPIRASI',
            'PENDIDIKAN PROFESI DOKTER GIGI',
            'PROFESI DOKTER GIGI',
            'PENDIDIKAN PROFESI DOKTER HEWAN',
            'PENDIDIKAN KEDOKTERAN',
            'PENDIDIKAN DOKTER GIGI',
            'ADMINISTRASI RUMAH SAKIT',
            'MANAJEMEN PELAYANAN RUMAH SAKIT',
            'MANAJEMEN RUMAH SAKIT',
            'TEKNOLOGI LABORATORIUM MEDIS',
            'PERUMAHSAKITAN',
            'ADMINSITRASI RUMAH SAKIT',
            'ANALISA FARMASI DAN MAKANAN',
            'ANALISIS FARMASI DAN MAKANAN',
            'ANALISIS KESEHATAN',
            'BIOMEDIK',
            'TEKNIK ELEKTROMEDIK',
            'ELEKTROMEDIK',
            'EPIDEMIOLOGI',
            'FARMAKOLOGI KLINIK',
            'PENDIDIKAN PROFESI FISIOTERAPIS',
            'PENDIDIKAN PROFESI FISIOTERAPI',
            'FISIOTERAPIS',
            'FISIOTERAPI',
            'ILMU GIZI MASYARAKAT DAN KELUARGA',
            'PEREKAM MEDIK DAN INFORMASI KESEHATAN',
            'REKAM MEDIK DAN INFORMASI KESEHATAN',
            'ILMU KEDOKTERAN GIGI DASAR',
            'ILMU KEDOKTERAN KLINIS',
            'KEDOKTERAN KLINIS',
            'ILMU KARDIOLOGI DAN KEDOKTERAN VASKULAR',
            'ILMU KEDOKTERAN DAN KESEHATAN',
            'ILMU KEDOKTERAN TROPIS',
            'ILMU KEDOKTERAN FORENSIK',
            'ILMU KEDOKTERAN GIGI KOMUNITAS',
            'ILMU KEDOKTERAN GIGI ANAK',
            'ILMU KEDOKTERAN DASAR',
            'ILMU KEDOKTERAN FISIK DAN REHABILITASI MEDIK',
            'ILMU KEDOKTERAN FISIK DAN REHABILITASI',
            'KEDOKTERAN FISIK DAN REHABILITASI',
            'BEDAH TORAKS KARDIOVASKULAR',
            'PENDIDIKAN PROFESI NERS',
            'PROFESI NERS',
            'NERS',
            'ILMU KEDOKTERAN KLINIK',
            'ILMU KEDOKTERAN NUKLIR',
            'MAGISTER ILMU KEDOKTERAN GIGI KLINIS',
            'ILMU KEDOKTERAN OLAHRAGA',
            'ILMU KEDOKTERAN GIGI KLINIS',
            'ILMU KEDOKTERAN GIGI',
            'ILMU KEDOKTERAN JIWA',
            'ILMU KESEHATAN TELINGA, HIDUNG, TENGGOROK - BEDAH KEPALA LEHER',
            'ILMU KESEHATAN TELINGA HIDUNG TENGGOROK, BEDAH KEPALA LEHER',
            'ILMU KESEHATAN TELINGA HIDUNG TENGGOROK BEDAH KEPALA DAN LEHER',
            'ILMU KEDOKTERAN',
            'KEDOKTERAN OKUPASI',
            'KEDOKTERAN KERJA',
            'KEDOKTERAN KLINIK',
            'KEDOKTERAN HEWAN',
            'KEDOKTERAN GIGI',
            'KEDOKTERAN PENERBANGAN',
            'KEDOKTERAN',
            'PENDIDIKAN DOKTER HEWAN',
            'PENDIDIKAN PROFESI DOKTER',
            'DOKTER GIGI PERIODONSIA',
            'PROFESI DOKTER',
            'PENDIDIKAN DOKTER',
            'DOKTER GIGI',
            'DOKTER HEWAN',
            'DOKTER',
            'PENDIDIKAN JARAK JAUH KEPERAWATAN',
            'KEPERAWATAN MEDIKAL BEDAH',
            'KEPERAWATAN MATERNITAS',
            'KEPERAWATAN KOMUNITAS',
            'KEPERAWATAN JIWA',
            'KEPERAWATAN GIGI',
            'KEPERAWATAN ANASTESIOLOGI',
            'KEPERAWATAN ANESTHESIOLOGY',
            'KEPERAWATAN ANAK',
            'ILMU KEPERAWATAN',
            'KEPERAWATAN',
            'FARMASI INDUSTRI',
            'FARMASI KLINIK',
            'MANAJEMEN FARMASI',
            'FARMASI KLINIK DAN KOMUNITAS',
            'SAINS DAN TEKNOLOGI FARMASI',
            'ILMU FARMASI',
            'FARMASI KLINIS',
            'FARMASI',
            'ILMU KESEHATAN THT BEDAH KEPALA DAN LEHER',
            'ILMU PENYAKIT DAN KESEHATAN MASYARAKAT VETERINER',
            'ILMU KESEHATAN THT-KL',
            'ILMU KESEHATAN TELINGA, HIDUNG, TENGGOROK - BEDAH KEPALA LEHER',
            'ILMU KESEHATAN REPRODUKSI',
            'ILMU KESEHATAN OLAH RAGA',
            'ILMU KESEHATAN MATA',
            'ILMU KESEHATAN MASYARAKAT',
            'ILMU KESEHATAN KULIT DAN KELAMIN',
            'ILMU KESEHATAN GIGI ANAK',
            'ILMU KESEHATAN GIGI',
            'ILMU KESEHATAN ANAK',
            'ILMU KESEHATAN',
            'HIGIENE PERUSAHAAN KESEHATAN DAN KESELAMATAN KERJA',
            'KESEHATAN MASYARAKAT',
            'KESEHATAN TERAPIS GIGI DAN MULUT',
            'TEKNIK KESEHATAN GIGI',
            'KESEHATAN GIGI DAN MULUT',
            'KESEHATAN GIGI',
            'PEREKAM DAN INFORMASI KESEHATAN',
            'TEKNOLOGI BANK DARAH',
            'GIZI DAN DIETETIKA',
            'ILMU GIZI KLINIK',
            'GIZI KLINIK',
            'GIZI KLINIS',
            'ILMU GIZI',
            'GIZI',
            'ILMU KONSERVASI GIGI',
            'KONSERVASI GIGI',
            'TEKNIK GIGI',
            'TERAPI GIGI',
            'HIGIENE GIGI',
            'KESEHATAN LINGKUNGAN',
            'TRANSFUSI DARAH',
            'MANAJEMEN INFORMASI KESEHATAN',
            'KESEHATAN DAN KESELAMATAN KERJA',
            'TEKNOLOGI LABORATORIUM MEDIK',
            'ILMU PENYAKIT DALAM',
            'ILMU PENYAKIT JANTUNG DAN PEMBULUH DARAH',
            'ILMU PENYAKIT JANTUNG',
            'ILMU PENYAKIT KULIT DAN KELAMIN',
            'ILMU PENYAKIT MATA',
            'ILMU PENYAKIT MULUT',
            'ILMU PENYAKIT PARU',
            'ILMU PENYAKIT SARAF',
            'ILMU PENYAKIT SYARAF',
            'ILMU PENYAKIT TELINGA, HIDUNG DAN TENGGOROKAN',
            'ILMU PENYAKIT TELINGA, HIDUNG, DAN TENGGOROK',
            'ILMU PENYAKIT TELINGA, HIDUNG DAN TENGGOROK',
            'KESELAMATAN DAN KESEHATAN KERJA',
            'ILMU BEDAH PLASTIK',
            'ILMU BEDAH ORTHOPEDI',
            'ILMU BEDAH ORTHOPAEDI',
            'ILMU BEDAH MULUT',
            'ILMU BEDAH UROLOGI',
            'ILMU BEDAH',
            'ILMU ANESTESI',
            'ILMU ORTHOPAEDI DAN TRAUMATOLOGI',
            'HERBAL',
            'ILMU PATOLOGI KLINIK',
            'ILMU PATOLOGI ANATOMI',
            'ILMU REKAM MEDIS',
            'JANTUNG DAN PEMBULUH DARAH',
            'KAJIAN ADMINISTRASI RUMAH SAKIT',
            'JAMU',
            'LABORATORIUM MEDIS',
            'LABORATORIUM MEDIK',
            'MANAJEMEN PELAYANAN RUMAH SAKIT',
            'OBSTETRI DAN GINEKOLOGI',
            'OKUPASI TERAPI',
            'ONKOLOGI RADIASI',
            'OPTOMETRI',
            'ORTODONSIA',
            'ORTOPEDI DAN TRAUMATOLOGI',
            'ORTOTIK DAN PROSTETIK',
            'PARAMEDIK VETERINER',
            'PARASITOLOGI KLINIK',
            'PATOLOGI ANATOMIK',
            'PATOLOGI ANATOMI',
            'PENGOBATAN TRADISIONAL CINA',
            'PENGOBATAN TRADISIONAL',
            'PENYAKIT DALAM',
            'PEREKAM MEDIK DAN INFORMATIKA KESEHATAN',
            'PEREKAM MEDIS & INFORMASI KESEHATAN',
            'PEREKAM MEDIS DAN INFORMASI KESEHATAN',
            'PEREKAM DAN INFORMATIKA KESEHATAN',
            'PERIODONSIA',
            'PROSTODONSIA',
            'PSIKIATRI',
            'PULMONOLOGI',
            'PULMANOLOGI',
            'TEKNOLOGI RADIOLOGI PENCITRAAN',
            'TEKNOLOGI RADIOLOGI',
            'TEKNIK RADIOLOGI',
            'RADIOLOGI',
            'TEKNIK RADIODIAGNOSTIK DAN RADIOTERAPI',
            'RADIODIAGNOSTIK DAN RADIOTERAPI',
            'REFRAKSI OPTISI',
            'REHABILITASI MEDIK',
            'REKAM MEDIS DAN INFORMASI KESEHATAN',
            'REKAM MEDIK',
            'REKAM MEDIS',
            'REPRAKSIONIS OPTISIEN',
            'SAINS BIOMEDIS',
            'SAINS VETERINER',
            'SANITASI LINGKUNGAN',
            'SANITASI',
            'TEKNIK ELEKTRO MEDIK',
            'TEKNIK KARDIOVASKULER',
            'TEKNIK RADIODIAGNOSTIK & RADIOTERAPI',
            'TEKNIK RONTGEN',
            'TEKNOLOGI ELEKTRO-MEDIS',
            'TEKNOLOGI ELEKTRO MEDIS',
            'TELINGA, HIDUNG, TENGGOROK, KEPALA, DAN LEHER',
            'TERAPAN IMAGING DIAGNOSTIK',
            'TERAPI WICARA',
            'THT-KL',
            'UROLOGI',
            'VAKSINOLOGI DAN IMUNOTERAPETIKA',
            'KESEHATAN ANAK',
            'KESEHATAN TELINGA HIDUNG TENGGOROK, BEDAH KEPALA LEHER'
        ];

        $gnmps       = [
            'HEALTH PROMOTION',
            'MEDICAL AND HEALTH EDUCATION',
            'PHARMACIST PROFESSION EDUCATION',
            'PHARMACIST PROFESSION EDUCATION',
            'HEALTH ADMINISTRATION AND POLICY',
            'HEALTH ADMINISTRATION',
            'HOSPITAL ADMINISTRATION',
            'VETERINARY AGRIBUSINESS',
            'MEDICAL ACUPUNCTURE',
            'ACUPUNCTURE',
            'ACUPUNCTURE',
            'FOOD AND PHARMACEUTICAL ANALYST',
            'PHARMACEUTICAL ANALYST',
            'HEALTH ANALYST',
            'ANDROLOGY',
            'ANESTHESIOLOGY AND INTENSIVE THERAPY',
            'ANESTHESIOLOGY AND REANIMATION',
            'ANESTHESIOLOGY',
            'ANTI AGING AND AESTHETIC MEDICINE',
            'PROFESSIONAL PHARMACY STUDY PROGRAM',
            'PHARMACIST PROFESSION EDUCATION',
            'PHARMACIST',
            'HEALTH INSURANCE',
            'AUDIOLOGY',
            'PEDIATRIC SURGERY',
            'PEDIATRIC SURGERY',
            'ORAL AND MAXILLOFACIAL SURGERY',
            'ORAL AND MAXILLOFACIAL SURGERY',
            'ORTHOPEDIC AND TRAUMATOLOGIC SURGERY',
            'ORTHOPEDIC AND TRAUMATOLOGIC SURGERY',
            'PLASTIC RECONSTRUCTIVE AND AESTHETIC SURGERY',
            'PLASTIC RECONSTRUCTIVE AND AESTHETIC SURGERY',
            'NEUROSURGERY',
            'NEUROSURGERY',
            'THORACIC AND CARDIOVASCULAR SURGERY',
            'MIDWIFE PROFESSION EDUCATION',
            'MIDWIFE PROFESSION',
            'MIDWIFE EDUCATOR',
            'DISTANCE EDUCATION IN MIDWIFERY',
            'MIDWIFE EDUCATION',
            'OBSTETRICS AND GYNOCOLOGY',
            'MIDWIFERY SCIENCE',
            'MIDWIFERY',
            'MIDWIFERY',
            'REPRODUCTIVE BIOLOGY',
            'BIOMEDIC MEDICAL SCIENCE',
            'BIOMEDICS',
            'DIETICIAN PROFESSION EDUCATION',
            'DIETITIAN PROFESSIONAL EDUCATION',
            'DENTAL RADIOLOGY',
            'PULMONOLOGY AND RESPIRATORY MEDICINE',
            'PULMONOLOGY AND RESPIRATORY MEDICINE',
            'DENTIST PROFESSION EDUCATION',
            'DENTIST PROFESSION',
            'VETERINARIAN PROFESSION EDUCATION',
            'MEDICAL EDUCATION',
            'MEDICAL DOCTOR PROFESSION EDUCATION',
            'DENTISTRY',
            'HOSPITAL ADMINISTRATION',
            'MANAJEMEN PELAYANAN RUMAH SAKIT',
            'HOSPITAL MANAGEMENT',
            'MEDICAL LABORATORY TECHNOLOGY',
            'HOSPITAL ADMINISTRATION',
            'HOSPITAL ADMINISTRATION',
            'FOOD AND PHARMACEUTICAL ANALYST',
            'FOOD AND PHARMACEUTICAL ANALYST',
            'HEALTH ANALYSIS',
            'BIOMEDICS',
            'MEDICAL ELECTRONICS TECHNOLOGY',
            'MEDICAL ELECTRONICS',
            'EPIDEMIOLOGY',
            'CLINICAL PHARMACOLOGY',
            'PHYSIOTHERAPIST PROFESSION EDUCATION',
            'PHYSIOTHERAPIST PROFESSION EDUCATION',
            'PHYSIOTHERAPIST',
            'PHYSIOTHERAPY',
            'MEDICAL RECORDS AND HEALTH INFORMATION',
            'MEDICAL RECORDS AND HEALTH INFORMATION',
            'BASIC DENTAL SCIENCE',
            'CLINICAL MEDICINE',
            'CLINICAL MEDICINE',
            'CARDIO VASCULAR',
            'MEDICAL AND HEALTH SCIENCE',
            'TROPICAL MEDICINE',
            'FORENSIC MEDICINE',
            'COMMUNITY DENTISTRY',
            'PEDIATRIC DENTISTRY',
            'BASIC MEDICAL SCIENCE',
            'PHYSICAL MEDICINE AND REHABILITATION',
            'PHYSICAL MEDICINE AND REHABILITATION',
            'PHYSICAL MEDICINE AND REHABILITATION',
            'THORACIC AND CARDIOVASCULAR SURGERY',
            'NERS PROFESSIONAL EDUCATION',
            'PROFESSIONAL NURSE STUDY PROGRAM',
            'NURSE STUDY PROGRAM',
            'CLINICAL MEDICAL SCIENCE',
            'NUCLEAR MEDICINE',
            'MASTER OF CLINICAL DENTAL SCIENCE',
            'SPORTS MEDICINE',
            'CLINICAL DENTAL SCIENCE',
            'DENTAL SCIENCE',
            'PSYCHIATRY',
            'EAR, NOSE, THROAT HEALTH SCIENCE - HEAD NECK SURGERY',
            'HEALTH SCIENCE EAR NOSE THROAT, HEAD NECK SURGERY',
            'HEALTH SCIENCE EAR NOSE THROAT HEAD AND NECK SURGERY',
            'MEDICAL SCIENCE',
            'OCCUPATIONAL MEDICINE',
            'OCCUPATIONAL MEDICINE',
            'MEDICINE',
            'VETERINARY MEDICINE',
            'DENTISTRY',
            'AEROSPACE MEDICINE',
            'MEDICINE',
            'VETERINARY EDUCATION',
            'DOCTOR PROFESSIONAL EDUCATION',
            'PERIODONIAN DENTIST',
            'MEDICAL DOCTOR PROGRAM',
            'MEDICINE',
            'DENTAL DOCTOR PROGRAM',
            'VETERINARY DOCTOR PROGRAM',
            'MEDICAL DOCTOR PROGRAM',
            'DISTANCE EDUCATION IN NURSING',
            'MEDICAL AND SURGICAL NURSING',
            'MATERNITY NURSING',
            'COMMUNITY NURSING',
            'PSYCHIATRIC NURSING',
            'DENTAL ASSISTANT',
            'NURSE ANESTHESIOLOGY',
            'NURSE ANESTHESIOLOGY',
            'PEDIATRIC NURSING',
            'NURSING',
            'NURSING',
            'INDUSTRIAL PHARMACY',
            'CLINICAL PHARMACY',
            'PHARMACEUTICAL MANAGEMENT',
            'CLINICAL AND COMMUNITY PHARMACY',
            'SCIENCE AND PHARMACEUTICAL TECHNOLOGY',
            'PHARMACEUTICAL',
            'CLINICAL PHARMACY',
            'PHARMACY',
            'OTORHINOLARYNGOLOGY - HEAD AND NECK SURGERY',
            'VETERINARY PUBLIC HEALTH AND DISEASE SCIENCE',
            'OTORHINOLARYNGOLOGY - HEAD AND NECK SURGERY',
            'EAR, NOSE, THROAT HEALTH SCIENCE - HEAD NECK SURGERY',
            'REPRODUCTIVE HEALTH SCIENCE',
            'SPORTS HEALTH SCIENCE',
            'OPTHALMOLOGY',
            'PUBLIC HEALTH SCIENCE',
            'DERMATOLOGY AND VENEREOLOGY',
            'PEDIATRIC DENTISTRY',
            'DENTAL HYGIENE',
            'PEDIATRICS',
            'HEALTH SCIENCES',
            'INDUSTRIAL HYGIENE, OCCUPATIONAL HEALTH AND SAFETY',
            'PUBLIC HEALTH',
            'DENTAL AND ORAL HEALTH THERAPIS',
            'DENTAL TECHNOLOGY',
            'DENTAL AND ORAL HEALTH',
            'DENTAL HYGIENE',
            'MEDICAL RECORDS AND HEALTH INFORMATION',
            'BLOOD BANK TECHNOLOGY',
            'NUTRITION AND DIETETICS',
            'CLINICAL NUTRITION',
            'CLINICAL NUTRITION',
            'CLINICAL NUTRITION',
            'NUTRITION SCIENCE',
            'NUTRITION',
            'DENTAL CONSERVATION SCIENCE',
            'ENDODONTICS',
            'DENTAL TECHNIQUE',
            'DENTAL THERAPY',
            'DENTAL HYGIENE',
            'ENVIRONMENTAL HEALTH',
            'BLOOD TRANSFUSION TECHNOLOGY',
            'HEALTH INFORMATION MANAGEMENT',
            'OCCUPATIONAL HEALTH AND SAFETY',
            'MEDICAL LABORATORY TECHNOLOGY',
            'INTERNAL MEDICINE',
            'CARDIOLOGY',
            'CARDIOLOGY',
            'DERMATOLOGY AND VENEREOLOGY',
            'OPTHALMOLOGY',
            'ORAL MEDICINE',
            'PULMONOLOGY',
            'NEUROLOGY',
            'NEUROLOGY',
            'OTORHINOLARYNGOLOGY',
            'OTORHINOLARYNGOLOGY',
            'OTORHINOLARYNGOLOGY',
            'OCCUPATIONAL HEALTH AND SAFETY',
            'PLASTIC SURGERY',
            'ORTHOPEDIC SURGERY',
            'ORTHOPEDIC SURGERY',
            'ORAL AND MAXILLOFACIAL SURGERY',
            'UROLOGY',
            'SURGERY',
            'ANESTHESIOLOGY',
            'ORTHOPEDY AND TRAUMATOLOGY',
            'HERBAL',
            'CLINICAL PATHOLOGY',
            'ANATOMIC PATHOLOGY',
            'MEDICAL RECORDS',
            'CARDIOLOGY',
            'HOSPITAL ADMINISTRATION STUDY',
            'INDONESIAN TRADITIONAL HERBALS',
            'MEDICAL LABORATORY TECHNOLOGY',
            'MEDICAL LABORATORY TECHNOLOGY',
            'HOSPITAL MANAGEMENT',
            'OBSTETRICS AND GYNOCOLOGY',
            'OCCUPATIONAL THERAPY',
            'RADIATION ONCOLOGY',
            'OPTOMETRY',
            'ORTHODONTICS',
            'ORTHOPEDY AND TRAUMATOLOGY',
            'ORTHOTICS AND PROSTETIC',
            'PARAMEDIC VETERINARY',
            'CLINICAL PARASITOLOGY',
            'ANATOMIC PATHOLOGY',
            'ANATOMIC PATHOLOGY',
            'CHINA TRADITIONAL MEDICINE',
            'TRADITIONAL MEDICINE',
            'INTERNAL MEDICINE',
            'MEDICAL RECORDS AND HEALTH INFORMATION',
            'MEDICAL RECORDS AND HEALTH INFORMATION',
            'MEDICAL RECORDS AND HEALTH INFORMATION',
            'MEDICAL RECORDS AND HEALTH INFORMATION',
            'PERIODONTICS',
            'PROSTHODONTICS',
            'PSYCHIATRY',
            'PULMONOLOGY',
            'PULMONOLOGY',
            'RADIOLOGIC IMAGING TECHNOLOGY',
            'RADIOLOGIC TECHNOLOGY',
            'RADIOLOGIC TECHNOLOGY',
            'RADIOLOGY',
            'RADIOLOGIC TECHNOLOGY',
            'RADIOLOGIC TECHNOLOGY',
            'OPTOMETRY',
            'PHYSICAL MEDICINE AND REHABILITATION',
            'MEDICAL RECORDS AND HEALTH INFORMATION',
            'MEDICAL RECORDS',
            'MEDICAL RECORDS',
            'OPTOMETRY',
            'BIOMEDICAL SCIENCE',
            'VETERINARY SCIENCE',
            'ENVIRONMENTAL SANITATION',
            'SANITATION',
            'MEDICAL ELECTRONICS TECHNOLOGY',
            'CARDIOVASCULAR TECHNOLOGY',
            'RADIOLOGIC TECHNOLOGY',
            'RONTGEN TECHNIQUE',
            'MEDICAL ELECTRONICS TECHNOLOGY',
            'MEDICAL ELECTRONICS TECHNOLOGY',
            'OTORHINOLARYNGOLOGY - HEAD AND NECK',
            'IMAGING DIAGNOSTIC',
            'SPEECH THERAPY',
            'OTORHINOLARYNGOLOGY - HEAD AND NECK SURGERY',
            'UROLOGY',
            'VACCINOLOGY AND IMMUNOTHERAPY',
            'PEDIATRICS',
            'OTORHINOLARYNGOLOGY - HEAD AND NECK SURGERY'

        ];

        return view(
            'awal.akreditasi.caridbhaen',
            compact('no', 'tentangs', 'hasil', 'footers', 'ft', 'cari1', 'cari2', 'cari3', 'cari5', 'cari6', 'peringkat', 'ganti', 'statuscari', 'statusganti', 'lvl', 'glvl', 'nmps', 'gnmps')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function caridhamini(Request $request)
    {
        $no             = 1;
        $cari1          = $request->get('nama_ps');
        $cari2          = $request->get('nama_pt');
        $cari3          = $request->get('jenjang');
        $cari5          = $request->get('cek');
        $cari6          = $request->get('thn');
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $hasil          = HasilAkreditasiMini::where([
            ['status_kadaluarsa', 'like', '%' . $cari5 . '%'],
            ['nama_pt', 'like', '%' . $cari2 . '%'],
            ['nama_ps', 'like', '%' . $cari1 . '%'],
            ['jenjang', 'like', '%' . $cari3 . '%'],
            ['tgl_kadaluarsa', 'like', '%' . $cari6 . '%'],
            ['is_show', '=', '1']
        ])
            ->get();

        $bulan          = [
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
        $ganti          = [
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

        return view(
            'awal.akreditasi.caridbhamini',
            compact('no', 'tentangs', 'hasil', 'footers', 'ft', 'cari1', 'cari2', 'cari3', 'cari5', 'cari6', 'bulan', 'ganti')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alldhamini(Request $request)
    {
        $cari1          = $request->get('nama_ps');
        $cari2          = $request->get('nama_pt');
        $cari3          = $request->get('jenjang');
        $cari5          = $request->get('cek');
        $cari6          = $request->get('thn');
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $hasil          = HasilAkreditasiMini::where('is_show', '=', '1')
            ->latest()
            ->get();

        $bulan          = [
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
        $ganti          = [
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

        return view(
            'awal.akreditasi.caridbhamini',
            compact('no', 'tentangs', 'hasil', 'footers', 'ft', 'cari1', 'cari2', 'cari3', 'cari5', 'cari6', 'bulan', 'ganti')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tdhakremini()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $dhakreditasi   = HasilAkreditasiMini::latest()
            ->where('is_show', '=', '1')
            ->get();
        // $date = date('Y');

        return view(
            'awal.akreditasi.dhamini',
            compact('no', 'tentangs', 'dhakreditasi', 'footers', 'ft')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alldha(Request $request)
    {
        $cari1          = $request->get('nama_ps');
        $cari2          = $request->get('nama_pt');
        $cari3          = $request->get('jenjang');
        $cari5          = $request->get('cek');
        $cari6          = $request->get('thn');
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $hasil          = HasilAkreditasi::where('is_show', '=', '1')
            ->latest()
            ->get();

        $bulan          = [
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
        $ganti          = [
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

        return view(
            'awal.akreditasi.caridbha',
            compact('no', 'tentangs', 'hasil', 'footers', 'ft', 'cari1', 'cari2', 'cari3', 'cari5', 'cari6', 'bulan', 'ganti')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function timp()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $no1            = 1;
        $no2            = 1;
        $no3            = 1;


        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';

        curl_setopt_array($curl, array(
            // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalListTimPenilai",
            CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalListTimPenilai",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "api-key: " . $api_key . ""
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        $res = json_decode($response, TRUE);
        $results = isset($res['data']) ? $res['data'] : [];
        $result = isset($results['asesor']) && is_array($results['asesor']) ? $results['asesor'] : [];
        $result1 = [];
        $result2 = isset($results['validator']) && is_array($results['validator']) ? $results['validator'] : [];
        $result3 = [];



        $gelar = [',', '-', 'M.Si', 'SKp.', 'M.Biomed', 'S.KM.', 'M.Kes.', 'Ph.D', 'M.Kep', 'Sp.OG(K)', 'Prof.', 'Dr.', 'dr.', 'MS.Biomed', 'Jiwa', 'MNS.', 'Drs', 'M.Kep.Ns,Sp.Kep.An', 'Ns.', 'SKM', 'M.Kes', 'SST.', 'Sp.M(K)', '(k)', 'Sp.Kom', 'MCN', 'MKM', 'M.App.Sc.', 'Ir.', 'MF.', 'SPd.', 'Sp.An-KIC', 'MARS', 'MPH', 'SST', 'S.ST.', 'M.Hlth', 'K.', 'G.', 'SpOt', 'S.Kep.', 'S.Pd.', 'S.Kep.', 'M.N.S.', 'S.Kp', 'S.Si.T.', 'M.Keb.', 'S. Kep.', 'S.SiT.', 'M.Keb', 'MSN.', 'PhD', 'M.ScPH.', 'M.Sc.', 'M.S.Apt', 'M.Sc.', 'Sp.Kep.MB', 'Sp.B Sp.BPRE(K)', 'Msc', '(K)', 'SpBPRE', 'Sp.Perio', 'MSi.', 'MN', 'SGz', 'MGz', 'M.Mid', 'M.Keb', 'MSc.PH', 'SKep.MNS', 'SpAn', 'KMN', 'M. Biomed.', 'Apt', 'SpKJ', 'drg.', 'S.PSi.', 'M.KM.', 'M.Epid.', 'M.MedEd', 'M.S D.S', 'Dra.', 'S.Kep Ns .', 'MS. Sp.Ok', 'PMM', 'Mkep', 'M. Kep.', 'DMM.', 'MSc', 'SKP.', 'MPS', 'Sp.S', 'SU. Sp. Perio', 'SKep.S', 'KIC', 'MKes.', 'Sp.S', 'Sp.Rad', 'SpJP FIHA', 'Dr Sp. A', 'Sp. Mat', 'Sp.', 'NsSp.Kep.An', 'Sp.AnKIC', 'SpM', 'Mkes', 'SpM', 'Mkes.', '.NsKep.An', 'SpOT', 'M. Sofro', 'S. Kp. M.Sc', 'SpRKG', 'M. App.Sc D.N.S.c.', 'Prof', 'Dra'];
        // foreach ($gelars as $glr) {

        // }
        // $gl =array($gelar);
        // print_r($gl);

        // echo $gl;
        // return abort('404');
        // return $result2;
        return view(
            'awal.akreditasi.timp',
            compact(
                'result',
                'result1',
                'result2',
                'result3',
                'no',
                'no1',
                'no2',
                'no3',
                'tentangs',
                'footers',
                'ft',
                'gelar'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function timpen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $no1            = 1;
        $no2            = 1;
        $no3            = 1;

        $curl = curl_init();
        $api_key = '2ed928fc98ae3e9f09462c2f35182996845721603d60bb641f00637778c20c97';

        curl_setopt_array($curl, array(
            // CURLOPT_URL => "http://localhost/simakV2/public/api/v2/portalListTimPenilai",
            CURLOPT_URL => "https://akreditasi.lamptkes.org/api/v2/portalListTimPenilai",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "api-key: " . $api_key . ""
            ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response, TRUE);
        $results = $res['data'];

        $result = $results['asesor'];
        $result1 = array(); //faslitator
        $result2 = $results['validator'];
        $result3 = array(); //majelis


        $gelar = [',', '-', 'M.Si', 'SKp.', 'M.Biomed', 'S.KM.', 'M.Kes.', 'Ph.D', 'M.Kep', 'Sp.OG(K)', 'Prof.', 'Dr.', 'dr.', 'MS.Biomed', 'Jiwa', 'MNS.', 'Drs', 'M.Kep.Ns,Sp.Kep.An', 'Ns.', 'SKM', 'M.Kes', 'SST.', 'Sp.M(K)', '(k)', 'Sp.Kom', 'MCN', 'MKM', 'M.App.Sc.', 'Ir.', 'MF.', 'SPd.', 'Sp.An-KIC', 'MARS', 'MPH', 'SST', 'S.ST.', 'M.Hlth', 'K.', 'G.', 'SpOt', 'S.Kep.', 'S.Pd.', 'S.Kep.', 'M.N.S.', 'S.Kp', 'S.Si.T.', 'M.Keb.', 'S. Kep.', 'S.SiT.', 'M.Keb', 'MSN.', 'PhD', 'M.ScPH.', 'M.Sc.', 'M.S.Apt', 'M.Sc.', 'Sp.Kep.MB', 'Sp.B Sp.BPRE(K)', 'Msc', '(K)', 'SpBPRE', 'Sp.Perio', 'MSi.', 'MN', 'SGz', 'MGz', 'M.Mid', 'M.Keb', 'MSc.PH', 'SKep.MNS', 'SpAn', 'KMN', 'M. Biomed.', 'Apt', 'SpKJ', 'drg.', 'S.PSi.', 'M.KM.', 'M.Epid.', 'M.MedEd', 'M.S D.S', 'Dra.', 'S.Kep Ns .', 'MS. Sp.Ok', 'PMM', 'Mkep', 'M. Kep.', 'DMM.', 'MSc', 'SKP.', 'MAP', 'MPS', 'Sp.S', 'SU. Sp. Perio', 'SKep.S', 'KIC', 'MKes.', 'Sp.S', 'Sp.Rad', 'SpJP FIHA', 'Dr Sp. A', 'Sp. Mat', 'Sp.', 'NsSp.Kep.An', 'Sp.AnKIC', 'SpM', 'Mkes', 'SpM', 'Mkes.', '.NsKep.An', 'SpOT', 'M. Sofro', 'S. Kp. M.Sc', 'SpRKG', 'M. App.Sc D.N.S.c.', 'Prof', 'Dra'];
        // foreach ($gelars as $glr) {

        // }
        // $gl =array($gelar);
        // print_r($gl);

        // echo $gl;
        // return abort('404');
        return view(
            'awal.akreditasi.timpen',
            compact(
                'result',
                'result1',
                'result2',
                'result3',
                'no',
                'no1',
                'no2',
                'no3',
                'tentangs',
                'footers',
                'ft',
                'gelar'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tdhakre()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $dhakreditasi   = HasilAkreditasi::latest()
            ->where('is_show', '=', '1')
            ->get();
        // $nmpt           = HasilAkreditasi::select('nama_pt')
        //                         ->distinct('nama_pt')
        //                         ->where('is_show','1')
        //                         ->orderby('nama_pt')
        //                         ->get();
        $nmpt           = HasilAkreditasi::select('nama_pt')
            ->where('is_show', '1')
            ->groupBy('nama_pt')
            ->get();
        $nmps           = HasilAkreditasi::select('nama_ps')
            // ->distinct('nama_ps')
            ->where('is_show', '1')
            ->groupby('nama_ps')
            // ->where('is_show','1')
            // ->limit(340)
            ->get();
        // $nmps = HasilAkreditasi::select("nama_ps", DB::raw("count(*) as tt"))
        //                 ->groupBy('nama_ps')
        //                 ->get();
        $cri    = ['&', "'", '-', '\r', '\n', '\r\n'];
        $gnt    = ['DAN', '', ' ', '', '', ''];
        $lspt   = str_replace($cri, $gnt, collect($nmpt)->implode('nama_pt', '~'));
        $lsps   = Str::finish(str_replace($cri, $gnt, collect($nmps)->implode('nama_ps', '~')), '');
        // $lsps   = collect($nmps);
        // $lsps = $nmps;
        // $lsps = json_encode($nmps, true);
        // $no =1;        
        // foreach ($nmps as $v) {
        //     echo $no++.' '.$v->nama_ps.'<br>';
        // }
        // return $nmpt;
        return view(
            'awal.akreditasi.dha',
            compact('no', 'tentangs', 'dhakreditasi', 'footers', 'ft', 'lspt', 'lsps')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tdhakreen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $dhakreditasi   = HasilAkreditasi::latest()
            ->where('is_show', '=', '1')
            ->get();
        // $date = date('Y');

        return view(
            'awal.akreditasi.dhaen',
            compact('no', 'tentangs', 'dhakreditasi', 'footers', 'ft')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function instrumenundh()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Instrumen Akreditasi 7 Kriteria')
            ->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $unduhans       = Unduhan::where([
            ['katbahasa_id', $kbhs->id],
            ['katunduhan_id', $kundh->id],

        ])
            ->orderby('bidang_ilmu')
            ->get();

        return view(
            'awal.unduhan.tujuhkriteria',
            compact('no', 'tentangs', 'unduhans', 'footers', 'ft')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function instrumenundhen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Instrumen Akreditasi 7 Kriteria')
            ->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $unduhans       = Unduhan::where([
            ['katbahasa_id', $kbhs->id],
            ['katunduhan_id', $kundh->id],

        ])
            ->orderby('bidang_ilmu')
            ->get();

        return view(
            'awal.unduhan.tujuhkriteriaen',
            compact('no', 'tentangs', 'unduhans', 'footers', 'ft')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function instrumensembilan()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Instrumen Akreditasi 9 Kriteria')
            ->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $unduhans       = Unduhan::where([
            ['katbahasa_id', $kbhs->id],
            ['katunduhan_id', $kundh->id],

        ])
            ->orderby('bidang_ilmu')
            ->get();

        return view(
            'awal.unduhan.sembilankriteria',
            compact('no', 'tentangs', 'unduhans', 'footers', 'ft')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function instrumendelapan()
    // {

    //     $kbhs           = KatBahasa::where('namakbhs','Indonesia')->first();
    //     $kundh          = KatUnduhan::where('namaundh','Instrumen 8 Kriteria')
    //                             ->first();
    //     $ft             = Footer::where('njudul','=','navigasi')->get();
    //     $footers        = Footer::where('njudul','!=','navigasi')->limit(5)->get();
    //     $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
    //     $no             = 1;
    //     $unduhans       = Unduhan::where([
    //                             ['katbahasa_id', $kbhs->id],
    //                             ['katunduhan_id', $kundh->id],

    //                          ])
    //                         ->orderby('bidang_ilmu')
    //                         ->get();

    //     return view('awal.unduhan.delapankriteria', 
    //         compact('no','tentangs', 'unduhans','footers','ft'));
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    public function instrumenapsterakred()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Instrumen APS Kualitatif Terakreditasi')
            ->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $unduhans       = Unduhan::where([
            ['katbahasa_id', $kbhs->id],
            ['katunduhan_id', $kundh->id],

        ])
            ->orderby('bidang_ilmu')
            ->get();

        return view(
            'awal.unduhan.apsterakred',
            compact('no', 'tentangs', 'unduhans', 'footers', 'ft')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function instrumenapsunggul()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Instrumen APS Kualitatif Terakreditasi Unggul')
            ->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $unduhans       = Unduhan::where([
            ['katbahasa_id', $kbhs->id],
            ['katunduhan_id', $kundh->id],

        ])
            ->orderby('bidang_ilmu')
            ->get();

        return view(
            'awal.unduhan.apsunggul',
            compact('no', 'tentangs', 'unduhans', 'footers', 'ft')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function instrumensembilanen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Instrumen Akreditasi 9 Kriteria')
            ->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $unduhans       = Unduhan::where([
            ['katbahasa_id', $kbhs->id],
            ['katunduhan_id', $kundh->id],

        ])
            ->orderby('bidang_ilmu')
            ->get();

        return view(
            'awal.unduhan.sembilankriteriaen',
            compact('no', 'tentangs', 'unduhans', 'footers', 'ft')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function instrumenminimum()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Instrumen Akreditasi Minimum')
            ->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $no             = 1;
        $unduhans       = Unduhan::where([
            ['katbahasa_id', $kbhs->id],
            ['katunduhan_id', $kundh->id],

        ])
            ->orderby('bidang_ilmu')
            ->get();

        return view(
            'awal.unduhan.instrumenakreditasiminimum',
            compact('no', 'tentangs', 'unduhans', 'footers', 'ft')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function tqaakre()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->limit(3)
            ->latest()
            ->get();
        $qakres         = QAkreditasi::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->get();
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $alu            = QAkreditasi::where([
            ['katbahasa_id', $kbhs->id],
        ])
            ->orderby('nqakre', 'asc')
            ->get();

        $aktif          = QAkreditasi::where([
            ['katbahasa_id', $kbhs->id],
        ])
            ->orderby('nqakre', 'asc')
            ->first();

        // return $aktif;
        return view(
            'awal.akreditasi.tqakre',
            compact('tentangs', 'qakres', 'footers', 'alu', 'aktif', 'agendas', 'beritas', 'ft')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tqaakreen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->limit(3)
            ->latest()
            ->get();
        $qakres         = QAkreditasi::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->get();
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $alu            = QAkreditasi::where([
            ['katbahasa_id', $kbhs->id],
        ])
            ->orderby('nqakre', 'asc')
            ->get();

        $aktif          = QAkreditasi::where([
            ['katbahasa_id', $kbhs->id],
        ])
            ->orderby('nqakre', 'asc')
            ->first();

        // return $aktif;
        return view(
            'awal.akreditasi.tqakreen',
            compact('tentangs', 'qakres', 'footers', 'alu', 'aktif', 'agendas', 'beritas', 'ft')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lamptkesapi()
    {
        $akre = HasilAkreditasi::orderby('nama_pt', 'ASC')->where('is_show', '1')->get(array('id as id_hasil_akreditasi', 'kode_pt', 'nama_pt', 'kode_ps', 'nama_ps', 'jenjang', 'wil', 'no_sk', 'peringkat_akademis', 'peringkat_profesi', 'peringkat_spesialis', 'tgl_kadaluarsa', 'thn_sk', 'tgl_sk', 'status_kadaluarsa', 'rumpun_ilmu', 'is_show', 'id_sms'));

        // echo json_encode($akre);
        // echo '<pre>';
        // print_r($akre);
        // echo '</pre>';
        // return view('lamptkes.apihasilakre.api', compact('akre'));
        return json_encode($akre);
    }

    public function prodiReguler($key)
    {
        if ($key != '8e89d72027988d2a9d7c50ca4bbea32d15586608b16538e87b43e3f8ca67ab7d') {

            return response()->json([
                'status' => 'Gagal, Api Key Tidak Diterima!',
            ], 401);
            exit;
        } else {

            $ipaddress = \Request::ip();

            $id = 504683583;
            $subject = "Access API Hasil Akreditasi Reguler oleh BAN-PT - " . date('d-m-Y H:i');
            $pesan = "-Hostname : " . gethostname() . "\n-IP Address : " . $ipaddress;
            $html_pesan = urlencode("Subject : \n" . $subject . "\n\nData Client \n" . $pesan . "\n");

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.telegram.org/bot5395193595:AAETj5mth-KyQ8OquOJ57YPOiTtzIVwaMm8/sendMessage?chat_id=" . $id . "&text=" . $html_pesan . "",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CUSTOMREQUEST => "GET",
                // CURLOPT_POSTFIELDS => "waybill=660000809300&courier=tiki",
                // CURLOPT_HTTPHEADER => array(
                // "content-type: application/x-www-form-urlencoded",
                // "key: 777a56e06ada351884be611bedfd423f"
                // ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            $akre = HasilAkreditasi::orderby('nama_pt', 'ASC')->where('is_show', '1')->get(array('kode_pt', 'nama_pt', 'kode_ps', 'nama_ps', 'jenjang', 'wil', 'no_sk', 'peringkat_akademis', 'peringkat_profesi', 'peringkat_spesialis', 'tgl_kadaluarsa', 'thn_sk', 'tgl_sk', 'status_kadaluarsa', 'rumpun_ilmu', 'id_sms', 'id_sms', 'created_at as tgl_pembuatan'));
            if ($akre->count() == 0) {
                return response()->json([
                    'status' => 'Data tidak ditemukan atau masih kosong'
                ], 200);
                exit;
            } else {

                return json_encode($akre);
            }
        }
    }

    public function prodiBaru($key)
    {
        if ($key != '8e89d72027988d2a9d7c50ca4bbea32d15586608b16538e87b43e3f8ca67ab7d') {

            return response()->json([
                'status' => 'Gagal, Api Key Tidak Diterima!'
            ], 401);
            exit;
        } else {

            $ipaddress = \Request::ip();

            $id = 504683583;
            $subject = "Access API Hasil Akreditasi Prodi Baru oleh BAN-PT - " . date('d-m-Y H:i');
            $pesan = "-Hostname : " . gethostname() . "\n-IP Address : " . $ipaddress;
            $html_pesan = urlencode("Subject : \n" . $subject . "\n\nData Client \n" . $pesan . "\n");

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.telegram.org/bot5395193595:AAETj5mth-KyQ8OquOJ57YPOiTtzIVwaMm8/sendMessage?chat_id=" . $id . "&text=" . $html_pesan . "",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CUSTOMREQUEST => "GET",
                // CURLOPT_POSTFIELDS => "waybill=660000809300&courier=tiki",
                // CURLOPT_HTTPHEADER => array(
                // "content-type: application/x-www-form-urlencoded",
                // "key: 777a56e06ada351884be611bedfd423f"
                // ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            $akre = SkProdiBaru::orderby('nama_pt', 'ASC')->where('is_show', '1')->get(array('kode_pt', 'nama_pt', 'kode_ps', 'nama_ps', 'jenjang', 'no_sk', 'peringkat', 'tgl_kadaluarsa', 'thn_sk', 'tgl_sk', 'status_kadaluarsa', 'rumpun_ilmu', 'id_sms', 'tgl_sk as tgl_pembuatan'));

            if ($akre->count() == 0) {
                return response()->json([
                    'status' => 'Data tidak ditemukan atau masih kosong'
                ], 200);
                exit;
            } else {

                return json_encode($akre);
            }

            // lo codingnya di sini ya mas ridwan

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cronup()
    {

        $date       = date('Y-m-d');
        $hasilakre  = HasilAkreditasi::where([
            ['is_show', '1'],
            ['status_kadaluarsa', 'MASIH BERLAKU'],
            ['tgl_kadaluarsa', '<', $date],
        ])
            ->update([
                'status_kadaluarsa' => 'DALUWARSA'
            ]);
        // ->get();
        // ->count('id');

        // return $hasilakre;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function croncek()
    {

        $date       = date('Y-m-d');
        $hasilakre  = HasilAkreditasi::where([
            ['tgl_kadaluarsa', '>', $date],
            ['is_show', '0'],
            ['status_kadaluarsa', 'MASIH BERLAKU'],
        ])
            ->update([
                'status_kadaluarsa' => 'ALIH BENTUK'
            ]);
    }
}
