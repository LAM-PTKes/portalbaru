<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilAkreditasi extends Model
{
    public $incrementing = false;
    protected $table = 'hasil_akreditasis';
    protected $fillable = ['id','kode_pt','nama_pt','kode_ps', 'nama_ps','jenjang','wil','no_sk','peringkat_akademis','peringkat_profesi','peringkat_spesialis','tgl_kadaluarsa','thn_sk','status_kadaluarsa','rumpun_ilmu','is_show','sidang','id_sms','sk_akreditasi_id','id_lawas','tgl_sk'];
}
