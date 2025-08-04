<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unduhan extends Model
{

    public $incrementing = false;
    protected $table = 'unduhans';
    protected $fillable = ['id', 'katbahasa_id', 'katunduhan_id', 'judul', 'deskripsi', 'nama_file', 'jenjang', 'bidang_ilmu', 'pengguna_instrumen'];

    public function katunduhan()
    {

        return $this->belongsTo(KatUnduhan::class);
    }
    public function katbahasa()
    {

        return $this->belongsTo(KatBahasa::class);
    }
}
