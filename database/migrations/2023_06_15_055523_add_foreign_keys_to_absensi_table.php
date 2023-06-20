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
        Schema::table('absensi', function (Blueprint $table) {
            $table->foreign(['id_jadwal'], 'id_jadwal')->references(['id_jadwal'])->on('jadwal')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_akunmhs'], 'akunmhs')->references(['id_akun'])->on('akun_mahasiswa')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_sesi'], 'sesiabsen')->references(['id_sesi'])->on('log_sesi')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->dropForeign('id_jadwal');
            $table->dropForeign('akunmhs');
            $table->dropForeign('sesiabsen');
        });
    }
};
