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
        Schema::create('absensi', function (Blueprint $table) {
            $table->integer('id_absensi', true);
            $table->integer('id_akunmhs')->index('akunmhs');
            $table->enum('status_kehadiran', ['Hadir', 'Izin', 'Sakit', 'Dispen']);
            $table->time('jam_masuk', 6);
            $table->string('id_jadwal', 11)->index('id_matkul');
            $table->integer('id_sesi')->index('sesiabsen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
};
