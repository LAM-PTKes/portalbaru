<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public $incrementing = false;
    protected $table = 'faqs';
    protected $fillable = ['id','katbahasa_id', 'nfaq', 'deskripsi', 'pertanyaan'];
	
    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
