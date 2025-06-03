<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kerjasama', function (Blueprint $table) {
            $table->unsignedInteger('id_kerjasama')->autoIncrement();
            $table->string('no_kerjasama', 255);
            $table->unsignedInteger('id_ajuan');
            $table->unsignedInteger('id_pemohon');
            $table->unsignedInteger('id_mitra');
            $table->unsignedInteger('id_bidang');
            $table->unsignedInteger('id_dokumen');
            $table->enum('jenis_kerjasama', ['Memorandum of Understanding (MoU)', 'Memorandum of Agreement (MoA)']);
            $table->timestamps();
            
            $table->foreign('id_ajuan')->references('id_ajuan')->on('ajuan');
            $table->foreign('id_pemohon')->references('id_pemohon')->on('pemohon');
            $table->foreign('id_mitra')->references('id_mitra')->on('mitra');
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang_kerjasama');
            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumen');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kerjasama');
    }
};