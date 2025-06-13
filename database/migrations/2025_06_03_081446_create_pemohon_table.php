<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemohon', function (Blueprint $table) {
            $table->unsignedInteger('id_pemohon')->autoIncrement();
            $table->string('no_permohonan', 15)->unique();
            $table->string('nama_pemohon', 30);
            $table->unsignedInteger('id_jurusan')->nullable();
            $table->integer('nomor_telp');
            
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemohon');
    }
};