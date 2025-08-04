<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{

    public $incrementing = false;
    protected $table = 'testimonis';
    protected $fillable = ['id','katbahasa_id', 'nama_lengkap','jabatan','deskripsi', 'nfile'];

    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
