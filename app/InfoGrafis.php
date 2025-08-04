<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoGrafis extends Model
{
	public $incrementing = false;
	protected $table     = 'info_grafis';
	protected $fillable  = ['id','katbahasa_id','judul','publikasi','gambar','deskripsi','views'];

	public function katbahasa(){

		return $this->belongsTo(KatBahasa::class);
	}
}
