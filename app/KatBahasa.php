<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KatBahasa extends Model
{
    public $incrementing = false;
    protected $table = 'kat_bahasas';
    protected $fillable = ['id','namakbhs', 'keterangan'];
}
