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
        Schema::table('rekapan_tetap', function (Blueprint $table) {
            $table->foreign(['id_matkul'], 'id_matkul_rekaptetap')->references(['id_matkul'])->on('matkul')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rekapan_tetap', function (Blueprint $table) {
            $table->dropForeign('id_matkul_rekaptetap');
        });
    }
};
