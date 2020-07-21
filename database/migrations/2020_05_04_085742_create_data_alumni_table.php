<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_alumni', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('ttl');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('alamat_asal');
            $table->string('asal_sekolah');
            $table->string('alamat_bengkulu');
            $table->string('status_tinggal');
            $table->string('asal_kampus');
            $table->string('jurusan');
            $table->integer('angkatan');
            $table->integer('no_hp');
            $table->string('media_sosial');
            $table->string('email');
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
        Schema::dropIfExists('data_alumni');
    }
}
