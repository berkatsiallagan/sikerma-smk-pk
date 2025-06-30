<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kerjasama_bidang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kerjasama');
            $table->unsignedBigInteger('id_bidang');
            
            $table->primary(['id_kerjasama', 'id_bidang']);
            $table->foreign('id_kerjasama')
                  ->references('id_kerjasama')
                  ->on('kerjasama')
                  ->onDelete('cascade');
            $table->foreign('id_bidang')
                  ->references('id_bidang')
                  ->on('bidang_kerjasama')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kerjasama_bidang');
    }
};
