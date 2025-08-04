<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoverPhoto extends Model
{
    public $incrementing = false;
	protected $table = 'cover_photos';
    protected $fillable = ['id','katbahasa_id','nama_cover_id','nama_cover_en','deskripsi', 'nfile'];
	
    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
