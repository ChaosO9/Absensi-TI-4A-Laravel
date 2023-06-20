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
        Schema::create('rekapan_sementara', function (Blueprint $table) {
            $table->integer('id_rekap', true);
            $table->string('id_matkul', 11)->index('idmatkulrekapan');
            $table->date('tanggal_rekapan_dibuat')->useCurrent();
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekapan_sementara');
    }
};
