<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risets', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('katbahasa_id');
            $table->string('judul_riset')->nullable();
            $table->string('pengarang_riset')->nullable();
            $table->longtext('ringkasan_hasil_riset')->nullable();
            $table->enum('publikasi',['Ya','Tidak'])->nullable();
            $table->string('file_riset')->nullable();
            $table->string('gambar_riset')->nullable();
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
        Schema::dropIfExists('risets');
    }
}
