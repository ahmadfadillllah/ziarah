<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenazahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenazahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 200);
            $table->string('blok')->nullable();
            $table->string('rumah_sakit')->nullable();
            $table->string('agama')->nullable();
            $table->string('tgl_lahir', 120)->nullable();
            $table->string('tgl_wafat', 120)->nullable();
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
        Schema::dropIfExists('jenazahs');
    }
}
