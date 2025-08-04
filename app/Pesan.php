<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    public $incrementing = false;
    protected $table = 'pesans';
    protected $fillable = ['id','nama','email','tlp','keluhan','saran','alamat','institusi','balasan','status','created_at','updated_at'];
}
