<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    public $incrementing = false;
    protected $table = 'footers';
    protected $fillable = ['id','katbahasa_id','njudul', 'nlink', 'nfile', 'url'];

    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
