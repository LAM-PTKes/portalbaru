<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riset extends Model
{
	public $incrementing = false;
	protected $table     = 'risets';
	protected $fillable  = ['id','katbahasa_id','judul_riset', 'pengarang_riset','ringkasan_hasil_riset','file_riset','gambar_riset','publikasi','views'];

	public function katbahasa(){

		return $this->belongsTo(KatBahasa::class);
	}
}
