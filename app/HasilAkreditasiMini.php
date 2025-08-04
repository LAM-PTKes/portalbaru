<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilAkreditasiMini extends Model
{
  public $incrementing = false;
  protected $table = 'sk_prodi_barus';
  protected $fillable = ['id','kode_pt','nama_pt','kode_ps', 'nama_ps','jenjang','no_sk','peringkat','tgl_kadaluarsa','tgl_sk','thn_sk','status_kadaluarsa','rumpun_ilmu','sidang','id_sms','sk_akreditasi_id','is_show'];
}
