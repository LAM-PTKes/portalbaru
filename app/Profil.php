<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    public $incrementing = false;
    protected $table = 'profils';
    protected $fillable = ['id','katbahasa_id','nprofil', 'isi_profil'];

    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
