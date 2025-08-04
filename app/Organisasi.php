<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    public $incrementing = false;
    protected $table = 'organisasis';
    protected $fillable = ['id','katbahasa_id', 'norgan', 'deskripsi'];
	
    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
