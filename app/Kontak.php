<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    public $incrementing = false;
    protected $table = 'kontaks';
    protected $fillable = ['id','katbahasa_id', 'ntentang', 'kantor', 'ponsel', 'tlp', 'email', 'jam_kerja', 'link', 'alamat'];
	
    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
