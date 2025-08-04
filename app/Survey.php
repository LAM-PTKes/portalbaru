<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
	public $incrementing = false;
	protected $table     = 'surveys';
	protected $fillable  = ['id','katbahasa_id','judul','tujuan', 'metode','responden','waktu_pelaksanaan','tgl_tutup','link','publikasi','views'];

	public function katbahasa(){

		return $this->belongsTo(KatBahasa::class);
	}
}
