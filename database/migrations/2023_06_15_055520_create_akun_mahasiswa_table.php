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
        Schema::create('akun_mahasiswa', function (Blueprint $table) {
            $table->integer('id_akun')->primary();
            $table->integer('nim')->index('nim_akunmhs');
            $table->string('email');
            $table->string('username', 35);
            $table->integer('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akun_mahasiswa');
    }
};
