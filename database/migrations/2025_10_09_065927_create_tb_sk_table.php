<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sk', function (Blueprint $table) {
            $table->id();
            $table->string('no_sk', 225);
            $table->integer('tahun');
            $table->date('tgl_sk');
            $table->string('tentang', 225);
            $table->string('dokumen', 1000)->nullable();
            $table->string('konsep_sk', 1000)->nullable();
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
        Schema::dropIfExists('tb_sk');
    }
}
