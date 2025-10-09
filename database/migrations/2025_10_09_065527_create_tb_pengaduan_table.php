<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengaduan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_terima_pgd');
            $table->string('no_pgd', 225);
            $table->string('pelapor', 225);
            $table->string('terlapor', 225);
            $table->string('uraian_pgd', 1000);
            $table->string('ditangani_oleh', 225)->nullable();
            $table->date('dis_pm_hk')->nullable();
            $table->date('dis_kpta')->nullable();
            $table->date('dis_wkpta')->nullable();
            $table->date('dis_hatiwasda')->nullable();
            $table->date('tgl_tindak_lanjut')->nullable();
            $table->string('status_pgd', 225)->nullable();
            $table->string('status_berkas', 225)->nullable();
            $table->date('tgl_selesai_pgd')->nullable();
            $table->date('tgl_lhp')->nullable();
            $table->string('surat_pgd', 1000)->nullable();
            $table->string('lampiran', 1000)->nullable();
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
        Schema::dropIfExists('tb_pengaduan');
    }
}
