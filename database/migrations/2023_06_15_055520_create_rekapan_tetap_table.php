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
        Schema::create('rekapan_tetap', function (Blueprint $table) {
            $table->integer('id_rekap')->primary();
            $table->string('id_matkul', 11)->index('id_matkul_rekaptetap');
            $table->date('tanggal_rekapan_dibuat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekapan_tetap');
    }
};
