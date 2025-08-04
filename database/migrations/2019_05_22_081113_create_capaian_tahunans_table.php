<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapaianTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capaian_tahunans', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('katbahasa_id');
            $table->string('judul');
            $table->date('tahun')->nullable();
            $table->text('nama_file');
            $table->timestamps();

         $table->foreign('katbahasa_id')
                ->references('id')
                ->on('kat_bahasas')
                ->onDelete('cascade')
                ->onUpdate('cascade');        
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capaian_tahunans');
    }
}
