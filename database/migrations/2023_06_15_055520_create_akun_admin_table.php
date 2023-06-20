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
        Schema::create('akun_admin', function (Blueprint $table) {
            $table->integer('id_admin')->primary();
            $table->integer('nim')->index('nim');
            $table->string('nama', 30);
            $table->string('email', 30);
            $table->string('password');
            $table->string('last_login')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akun_admin');
    }
};
