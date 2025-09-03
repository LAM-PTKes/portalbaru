<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriProfile extends Model
{

    public $incrementing = false;
    protected $table     = 'kategori_profiles';
    protected $fillable  = ['id', 'katbahasa_id', 'nama_profile'];

    public function katbahasa()
    {

        return $this->belongsTo(KatBahasa::class, 'katbahasa_id');
    }
}
