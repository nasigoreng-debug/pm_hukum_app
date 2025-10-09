<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRegKasasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_reg_kasasi', function (Blueprint $table) {
            $table->id();
            $table->string('pa_pengaju', 255);
            $table->date('tgl_masuk');
            $table->date('tgl_register');
            $table->string('no_kasasi', 255);
            $table->string('no_banding', 255);
            $table->date('tgl_put_banding')->nullable();
            $table->string('no_pa', 255);
            $table->date('tgl_put_pa')->nullable();
            $table->string('pemohon_kasasi', 255);
            $table->string('termohon_kasasi', 255);
            $table->date('tgl_put_kasasi')->nullable();
            $table->string('no_box', 255)->nullable();
            $table->string('keterangan', 255)->nullable();
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
        Schema::dropIfExists('tb_reg_kasasi');
    }
}
