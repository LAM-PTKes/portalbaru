<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListEmail extends Model
{
	public $incrementing = false;
	protected $table     = 'list_emails';
	protected $fillable  = ['id','katemail_id','nama','email'];

	public function katemail(){

		return $this->belongsTo(KategoriEmail::class);
	}
}
