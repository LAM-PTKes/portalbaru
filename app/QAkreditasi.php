<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QAkreditasi extends Model
{
    public $incrementing = false;
    protected $table = 'q_akreditasis';
    protected $fillable = ['id','katbahasa_id', 'nqakre', 'deskripsi'];
	
    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
