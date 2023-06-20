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
        Schema::table('akun_mahasiswa', function (Blueprint $table) {
            $table->foreign(['nim'], 'nim_akunmhs')->references(['nim'])->on('mahasiswa')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('akun_mahasiswa', function (Blueprint $table) {
            $table->dropForeign('nim_akunmhs');
        });
    }
};
