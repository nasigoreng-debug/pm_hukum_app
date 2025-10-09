<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPbtBandingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pbt_banding', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_masuk');
            $table->string('no_banding', 255);
            $table->string('no_pa', 255);
            $table->date('tgl_pbt_p')->nullable();
            $table->date('tgl_pbt_t')->nullable();
            $table->string('pbt_put', 1000)->nullable();
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
        Schema::dropIfExists('tb_pbt_banding');
    }
}
