<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{

    public $incrementing = false;
    protected $table     = 'jabatans';
    protected $fillable  = ['id', 'katbahasa_id', 'jabatan'];

    public function katbahasa()
    {

        return $this->belongsTo(KatBahasa::class, 'katbahasa_id');
    }
}
