<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orientasi extends Model
{
    public $incrementing = false;
    protected $table = 'orientasis';
    protected $fillable = ['id','katbahasa_id', 'norientasi', 'deskripsi'];
	
    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
