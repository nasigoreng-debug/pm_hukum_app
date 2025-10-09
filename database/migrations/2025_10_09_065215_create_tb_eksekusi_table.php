<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbEksekusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_eksekusi', function (Blueprint $table) {
            $table->id();
            $table->string('satker', 225);
            $table->string('no_eksekusi', 225);
            $table->string('no_put', 225);
            $table->string('tgl_permohonan', 225);
            $table->string('proses_terakhir', 225)->nullable();
            $table->date('tgl_eks')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->string('keterangan', 2000)->nullable();
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
        Schema::dropIfExists('tb_eksekusi');
    }
}
