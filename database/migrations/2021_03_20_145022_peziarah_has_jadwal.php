<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeziarahHasJadwal extends Migration
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
            $table->foreignId('jadwal_id');

            $table->foreign('peziarah_id')->on('peziarah')->references('id')->cascadeOnDelete();
            $table->foreign('jadwal_id')->on('jadwal')->references('id')->cascadeOnDelete();

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
        //
    }
}
