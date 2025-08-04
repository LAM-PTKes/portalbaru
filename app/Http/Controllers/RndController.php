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
use App\Renstra;
use App\Newsletter;
use App\InfoGrafis;

class RndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lpriset()
    {

        $kbhs     = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $riset    = Riset::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->paginate(3);
        $bulan  = [
                    'January','February','March','April','May','June','July','August','September','October','November','December'
                    ];
        $ganti  = [
                    'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
                    ];

        return view('awal.rnd.riset', compact('bulan','ganti','riset','tentangs','ft','footers'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lpriseten()
    {

        $kbhs     = KatBahasa::where('namakbhs','English')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $riset    = Riset::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->paginate(3);
        $bulan  = [
                    'January','February','March','April','May','June','July','August','September','October','November','December'
                    ];
        $ganti  = [
                    'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
                    ];

        return view('awal.rnd.riseten', compact('bulan','ganti','riset','tentangs','ft','footers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dlpriset(Riset $rst)
    {

        $kbhs     = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $lihat    = Riset::where('id', $rst->id)->max('views');
        $rst->update([
                        'views' => $lihat+1
                    ]);
        $riset    = Riset::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->limit(10)
                            ->get();

        return view('awal.rnd.driset', compact('rst','ft','footers','tentangs','riset'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function renstralam()
    {

        $kbhs     = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $renstra  = Renstra::latest()->limit(1)->get();

        return view('awal.rnd.renstra', compact('renstra','ft','footers','tentangs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function infograf()
    {
        $no         = 1;
        $kbhs       = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft         = Footer::where('njudul','=','navigasi')->get();
        $footers    = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs   = Kontak::where('katbahasa_id', $kbhs->id)
                        ->limit(1)
                        ->latest()
                        ->get();

        $infografis = InfoGrafis::where([
                                            ['publikasi','Ya'],
                                            ['katbahasa_id',$kbhs->id],
                                        ])
                                ->latest()
                                ->paginate(3);

        return view('awal.rnd.infografis', compact('tentangs','ft','infografis'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dinfograf(InfoGrafis $ifg)
    {

        $kbhs     = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $lihat    = InfoGrafis::where('id', $ifg->id)->max('views');
        $ifg->update([
                        'views' => $lihat+1
                    ]);
        $infografis   = InfoGrafis::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->limit(10)
                            ->get();

        return view('awal.rnd.dinfografis', compact('ifg','ft','footers','tentangs','infografis'));
        // return $infografis;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

         public function tsurvei()
    {
       
        $kbhs     = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $survey   = Survey::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->whereDate('tgl_tutup','>=', date('Y-m-d'))
                            ->latest()
                            ->paginate(3);
        $bulan  = [
                    'January','February','March','April','May','June','July','August','September','October','November','December'
                    ];
        $ganti  = [
                    'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
                    ];
        
        // return $survey;

        return view('awal.rnd.survei', compact('bulan','ganti','survey','tentangs','ft','footers'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

         public function tsurveien()
    {
       
        $kbhs     = KatBahasa::where('namakbhs','English')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $survey   = Survey::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->whereDate('tgl_tutup','>=', date('Y-m-d'))
                            ->latest()
                            ->paginate(3);
        $bulan  = [
                    'January','February','March','April','May','June','July','August','September','October','November','December'
                    ];
        $ganti  = [
                    'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
                    ];
        
        // return $survey;

        return view('awal.rnd.surveien', compact('bulan','ganti','survey','tentangs','ft','footers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lsurvei()
    {
        
        $x = strval($_GET['q']);
        $s = Survey::where('id', $x)->max('views');
        $v = Survey::where('id', $x)
                        ->update([
                                'views' => $s+1
                            ]);
        $hs = Survey::where('id', $x)->max('views');
        echo $hs;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tjurnal()
    {

        $kbhs     = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $jurnal   = Jurnal::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->paginate(3);
        $bulan  = [
                    'January','February','March','April','May','June','July','August','September','October','November','December'
                    ];
        $ganti  = [
                    'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
                    ];

        return view('awal.rnd.jurnal', compact('bulan','ganti','jurnal','tentangs','ft','footers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tjurnalen()
    {

        $kbhs     = KatBahasa::where('namakbhs','English')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $jurnal   = Jurnal::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->paginate(3);
        $bulan  = [
                    'January','February','March','April','May','June','July','August','September','October','November','December'
                    ];
        $ganti  = [
                    'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
                    ];

        return view('awal.rnd.jurnalen', compact('bulan','ganti','jurnal','tentangs','ft','footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function djurnal(Jurnal $jnl)
    {

        $kbhs     = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $lihat    = Jurnal::where('id', $jnl->id)->max('views');
        $jnl->update([
                        'views' => $lihat+1
                    ]);
        $junal    = Jurnal::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->limit(10)
                            ->get();

        return view('awal.rnd.djurnal', compact('jnl','ft','footers','tentangs','junal'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function djurnalen(Jurnal $jnl)
    {

        $kbhs     = KatBahasa::where('namakbhs','English')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $lihat  = Jurnal::where('id', $jnl->id)->max('views');
        $jnl->update([
                        'views' => $lihat+1
                    ]);
        $junal    = Jurnal::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->limit(10)
                            ->get();

        return view('awal.rnd.djurnalen', compact('jnl','ft','footers','tentangs','junal'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tnewslet()
    {

        $kbhs     = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $nleter   = Newsletter::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->paginate(3);
        $bulan  = [
                    'January','February','March','April','May','June','July','August','September','October','November','December'
                    ];
        $ganti  = [
                    'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
                    ];

        return view('awal.rnd.newsletter', compact('bulan','ganti','nleter','tentangs','ft','footers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dnewslet(Newsletter $nlt)
    {

        $kbhs     = KatBahasa::where('namakbhs','Indonesia')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $lihat    = Newsletter::where('id', $nlt->id)->max('views');
        $nlt->update([
                        'views' => $lihat+1
                    ]);
        $nleter   = Newsletter::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->limit(10)
                            ->get();

        return view('awal.rnd.dnewsletter', compact('nlt','ft','footers','tentangs','nleter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tnewsleten()
    {

        $kbhs     = KatBahasa::where('namakbhs','English')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $nleter   = Newsletter::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->paginate(3);
        $bulan  = [
                    'January','February','March','April','May','June','July','August','September','October','November','December'
                    ];
        $ganti  = [
                    'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
                    ];

        return view('awal.rnd.newsletteren', compact('bulan','ganti','nleter','tentangs','ft','footers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dnewsleten(Newsletter $nlt)
    {

        $kbhs     = KatBahasa::where('namakbhs','English')->first();
        $ft       = Footer::where('njudul','=','navigasi')->get();
        $footers  = Footer::where('njudul','!=','navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $lihat    = Newsletter::where('id', $nlt->id)->max('views');
        $nlt->update([
                        'views' => $lihat+1
                    ]);
        $nleter   = Newsletter::where([
                                    ['katbahasa_id', $kbhs->id],
                                    ['publikasi', 'Ya'],
                                ])
                            ->latest()
                            ->limit(10)
                            ->get();

        return view('awal.rnd.dnewsletteren', compact('nlt','ft','footers','tentangs','nleter'));
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
