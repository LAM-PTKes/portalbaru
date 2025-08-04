<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('katbahasa_id');
            $table->uuid('katberita_id');
            $table->string('judul')->nullable();
            $table->longtext('isi')->nullable();
            $table->string('file_gambar')->nullable();
            $table->enum('headline_news',['Ya','Tidak']);
            $table->integer('populer')->nullable();
            $table->string('kat_regulasi')->nullable();
            $table->enum('is_show',['0','1']);
            $table->timestamps();

            $table->foreign('katbahasa_id')
                    ->references('id')
                    ->on('kat_bahasas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('katberita_id')
                    ->references('id')
                    ->on('kat_beritas')
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
        Schema::dropIfExists('beritas');
    }
}
