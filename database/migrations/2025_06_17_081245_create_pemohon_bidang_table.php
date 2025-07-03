<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemohon_bidang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bidang');
            $table->unsignedBigInteger('id_pemohon');
            
            $table->primary(['id_bidang', 'id_pemohon']);
            $table->foreign('id_bidang')
                  ->references('id_bidang')
                  ->on('bidang_kerjasama')
                  ->onDelete('cascade');
            $table->foreign('id_pemohon')
                  ->references('id_pemohon')
                  ->on('pemohon')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemohon_bidang');
    }
};