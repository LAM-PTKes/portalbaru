<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rencana extends Model
{
    public $incrementing = false;
    protected $table = 'rencanas';
    protected $fillable = ['id','katbahasa_id','nrencana', 'deskripsi'];

    public function katbahasa(){

    	return $this->belongsTo(KatBahasa::class);
    }
}
