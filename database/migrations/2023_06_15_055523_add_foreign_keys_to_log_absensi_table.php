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
        Schema::table('log_absensi', function (Blueprint $table) {
            $table->foreign(['id_absensi'], 'id_absensi_log')->references(['id_absensi'])->on('absensi')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_absensi', function (Blueprint $table) {
            $table->dropForeign('id_absensi_log');
        });
    }
};
