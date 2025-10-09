<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBankPutusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bank_putusan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_reg')->nullable();
            $table->string('no_banding', 255)->unique();
            $table->string('jenis_perkara', 255)->nullable();
            $table->string('pembanding', 255)->nullable();
            $table->string('terbanding', 255)->nullable();
            $table->date('tgl_put_banding')->nullable();
            $table->string('status_putus', 255)->nullable();
            $table->string('put_rtf', 1000)->nullable();
            $table->string('put_anonim', 1000)->nullable();
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
        Schema::dropIfExists('tb_bank_putusan');
    }
}
