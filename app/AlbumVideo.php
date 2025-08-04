<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumVideo extends Model
{
    public $incrementing = false;
    protected $table = 'album_videos';
    protected $fillable = ['id','katbahasa_id', 'nvideo','link', 'thn_albumv', 'deskripsi'];
	
    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
