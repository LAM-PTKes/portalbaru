<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{

	public $incrementing = false;
	protected $table     = 'jurnals';
	protected $fillable  = ['id','katbahasa_id','nama_penulis', 'judul_jurnal','kata_kunci','abstrak','file_jurnal','views','publikasi'];

	public function katbahasa(){

		return $this->belongsTo(KatBahasa::class);
	}

}
