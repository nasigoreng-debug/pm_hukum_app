<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPinjamBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pinjam_berkas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam', 255);
            $table->string('no_banding', 255);
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali')->nullable();
            $table->string('bkt_pinjam', 1000)->nullable();
            $table->string('bkt_kembali', 1000)->nullable();
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
        Schema::dropIfExists('tb_pinjam_berkas');
    }
}
