<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRegPkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_reg_pk', function (Blueprint $table) {
            $table->id();
            $table->string('pa_pengaju', 255);
            $table->date('tgl_masuk');
            $table->date('tgl_register');
            $table->string('no_pk', 255);
            $table->string('no_banding', 255);
            $table->date('tgl_put_banding')->nullable();
            $table->string('no_pa', 255);
            $table->date('tgl_put_pa')->nullable();
            $table->string('pemohon_pk', 255);
            $table->string('termohon_pk', 255);
            $table->date('tgl_put_pk')->nullable();
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
        Schema::dropIfExists('tb_reg_pk');
    }
}
