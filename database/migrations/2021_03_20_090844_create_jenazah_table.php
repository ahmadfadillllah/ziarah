<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenazahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenazah', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 200);
            $table->string('alamat', 200)->nullable();
            $table->string('blok')->nullable();
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
        Schema::dropIfExists('jenazah');
    }
}
