<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeziarahTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peziarah', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 200);
            $table->string('jenis_kelamin')->nullable();
            $table->string('email', 200)->nullable();
            $table->string('no_hp', 200)->nullable();
            $table->string('peziarah_token', 250)->unique();
            $table->foreignId('jenazah_id');
            $table->foreign('jenazah_id')->on('jenazah')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('peziarah');
    }


    // ...
}
