<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KatBerita extends Model
{
    public $incrementing = false;
    protected $table = 'kat_beritas';
    protected $fillable = ['id','namakbrt', 'keterangan'];

    
}
