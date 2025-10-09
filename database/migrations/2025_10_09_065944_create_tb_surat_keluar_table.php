<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSuratKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat', 255);
            $table->date('tgl_surat');
            $table->string('tujuan_surat', 100);
            $table->string('perihal', 1000);
            $table->string('surat_pta', 1000)->nullable();
            $table->string('konsep_surat', 1000)->nullable();
            $table->string('lampiran', 1000)->nullable();
            $table->string('keterangan', 100)->nullable();
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
        Schema::dropIfExists('tb_surat_keluar');
    }
}
