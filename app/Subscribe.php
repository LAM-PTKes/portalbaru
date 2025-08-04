<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    public $incrementing = false;
    protected $table     = 'subscribes';
    protected $fillable  = ['id', 'newsletter_id', 'name', 'email'];

    public function newslett()
    {

        return $this->belongsTo(Newsletter::class);
    }
}
