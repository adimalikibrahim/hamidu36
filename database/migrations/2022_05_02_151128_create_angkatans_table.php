<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngkatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angkatans', function (Blueprint $table) {
            $table->uuid('id_angkatan')->primary();
            $table->string('angkatan');
            $table->string('nama_angkatan')->nullable();
            $table->string('ketua_ang')->nullable();
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
        Schema::dropIfExists('angkatans');
    }
}
