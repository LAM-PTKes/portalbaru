<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontaks', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('katbahasa_id');
            $table->string('ntentang')->nullable();
            $table->string('tlp')->nullable();
            $table->string('ponsel')->nullable();
            $table->string('kantor')->nullable();
            $table->string('email')->nullable();
            $table->string('jam_kerja')->nullable();
            $table->text('link')->nullable();
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('kontaks');
    }
}
