<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilePimpinan extends Model
{

    public $incrementing = false;
    protected $table     = 'profile_pimpinans';
    protected $fillable  = ['id', 'katbahasa_id', 'katprofile_id', 'jabatan_id', 'nama', 'no_urut', 'img'];

    public function katbahasa()
    {
        return $this->belongsTo(KatBahasa::class, 'katbahasa_id');
    }
    public function katprofile()
    {
        return $this->belongsTo(KategoriProfile::class, 'katprofile_id');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
}
