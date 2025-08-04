<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();;
            $table->string('nama');
            $table->string('email');
            $table->string('tlp');
            $table->enum('status',['Baru','Balas']);
            $table->longtext('saran');
            $table->longtext('keluhan');
            $table->text('alamat');
            $table->text('institusi');
            $table->longtext('balasan')->nullable();
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
        Schema::dropIfExists('pesans');
    }
}
