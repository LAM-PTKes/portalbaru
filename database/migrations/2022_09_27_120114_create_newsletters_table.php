<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('katbahasa_id');
            $table->uuid('unduhan_id')->nullable();
            $table->text('judul')->nullable();
            $table->enum('publikasi', ['Ya', 'Tidak'])->nullable();
            $table->longtext('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->bigInteger('views')->nullable();
            $table->timestamps();

            $table->foreign('katbahasa_id')
                ->references('id')
                ->on('kat_bahasas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('unduhan_id')
                ->references('id')
                ->on('unduhans')
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
        Schema::dropIfExists('newsletters');
    }
}