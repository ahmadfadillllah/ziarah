<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeziarahHasJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peziarah_has_jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peziarah_id');
            $table->foreignId('tanggal_id');
            $table->foreignId('waktu_id');

            $table->foreign('peziarah_id')->references('id')->on('peziarah')->cascadeOnDelete();
            $table->foreign('tanggal_id')->references('id')->on('tanggal_ziarah')->cascadeOnDelete();
            $table->foreign('waktu_id')->references('id')->on('waktu_ziarah')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peziarah_has_jadwal');
    }
}
