<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_sesi', function (Blueprint $table) {
            $table->integer('id_sesi', true);
            $table->dateTime('tanggal_sesi');
            $table->string('id_matkul', 11)->index('nomor_matkul');
            $table->string('kode', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_sesi');
    }
};
