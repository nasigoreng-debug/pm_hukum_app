<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_masuk_pan');
            $table->date('tgl_masuk_umum');
            $table->smallInteger('no_indeks');
            $table->text('asal_surat');
            $table->string('no_surat', 100);
            $table->date('tgl_surat');
            $table->string('perihal', 1000);
            $table->string('lampiran', 1000)->nullable();
            $table->string('disposisi', 225)->nullable();
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
        Schema::dropIfExists('tb_surat_masuk');
    }
}
