<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilePimpinansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_pimpinans', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('katbahasa_id')->nullable();
            $table->uuid('katprofile_id')->nullable();
            $table->uuid('jabatan_id')->nullable();
            $table->string('nama')->nullable();
            $table->text('photo')->nullable();
            $table->integer('no_urut')->nullable();
            $table->timestamps();

            $table->foreign('katbahasa_id')
                ->references('id')
                ->on('kat_bahasas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('katprofile_id')
                ->references('id')
                ->on('kategori_profiles')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('jabatan_id')
                ->references('id')
                ->on('jabatans')
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
        Schema::dropIfExists('profile_pimpinans');
    }
}
