<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrientasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orientasis', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('katbahasa_id');
            $table->string('norientasi');
            $table->longtext('deskripsi');
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
        Schema::dropIfExists('orientasis');
    }
}
