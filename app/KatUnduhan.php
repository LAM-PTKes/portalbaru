<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KatUnduhan extends Model
{
    public $incrementing = false;
	protected $table = 'kat_unduhans';
    protected $fillable = ['id','namaundh', 'keterangan'];

}
