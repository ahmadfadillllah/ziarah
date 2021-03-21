<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggalHasWaktuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggal_has_waktu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanggal_id');
            $table->foreignId('waktu_id');
            $table->integer('kuota')->default(0);

            $table->foreign('tanggal_id')->on('tanggal_ziarah')->references('id');
            $table->foreign('waktu_id')->on('waktu_ziarah')->references('id');

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
        Schema::dropIfExists('tanggal_has_waktu');
    }
}
