<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use EmailChecker;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no     = 1;
        $users  = User::where('role', '!=','Ngadimin')->orderby('name')->get();

        return view('admin.user.user', compact('no','users'));
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
        $id     = str_replace('-', '', Str::uuid());
        $cek    = User::where('email',request('email'))->get();
        $str    = strlen(request('password'));
        $cekid  = User::where('id', $id)->get();

        if(count($cekid) == 0){
            if (count($cek) == 0) {
                if ($str >= 6) {

                    $asup   = User::create([
                                'id'                => $id,
                                'name'              => request('nama_lengkap'),
                                'email'             => request('email'),
                                'role'              => request('role'),
                                'email_verified_at' => date('Y-m-d H:i:s'),
                                'password'          => Hash::make(request('password'))
                            ]);

                    return redirect()->route('user')->withasup('Data Berhasil Di Simpan Ke Database')->withSuccess('Successfully... Save To Database');
                    
                }else {

                    return back()->withsalah('Data Gagal Di Simpan Ke Database Password Kurang Dari 6 Karakter')->witherror('Failled... Save To Database Password Min 6 Character');
                }

            }else {
                
                return back()->withsalah('Data Gagal Di Simpan Ke Database Email Sudah Digunakan User lain')->witherror('Failled... Save To Database Email Already Used');

            }

        }else {

            return back()->withsalah('Data Gagal Di Simpan Ke Database Id Sudah Digunakan User lain')->witherror('Failled... Save To Database Id Already Used');

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
    public function edit(User $user)
    {

        return view('admin.user.euser',compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        
        $cek    = User::where('email',request('email'))->get();
        $str    = strlen(request('password'));
        // $valid  = EmailChecker::check(request('email')); 

        // if ($valid == true) {
            
            if (empty(request('password')) && count($cek) == 1 && $cek->first()->id == $user->id) {

                    $user->update([
                                'name'                  => request('nama_lengkap'),
                                'email'                 => request('email'),
                                'email_verified_at'     => date('Y-m-d H:i:s'),
                                'role'                  => request('role')
                            ]);


                    return redirect()->route('user')->withasup('Data Berhasil Di Update')->withSuccess('Successfully... Update Database');


                }elseif (!empty(request('password')) && count($cek) == 1 && $cek->first()->id == $user->id) {
                    if ($str >= 6) {
                       
                        $user->update([
                                    'name'                  => request('nama_lengkap'),
                                    'email'                 => request('email'),
                                    'role'                  => request('role'),
                                    'email_verified_at'     => date('Y-m-d H:i:s'),
                                    'password'              => Hash::make(request('password'))
                                ]);


                        return redirect()->route('user')->withasup('Data Berhasil Di Update')->withSuccess('Successfully... Update Database');


                    }else {
                        
                        return back()->withsalah('Data Gagal Di Simpan Ke Database Password Kurang Dari 6 Karakter')->witherror('Failled... Save To Database Password Min 6 Character');
                    }
                    
                }elseif (empty(request('password')) && count($cek) == 0) {
                    
                    $user->update([
                                'name'                  => request('nama_lengkap'),
                                'email'                 => request('email'),
                                'email_verified_at'     => date('Y-m-d H:i:s'),
                                'role'                  => request('role')
                            ]);


                    return redirect()->route('user')->withasup('Data Berhasil Di Update')->withSuccess('Successfully... Update Database');

                    

                }elseif (!empty(request('password')) && count($cek) == 0) {
                    
                    if ($str >= 6) {
                       
                        $user->update([
                                    'name'                  => request('nama_lengkap'),
                                    'email'                 => request('email'),
                                    'role'                  => request('role'),
                                    'email_verified_at'     => date('Y-m-d H:i:s'),
                                    'password'              => Hash::make(request('password'))
                                ]);


                        return redirect()->route('user')->withasup('Data Berhasil Di Update')->withSuccess('Successfully... Update Database');

                        

                    }else {
                        
                        return back()->withsalah('Data Gagal Di Simpan Ke Database Password Kurang Dari 6 Karakter')->witherror('Failled... Save To Database Password Min 6 Character');
                    }

                }elseif (count($cek) == 1 && $cek->first()->id != $user->id) {
                    
                    return back()->withsalah('Data Gagal Di Simpan Ke Database Email Sudah Digunakan User lain')->witherror('Failled... Save To Database Email Already Used');
                }

        // }else {
            

        //     return back()->withsalah('Data Gagal Di Simpan Ke Database Email Tidak Valid')->witherror('Failled... Save To Database Email Not Valid');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->withhapus('Data Berhasil Di Hapus')->withdelete('Successfully... Delete Database');
    }
}
