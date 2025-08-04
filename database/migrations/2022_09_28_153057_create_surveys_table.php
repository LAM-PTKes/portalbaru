<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('katbahasa_id');
            $table->text('judul')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('metode')->nullable();
            $table->string('responden')->nullable();
            $table->date('waktu_pelaksanaan')->nullable();
            $table->date('tgl_tutup')->nullable();
            $table->text('link')->nullable();
            $table->enum('publikasi',['Ya','Tidak'])->nullable();
            $table->bigInteger('views')->nullable();
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
        Schema::dropIfExists('surveys');
    }
}
