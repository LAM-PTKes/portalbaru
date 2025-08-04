<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkProdiBarusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_prodi_barus', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('kode_pt')->nullable();
            $table->string('nama_pt')->nullable();
            $table->string('kode_ps')->nullable();
            $table->string('nama_ps')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('no_sk')->nullable();
            $table->string('peringkat')->nullable();
            $table->date('tgl_kadaluarsa')->nullable();
            $table->date('tgl_sk')->nullable();
            $table->string('thn_sk')->nullable();
            $table->string('status_kadaluarsa')->nullable();
            $table->string('rumpun_ilmu')->nullable();
            $table->double('sidang')->nullable();
            $table->string('id_sms')->nullable();
            $table->string('sk_akreditasi_id')->nullable();
            $table->enum('is_show',['0','1']);
            $table->enum('kategori',['PTN-BH','NON PTN-BH']);
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
        Schema::dropIfExists('sk_prodi_barus');
    }
}
