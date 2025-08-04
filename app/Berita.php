<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    public $incrementing = false;
    protected $table = 'beritas';
    protected $fillable = ['id','katberita_id', 'katbahasa_id', 'judul', 'file_gambar','isi', 'headline_news','populer','is_show','kat_regulasi'];
	
	public function katberita(){

    	return $this->belongsTo(KatBerita::class);
    }
    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
