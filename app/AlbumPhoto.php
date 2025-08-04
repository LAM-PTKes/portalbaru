<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumPhoto extends Model
{
    public $incrementing = false;
    protected $table = 'album_photos';
    protected $fillable = ['id','katbahasa_id', 'cover_id', 'nphoto', 'thn_albump','nama_file'];
	
    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }

    public function cover(){

    	return $this->belongsTo(CoverPhoto::class);
    }
}
