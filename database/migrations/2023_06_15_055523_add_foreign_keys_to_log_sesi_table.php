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
        Schema::table('log_sesi', function (Blueprint $table) {
            $table->foreign(['id_matkul'], 'nomor_matkul')->references(['id_matkul'])->on('jadwal')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_sesi', function (Blueprint $table) {
            $table->dropForeign('nomor_matkul');
        });
    }
};
