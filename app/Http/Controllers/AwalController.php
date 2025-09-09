<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Agenda;
use App\Berita;
use App\Footer;
use App\Kontak;
use App\Profil;
use App\Unduhan;
use App\KatBahasa;
use App\KatBerita;
use App\KatUnduhan;
use App\Organisasi;
use App\CapaianTahunan;
use App\KategoriProfile;
use App\ProfilePimpinan;
use Illuminate\Http\Request;

class AwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regulasi()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['is_show', '1'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.regulasi.regulasi',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft')
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reguu()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['kat_regulasi', 'Undang-Undang'],
            ['is_show', '1'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.regulasi.regulasi',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft')
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regpres()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['kat_regulasi', 'Peraturan Presiden'],
            ['is_show', '1'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.regulasi.regulasi',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft')
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regpem()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['kat_regulasi', 'Peraturan Pemerintah'],
            ['is_show', '1'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.regulasi.regulasi',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft')
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regmen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['kat_regulasi', 'Peraturan Menteri'],
            ['is_show', '1'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.regulasi.regulasi',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft')
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regbanpt()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['kat_regulasi', 'Peraturan BAN-PT'],
            ['is_show', '1'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.regulasi.regulasi',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft')
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reglamptkes()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['kat_regulasi', 'Peraturan LAM-PTKes'],
            ['is_show', '1'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.regulasi.regulasi',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regulasien()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['is_show', '1'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.regulasi.regulasien',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regucon()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['is_show', '1'],
            ['kat_regulasi', 'Undang-Undang'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $rg     =   [
            'Undang-Undang',
            'Peraturan Presiden',
            'Peraturan Pemerintah',
            'Peraturan Menteri',
            'Peraturan BAN-PT',
            'Peraturan LAM-PTKes'
        ];
        $grg    =   [
            'Constitution',
            'Presidential decree',
            'Government Regulations',
            'Ministerial Regulations',
            'NAAHE Regulations',
            'IAAHEH Regulations'
        ];

        return view(
            'awal.regulasi.regulasien',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft', 'rg', 'grg')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regupd()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['is_show', '1'],
            ['kat_regulasi', 'Peraturan Presiden'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $rg     =   [
            'Undang-Undang',
            'Peraturan Presiden',
            'Peraturan Pemerintah',
            'Peraturan Menteri',
            'Peraturan BAN-PT',
            'Peraturan LAM-PTKes'
        ];
        $grg    =   [
            'Constitution',
            'Presidential decree',
            'Government Regulations',
            'Ministerial Regulations',
            'NAAHE Regulations',
            'IAAHEH Regulations'
        ];

        return view(
            'awal.regulasi.regulasien',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft', 'rg', 'grg')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regugr()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['is_show', '1'],
            ['kat_regulasi', 'Peraturan Pemerintah'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $rg     =   [
            'Undang-Undang',
            'Peraturan Presiden',
            'Peraturan Pemerintah',
            'Peraturan Menteri',
            'Peraturan BAN-PT',
            'Peraturan LAM-PTKes'
        ];
        $grg    =   [
            'Constitution',
            'Presidential decree',
            'Government Regulations',
            'Ministerial Regulations',
            'NAAHE Regulations',
            'IAAHEH Regulations'
        ];

        return view(
            'awal.regulasi.regulasien',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft', 'rg', 'grg')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regumr()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['is_show', '1'],
            ['kat_regulasi', 'Peraturan Menteri'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $rg     =   [
            'Undang-Undang',
            'Peraturan Presiden',
            'Peraturan Pemerintah',
            'Peraturan Menteri',
            'Peraturan BAN-PT',
            'Peraturan LAM-PTKes'
        ];
        $grg    =   [
            'Constitution',
            'Presidential decree',
            'Government Regulations',
            'Ministerial Regulations',
            'NAAHE Regulations',
            'IAAHEH Regulations'
        ];

        return view(
            'awal.regulasi.regulasien',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft', 'rg', 'grg')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regubanpt()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['is_show', '1'],
            ['kat_regulasi', 'Peraturan BAN-PT'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $rg     =   [
            'Undang-Undang',
            'Peraturan Presiden',
            'Peraturan Pemerintah',
            'Peraturan Menteri',
            'Peraturan BAN-PT',
            'Peraturan LAM-PTKes'
        ];
        $grg    =   [
            'Constitution',
            'Presidential decree',
            'Government Regulations',
            'Ministerial Regulations',
            'NAAHE Regulations',
            'IAAHEH Regulations'
        ];

        return view(
            'awal.regulasi.regulasien',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft', 'rg', 'grg')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regulam()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $regul          = KatBerita::where('namakbrt', 'Regulasi')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

        $regulasis      = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $regul->id],
            ['is_show', '1'],
            ['kat_regulasi', 'Peraturan LAM-PTKes'],
        ])
            ->latest()
            ->paginate(4);

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $rg     =   [
            'Undang-Undang',
            'Peraturan Presiden',
            'Peraturan Pemerintah',
            'Peraturan Menteri',
            'Peraturan BAN-PT',
            'Peraturan LAM-PTKes'
        ];
        $grg    =   [
            'Constitution',
            'Presidential decree',
            'Government Regulations',
            'Ministerial Regulations',
            'NAAHE Regulations',
            'IAAHEH Regulations'
        ];

        return view(
            'awal.regulasi.regulasien',
            compact('agendas', 'tentangs', 'regulasis', 'pengumumans', 'footers', 'ft', 'rg', 'grg')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tagenda()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();

        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

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
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.kegiatan.kegiatan',
            compact('agendas', 'populer', 'tentangs', 'pengumumans', 'footers', 'ft')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tagendaen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();

        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->latest()
            ->paginate(5);

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
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.kegiatan.kegiatanen',
            compact('agendas', 'populer', 'tentangs', 'pengumumans', 'footers', 'ft')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tpengumuman()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->latest()
            ->paginate(4);

        return view(
            'awal.pengumuman.tpengumuman',
            compact('agendas', 'tentangs', 'pengumumans', 'footers', 'ft')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tpengumumanen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->latest()
            ->paginate(4);

        return view(
            'awal.pengumuman.tpengumumanen',
            compact('agendas', 'tentangs', 'pengumumans', 'footers', 'ft')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();
        $cari           = $request->get('keyword');
        $hasil          = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['judul', 'like', '%' . $cari . '%'],
            ['is_show', '1'],
        ])
            ->orwhere([
                ['katbahasa_id', $kbhs->id],
                ['isi', 'like', '%' . $cari . '%'],
                ['is_show', '1'],
            ])
            ->paginate(5);

        return view('awal.cari.cari', compact(
            'tentangs',
            'hasil',
            'cari',
            'footers',
            'ft'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchen(Request $request)
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();
        $cari           = $request->get('keyword');
        $hasil          = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['judul', 'like', '%' . $cari . '%'],
            ['is_show', '1'],
        ])
            ->orwhere([
                ['katbahasa_id', $kbhs->id],
                ['isi', 'like', '%' . $cari . '%'],
                ['is_show', '1'],
            ])
            ->paginate(5);

        $katacari       = [
            'Berita',
            'Pengumuman',
            'Standar',
            'Regulation',
            'Standar Pendidikan Profesi Dokter',
            'Artikel'
        ];
        $ganti          = [
            'News',
            'Announcement',
            'Standard',
            'Doctor Professional Education Standards',
            'Article'
        ];

        return view('awal.cari.carien', compact(
            'tentangs',
            'hasil',
            'cari',
            'footers',
            'ft',
            'katacari',
            'ganti'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $pro            = Profil::where('nprofil', 'like', '%profil%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $pro1           = Profil::where('nprofil', 'like', '%kebijakan mutu%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $pro2           = Profil::where('nprofil', 'like', '%langkah strategis%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $pro3           = Profil::where('nprofil', 'like', '%Visi LAM-PTKes%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $pro4           = Profil::where('nprofil', 'like', '%Misi LAM-PTKes%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $pro5           = Profil::where('nprofil', 'like', '%Tujuan LAM-PTKes%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();


        return view('awal.profil.profil', compact('beritas', 'agendas', 'tentangs', 'pro', 'pro1', 'pro2', 'pro3', 'pro4', 'pro5', 'footers', 'ft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profilen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $pro            = Profil::where('nprofil', 'like', '%profil%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $pro1           = Profil::where('nprofil', 'like', '%kebijakan mutu%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $pro2           = Profil::where('nprofil', 'like', '%langkah strategis%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $pro3           = Profil::where('nprofil', 'like', '%Visi LAM-PTKes%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $pro4           = Profil::where('nprofil', 'like', '%Misi LAM-PTKes%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $pro5           = Profil::where('nprofil', 'like', '%Tujuan LAM-PTKes%')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();


        return view('awal.profil.profilen', compact('beritas', 'agendas', 'tentangs', 'pro', 'pro1', 'pro2', 'pro3', 'pro4', 'pro5', 'footers', 'ft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function tnewslet()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Simak')->first();
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

        $manual         = Unduhan::where([
            ['katunduhan_id', $kundh->id],
            ['katbahasa_id', $kbhs->id],

        ])
            ->orderby('judul')
            ->get();

        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $bulan  = [
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
        $ganti  = [
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
            'awal.organisasi.newsletter',
            compact('tentangs', 'beritas', 'footers', 'ft', 'agendas', 'bulan', 'ganti', 'manual')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function torgan()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();
        $torgans        = Organisasi::where('norgan', '=', 'badan hukum')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org            = Organisasi::where('norgan', '=', 'latar belakang')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org1           = Organisasi::where('norgan', '=', 'dasar pemikiran')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org2           = Organisasi::where('norgan', '=', 'kemitraan')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org3           = Organisasi::where('norgan', '=', 'tujuan akreditasi')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org4           = Organisasi::where('norgan', '=', 'struktur organisasi')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();

        return view(
            'awal.organisasi.organisasi',
            compact(
                'tentangs',
                'torgans',
                'org',
                'beritas',
                'agendas',
                'footers',
                'ft',
                'org1',
                'org2',
                'org3',
                'org4'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function tglosa()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();
        $torgans        = Organisasi::where('norgan', '=', 'badan hukum')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org            = Organisasi::where('norgan', '=', 'latar belakang')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org1           = Organisasi::where('norgan', '=', 'dasar pemikiran')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org2           = Organisasi::where('norgan', '=', 'kemitraan')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org3           = Organisasi::where('norgan', '=', 'tujuan akreditasi')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org4           = Organisasi::where('norgan', '=', 'struktur organisasi')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();

        return view(
            'awal.organisasi.glosarium',
            compact(
                'tentangs',
                'torgans',
                'org',
                'beritas',
                'agendas',
                'footers',
                'ft',
                'org1',
                'org2',
                'org3',
                'org4'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function tbiaya()
    {

        $kbhs     = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt     = KatBerita::where('namakbrt', 'Berita')->first();
        $kbrt1    = KatBerita::where('namakbrt', 'Biaya Akreditasi')->first();
        $ft       = Footer::where('njudul', '=', 'navigasi')->get();
        $footers  = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->limit(3)
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
        $biaya = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt1->id],
            ['is_show', '1'],
            ['judul', 'Biaya Akreditasi'],
        ])
            ->limit(1)
            ->latest()
            ->get();
        // return $biaya;
        return view('awal.akreditasi.biayakred', compact('tentangs', 'beritas', 'footers', 'ft', 'agendas', 'biaya'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function tbalikin()
    {

        $kbhs     = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt     = KatBerita::where('namakbrt', 'Berita')->first();
        $kbrt1    = KatBerita::where('namakbrt', 'Biaya Akreditasi')->first();
        $ft       = Footer::where('njudul', '=', 'navigasi')->get();
        $footers  = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->limit(3)
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
        $biaya = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt1->id],
            ['is_show', '1'],
            ['judul', 'Tata Cara Pengembalian Dana'],
        ])
            ->limit(1)
            ->latest()
            ->get();

        return view('awal.akreditasi.tpengembalian', compact('tentangs', 'beritas', 'footers', 'ft', 'agendas', 'biaya'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function tpabut()
    {

        $kbhs     = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt     = KatBerita::where('namakbrt', 'Berita')->first();
        $kbrt1    = KatBerita::where('namakbrt', 'Biaya Akreditasi')->first();
        $ft       = Footer::where('njudul', '=', 'navigasi')->get();
        $footers  = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)
            ->limit(3)
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

        $kudh  = KatUnduhan::where('namaundh', 'Pajak')->limit(1)->get();
        $udh   = Unduhan::where([['katunduhan_id', collect($kudh)->pluck('id')], ['katbahasa_id', $kbhs->id]])->limit(1)->latest()->get();
        $biaya = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt1->id],
            ['is_show', '1'],
            ['judul', 'Pajak & Bukti Potong'],
        ])
            ->limit(1)
            ->latest()
            ->get();

        // return collect($udh)->pluck('nama_file');
        return view('awal.akreditasi.tpajakbupot', compact('tentangs', 'beritas', 'footers', 'ft', 'agendas', 'udh', 'biaya'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function tdokakred()
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
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.akreditasi.tdokpersyaratan',
            compact('tentangs', 'beritas', 'footers', 'ft', 'agendas')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function torganen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $organs        = Organisasi::where('katbahasa_id', $kbhs->id)
            ->orderby('created_at', 'asc')
            ->get();

        $orgn           = Organisasi::where([
            ['katbahasa_id', $kbhs->id],
            ['norgan', 'Legal Entity'],
        ])
            ->orderby('created_at', 'asc')
            ->first();

        return view(
            'awal.organisasi.organisasien',
            compact(
                'tentangs',
                'organs',
                'orgn',
                'beritas',
                'agendas',
                'footers',
                'ft'
            )
        );

        // return $organs;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function tcmpny()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)->limit(1)->latest()->get();
        $agendas        = Agenda::where('katbahasa_id', $kbhs->id)->limit(3)->latest()->get();
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();
        $torgans        = Organisasi::where('norgan', '=', 'badan hukum')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org            = Organisasi::where('norgan', '=', 'latar belakang')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org1           = Organisasi::where('norgan', '=', 'dasar pemikiran')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org2           = Organisasi::where('norgan', '=', 'kemitraan')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org3           = Organisasi::where('norgan', '=', 'tujuan akreditasi')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();
        $org4           = Organisasi::where('norgan', '=', 'struktur organisasi')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->get();

        return view(
            'awal.organisasi.companyprofile',
            compact(
                'tentangs',
                'torgans',
                'org',
                'beritas',
                'agendas',
                'footers',
                'ft',
                'org1',
                'org2',
                'org3',
                'org4'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function tberita()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $bn             = KatBerita::where('namakbrt', 'Breaking News')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $agendas        = Agenda::orderby('id', 'DESC')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(3)
            ->get();

        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['is_show', '1'],
        ])
            ->whereIn('katberita_id', [$kbrt->id, $bn->id])
            ->latest()
            ->paginate(4);
        // ->get();

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();


        // return $beritas;
        return view(
            'awal.berita.tberita',
            compact('agendas', 'tentangs', 'beritas', 'pengumumans', 'footers', 'ft')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tberitaen()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $bn             = KatBerita::where('namakbrt', 'Breaking News')->first();
        $pgm            = KatBerita::where('namakbrt', 'Pengumuman')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $agendas        = Agenda::orderby('id', 'DESC')
            ->where('katbahasa_id', $kbhs->id)
            ->limit(3)
            ->get();

        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['is_show', '1'],
        ])
            ->whereIn('katberita_id', [$kbrt->id, $bn->id])
            ->latest()
            ->paginate(4);
        // ->get();

        $pengumumans    = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $pgm->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();
        $cari           = [
            'Berita',
            'Pengumuman',
            'Standar',
            'Regulation',
            'Standar Pendidikan Profesi Dokter',
            'Artikel'
        ];
        $ganti          = [
            'News',
            'Announcement',
            'Standard',
            'Doctor Professional Education Standards',
            'Article'
        ];

        // return $beritas;
        return view(
            'awal.berita.tberitaen',
            compact('agendas', 'tentangs', 'beritas', 'pengumumans', 'footers', 'ft', 'cari', 'ganti')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function capaian()
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

        $capaians       = CapaianTahunan::where([
            ['katbahasa_id', $kbhs->id],
        ])
            ->orderby('tahun')
            ->get();
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $bulan  = [
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
        $ganti  = [
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
            'awal.capaian.capaian',
            compact('tentangs', 'beritas', 'footers', 'ft', 'agendas', 'capaians', 'bulan', 'ganti')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function capaianen()
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

        $capaians       = CapaianTahunan::where([
            ['katbahasa_id', $kbhs->id],
        ])
            ->orderby('tahun')
            ->get();
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.capaian.capaianen',
            compact('tentangs', 'beritas', 'footers', 'ft', 'agendas', 'capaians')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unduhan()
    {
        $no             = 1;
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Icon Sosmed')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $unduhans       = Unduhan::where([
            ['katbahasa_id', $kbhs->id],
            ['katunduhan_id', '!=', $kundh->id],
        ])
            ->latest()
            ->get();

        return view(
            'awal.unduhan.unduhan',
            compact('tentangs', 'footers', 'ft', 'unduhans', 'no')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unduhanen()
    {
        $no             = 1;
        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Icon Sosmed')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $unduhans       = Unduhan::where([
            ['katbahasa_id', $kbhs->id],
            ['katunduhan_id', '!=', $kundh->id],
        ])
            ->latest()
            ->get();

        return view(
            'awal.unduhan.unduhanen',
            compact('tentangs', 'footers', 'ft', 'unduhans', 'no')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tfaq()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $faqs           = Faq::where([
            ['pertanyaan', '=', 'Quick LAM-PTKes'],
            ['katbahasa_id', $kbhs->id],
        ])
            ->latest()
            ->get();
        $fq             = Faq::where([
            ['pertanyaan', '=', 'Asked LAM-PTKes'],
            ['katbahasa_id', $kbhs->id],
        ])
            ->latest()
            ->get();


        return view(
            'awal.faq.faq',
            compact('tentangs', 'faqs', 'footers', 'ft', 'fq')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tfaqen()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();
        $faqs           = Faq::where([
            ['pertanyaan', '=', 'Quick LAM-PTKes'],
            ['katbahasa_id', $kbhs->id],
        ])
            ->latest()
            ->get();
        $fq             = Faq::where([
            ['pertanyaan', '=', 'Asked LAM-PTKes'],
            ['katbahasa_id', $kbhs->id],
        ])
            ->latest()
            ->get();


        return view(
            'awal.faq.faqen',
            compact('tentangs', 'faqs', 'footers', 'ft', 'fq')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saran()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();

        return view(
            'awal.saran.saran',
            compact('tentangs', 'footers', 'ft')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saranen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();

        return view(
            'awal.saran.saranen',
            compact('tentangs', 'footers', 'ft')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tsitemap()
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
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        return view(
            'awal.sitemap.sitemap',
            compact('tentangs', 'beritas', 'footers', 'ft', 'agendas')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tsitemapen()
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
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $cari           = [
            'Berita',
            'Pengumuman',
            'Standar',
            'Regulation',
            'Standar Pendidikan Profesi Dokter',
            'Artikel'
        ];
        $ganti          = [
            'News',
            'Announcement',
            'Standard',
            'Doctor Professional Education Standards',
            'Article'
        ];

        return view(
            'awal.sitemap.sitemapen',
            compact('tentangs', 'beritas', 'footers', 'ft', 'agendas', 'cari', 'ganti')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alurakre()
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
        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $alur           = Profil::where([
            ['nprofil', 'Flow of Accreditation Process in IAAHEH for Health Study Program'],
            ['katbahasa_id', $kbhs->id],
        ])
            ->limit(1)
            ->get();

        $cari           = [
            'Berita',
            'Pengumuman',
            'Standar',
            'Regulation',
            'Standar Pendidikan Profesi Dokter',
            'Artikel'
        ];
        $ganti          = [
            'News',
            'Announcement',
            'Standard',
            'Doctor Professional Education Standards',
            'Article'
        ];

        return view(
            'awal.sitemap.alurakre',
            compact('tentangs', 'beritas', 'footers', 'ft', 'agendas', 'cari', 'ganti', 'alur')
        );

        // return $alur;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tmanual()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Simak')->first();
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

        $manual         = Unduhan::where([
            ['katunduhan_id', $kundh->id],
            ['katbahasa_id', $kbhs->id],

        ])
            ->orderby('judul')
            ->get();

        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();

        $bulan  = [
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
        $ganti  = [
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
            'awal.manualsimak.manual',
            compact('tentangs', 'beritas', 'footers', 'ft', 'agendas', 'bulan', 'ganti', 'manual')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tmanualen()
    {

        $kbhs           = KatBahasa::where('namakbhs', 'English')->first();
        $kbrt           = KatBerita::where('namakbrt', 'Berita')->first();
        $kundh          = KatUnduhan::where('namaundh', 'Simak')->first();
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

        $manual         = Unduhan::where([
            ['katunduhan_id', $kundh->id],
            ['katbahasa_id', $kbhs->id],

        ])
            ->orderby('judul')
            ->get();

        $beritas        = Berita::where([
            ['katbahasa_id', $kbhs->id],
            ['katberita_id', $kbrt->id],
            ['is_show', '1'],
        ])
            ->limit(3)
            ->latest()
            ->get();


        return view(
            'awal.manualsimak.manualen',
            compact('tentangs', 'beritas', 'footers', 'ft', 'agendas', 'manual')
        );
    }

    public function rapatanggota()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();

        $katpro = KategoriProfile::where('nama_profile', 'Rapat Anggota')->value('id');
        $profil = ProfilePimpinan::where([['katbahasa_id', $kbhs->id], ['katprofile_id', $katpro]])->orderby('no_urut')->get();


        return view('awal.pimpinan.rapatanggota', compact('tentangs', 'footers', 'ft', 'profil'));
    }

    public function pengawas()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();

        $katpro = KategoriProfile::where('nama_profile', 'Pengawas LAM-PTKes')->value('id');
        $profil = ProfilePimpinan::where([['katbahasa_id', $kbhs->id], ['katprofile_id', $katpro]])->orderby('no_urut')->get();

        return view('awal.pimpinan.pengawas', compact('tentangs', 'footers', 'ft', 'profil'));
    }
    public function pengurus()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();

        $katpro = KategoriProfile::where('nama_profile', 'Pengurus LAM-PTKes')->value('id');
        $profil = ProfilePimpinan::where([['katbahasa_id', $kbhs->id], ['katprofile_id', $katpro]])->orderby('no_urut')->get();

        return view('awal.pimpinan.pengurus', compact('tentangs', 'footers', 'ft', 'profil'));
    }

    public function koordinator()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();

        $katpro = KategoriProfile::where('nama_profile', 'Koordinator LAM-PTKes')->value('id');
        $profil = ProfilePimpinan::where([['katbahasa_id', $kbhs->id], ['katprofile_id', $katpro]])->orderby('no_urut')->get();

        return view('awal.pimpinan.koordinator', compact('tentangs', 'footers', 'ft', 'profil'));
    }

    public function subkoor()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();

        $katpro = KategoriProfile::where('nama_profile', 'Sub Koordinator')->value('id');
        $profil = ProfilePimpinan::where([['katbahasa_id', $kbhs->id], ['katprofile_id', $katpro]])->orderby('no_urut')->get();

        return view('awal.pimpinan.subkoor', compact('tentangs', 'footers', 'ft', 'profil'));
    }

    public function komite()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();

        $katpro = KategoriProfile::where('nama_profile', 'Komite Akreditasi')->value('id');
        $profil = ProfilePimpinan::where([['katbahasa_id', $kbhs->id], ['katprofile_id', $katpro]])->orderby('no_urut')->get();

        return view('awal.pimpinan.komite', compact('tentangs', 'footers', 'ft', 'profil'));
    }

    public function pmi()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();

        $katpro = KategoriProfile::where('nama_profile', 'Penjamin Mutu Internal')->value('id');
        $profil = ProfilePimpinan::where([['katbahasa_id', $kbhs->id], ['katprofile_id', $katpro]])->orderby('no_urut')->get();

        return view('awal.pimpinan.pmi', compact('tentangs', 'footers', 'ft', 'profil'));
    }

    public function direktorat()
    {
        $kbhs           = KatBahasa::where('namakbhs', 'Indonesia')->first();
        $ft             = Footer::where('njudul', '=', 'navigasi')->get();
        $footers        = Footer::where('njudul', '!=', 'navigasi')->limit(5)->get();
        $tentangs       = Kontak::where('katbahasa_id', $kbhs->id)
            ->limit(1)
            ->latest()
            ->get();

        $katpro = KategoriProfile::where('nama_profile', 'Direktorat')->value('id');
        $profil = ProfilePimpinan::where([['katbahasa_id', $kbhs->id], ['katprofile_id', $katpro]])->orderby('no_urut')->get();

        return view('awal.pimpinan.direktorat', compact('tentangs', 'footers', 'ft', 'profil'));
    }
}
