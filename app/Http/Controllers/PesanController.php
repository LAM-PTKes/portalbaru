<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Tintnaingwin\EmailChecker\Facades\EmailChecker;
use Mail;
use App\Pesan;


class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no     = 1;
        $pesan  = Pesan::latest()->get();

        return view('admin.pesan.pesan', compact('no','pesan'));

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
        $cekmail    = EmailChecker::check(request('email'));
        $id         = str_replace('-', '', Str::uuid());
        $cekid      = Pesan::where('id', $id)->get();

        if ($cekmail == true) {

            if (count($cekid) == 0) {

                $asup   = Pesan::create([
                            'id'                => $id,
                            'nama'              => request('nama'),
                            'email'             => request('email'),
                            'tlp'               => request('tlp'),
                            'keluhan'           => request('keluhan'),
                            'saran'             => request('saran'),
                            'alamat'            => request('alamat'),
                            'institusi'         => request('institusi'),
                            'status'            => 'Baru'
                        ]);
                
                $data["subject"]    = 'Notifikasi Kirim Saran WebApp Portal LAM-PTKes';
                $data["nama"]       = request('nama');
                $data["email"]      = 'sekretariat@lamptkes.org';

                $tolak          = Mail::send('admin.email.notifsaran', $data, function($message)use($data) {
                                        $message->to($data["email"], $data["nama"])
                                        ->subject($data["subject"]);
                                        });
                
                return back()->withberhasil('Saran Anda Berhasil Dikirim, Terima Kasih '.request('nama'));

            }else {

                 
            return back()->withsaranid('Id Saran Sudah Terpakai');
            
            }

        }else {

            return back()->withgagal('Email Anda Tidak Valid...!!!  Mohon Cek Kembali Email '.request('email'));

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
    public function edit(Pesan $saran)
    {
        
        return view('admin.pesan.balas', compact('saran'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Pesan $saran)
    {
        $saran->update([
                        'status'    => 'Balas',
                        'balasan'   => request('balasan')
                    ]);

        $data["subject"]    = 'Notifikasi Balasan Saran WebApp Portal LAM-PTKes';
        $data["nama"]       = $saran->nama;
        $data["email"]      = $saran->email;
        $data["saran"]      = $saran->saran;
        $data["keluhan"]    = $saran->keluhan;
        $data["balasan"]    = request('balasan');

        $tolak          = Mail::send('admin.email.balasansaran', $data, function($message)use($data) {
                                $message->to($data["email"], $data["nama"], $data["balasan"], $data["saran"], $data["keluhan"])
                                ->subject($data["subject"]);
                                });
        
        return redirect()->route('saran')->withasup('Successfully... Update To Database')->withsuccess('Berhasil... Kirim Balasan Saran Melalui Email');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesan $saran)
    {
        $saran->delete();

        return back()->withhapus('Successfully... Delete From Database')->withdelete('Berhasil... Hapus Data Dari Database');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cekurl()
    {
        
        $url = "https://klinikonline.lamptkes.org/"; 
  
        // Use get_headers() function 
        $headers = @get_headers($url); 
          
        // Use condition to check the existence of URL 
        if($headers && strpos( $headers[0], '200')) { 
            $status = "URL Exist"; 
        } 
        else { 
            $status = "URL Doesn't Exist"; 
        } 
          
        // Display result 
        // dd($headers);
        return $status;
        
    }
}
