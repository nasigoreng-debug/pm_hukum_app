<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRetensiArsipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_retensi_arsip', function (Blueprint $table) {
            $table->id();
            $table->string('pa_pengaju', 225);
            $table->string('no_banding', 225);
            $table->string('no_pa', 225);
            $table->string('no_kasasi', 225)->nullable();
            $table->string('no_pk', 225)->nullable();
            $table->string('jenis_perkara', 225);
            $table->string('pembanding', 225);
            $table->string('terbanding', 225);
            $table->date('tgl_put_banding')->nullable();
            $table->string('status_put', 225)->nullable();
            $table->date('tgl_put_pa')->nullable();
            $table->date('tgl_put_kasasi')->nullable();
            $table->date('tgl_put_pk')->nullable();
            $table->string('buku', 255)->nullable();
            $table->string('tingkat', 255)->nullable();
            $table->string('tahun', 255)->nullable();
            $table->string('putusan', 1000)->nullable();
            $table->string('keterangan', 225)->nullable();
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
        Schema::dropIfExists('tb_retensi_arsip');
    }
}
