<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilAkreditasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_akreditasis', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('kode_pt')->nullable();
            $table->string('nama_pt')->nullable();
            $table->string('kode_ps')->nullable();
            $table->string('nama_ps')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('wil')->nullable();
            $table->string('no_sk')->nullable();
            $table->string('peringkat_akademis')->nullable();
            $table->string('peringkat_profesi')->nullable();
            $table->string('peringkat_spesialis')->nullable();
            $table->date('tgl_kadaluarsa')->nullable();
            $table->date('tgl_sk')->nullable();
            $table->string('thn_sk')->nullable();
            $table->string('status_kadaluarsa')->nullable();
            $table->string('rumpun_ilmu')->nullable();
            $table->enum('is_show',['0','1']);
            $table->double('sidang')->nullable();
            $table->string('id_sms')->nullable();
            $table->string('sk_akreditasi_id')->nullable();
            $table->integer('id_lawas')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_akreditasis');
    }
}
