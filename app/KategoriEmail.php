<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriEmail extends Model
{
	public $incrementing = false;
	protected $table     = 'kategori_emails';
	protected $fillable  = ['id','nama_kat'];
}
