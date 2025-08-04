<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapaianTahunan extends Model
{
    public $incrementing = false;
    protected $table = 'capaian_tahunans';
    protected $fillable = ['id','katbahasa_id','judul','tahun','nama_file'];

    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
