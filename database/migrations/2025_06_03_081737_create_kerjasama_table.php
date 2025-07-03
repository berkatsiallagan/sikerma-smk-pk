<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kerjasama', function (Blueprint $table) {
            $table->id('id_kerjasama');
            $table->unsignedBigInteger('id_ajuan'); // Must match ajuan's id type
            $table->unsignedBigInteger('id_pemohon'); // Changed to unsignedBigInteger
            $table->unsignedBigInteger('id_mitra'); // Changed to unsignedBigInteger
            $table->unsignedBigInteger('id_bidang')->nullable(); // Changed to unsignedBigInteger
            $table->unsignedBigInteger('id_dokumen'); // Changed to unsignedBigInteger
            $table->enum('jenis_kerjasama', [
                'Memorandum of Understanding (MoU)', 
                'Memorandum of Agreement (MoA)'
            ]);
            
            // Foreign key constraints
            $table->foreign('id_ajuan')
                  ->references('id_ajuan')
                  ->on('ajuan')
                  ->onDelete('cascade');
                  
            $table->foreign('id_pemohon')
                  ->references('id_pemohon')
                  ->on('pemohon')
                  ->onDelete('cascade');
                  
            $table->foreign('id_mitra')
                  ->references('id_mitra')
                  ->on('mitra')
                  ->onDelete('cascade');
                  
            $table->foreign('id_bidang')
                  ->references('id_bidang')
                  ->on('bidang_kerjasama')
                  ->onDelete('cascade');
                  
            $table->foreign('id_dokumen')
                  ->references('id_dokumen')
                  ->on('dokumen')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('kerjasama');
    }
};