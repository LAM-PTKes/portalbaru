<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renstra extends Model
{
	public $incrementing = false;
	protected $table     = 'renstras';
	protected $fillable  = ['id','katbahasa_id','judul','deskripsi', 'nfile','publikasi'];

	public function katbahasa(){

		return $this->belongsTo(KatBahasa::class);
	}
}
