<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('katbahasa_id')->nullable();
            $table->string('nama_profile')->nullable();
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
        Schema::dropIfExists('kategori_profiles');
    }
}
