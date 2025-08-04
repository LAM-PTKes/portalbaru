<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
	public $incrementing = false;
	protected $table     = 'newsletters';
	protected $fillable  = ['id','katbahasa_id','judul','publikasi','gambar','deskripsi','views'];

	public function katbahasa(){

		return $this->belongsTo(KatBahasa::class);
	}
}
