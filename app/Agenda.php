<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    public $incrementing = false;
    protected $table = 'agendas';
    protected $fillable = ['id','katbahasa_id', 'nagenda', 'penyelenggara', 'lokasi', 'kontak', 'website', 'kota', 'tanggal_kegiatan', 'waktu_kegiatan', 'deskripsi'];
	
    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
