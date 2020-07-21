<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDivisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_divisi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('deskripsi');
            $table->string('namaKetua');
            $table->string('anggota');
            $table->string('proker');
            $table->string('foto');
            $table->softDeletes();
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
        Schema::dropIfExists('data_divisi');
    }
}
