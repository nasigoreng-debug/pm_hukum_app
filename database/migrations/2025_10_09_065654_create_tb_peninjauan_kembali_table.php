<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPeninjauanKembaliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_peninjauan_kembali', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_masuk');
            $table->string('no_banding', 225);
            $table->string('no_pk', 225);
            $table->string('status_put', 225)->nullable();
            $table->string('salput_pk', 1000)->nullable();
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
        Schema::dropIfExists('tb_peninjauan_kembali');
    }
}
