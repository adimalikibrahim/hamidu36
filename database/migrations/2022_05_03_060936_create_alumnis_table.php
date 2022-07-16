<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->uuid('id_alumni')->primary();
            $table->char('nia', 10);
            $table->bigInteger('urut');
            $table->string('nama');
            $table->string('jk');
            $table->string('prov')->nullable();
            $table->string('kab')->nullable();
            $table->string('kec')->nullable();
            $table->string('desa')->nullable();
            $table->string('hp')->nullable();
            $table->string('image')->nullable();
            $table->uuid('id_kordinator')->nullable();
            $table->uuid('id_angkatan')->nullable();
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
        Schema::dropIfExists('alumnis');
    }
}
