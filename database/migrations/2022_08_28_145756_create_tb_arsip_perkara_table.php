<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbArsipPerkaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_arsip_perkara', function (Blueprint $table) {
            $table->id();
            $table->string('no_banding', 60);
            $table->string('no_pa', 100);
            $table->string('jenis_perkara', 100);
            $table->date('tgl_masuk');
            $table->date('tgl_put_banding')->nullable();
            $table->string('penyerah', 100)->nullable();
            $table->string('penerima', 100)->nullable();
            $table->string('no_lemari', 100)->nullable();
            $table->string('no_laci', 100)->nullable();
            $table->string('no_box', 100)->nullable();
            $table->date('tgl_alih_media')->nullable();
            $table->string('putusan', 1000)->nullable();
            $table->string('bundel_b', 1000)->nullable();
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
        Schema::dropIfExists('tb_arsip_perkara');
    }
}
