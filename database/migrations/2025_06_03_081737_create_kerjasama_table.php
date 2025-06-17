// database/migrations/2025_06_17_000007_create_kerjasama_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kerjasama', function (Blueprint $table) {
            $table->id('id_kerjasama');
            $table->unsignedInteger('id_ajuan');
            $table->unsignedInteger('id_pemohon');
            $table->unsignedInteger('id_mitra');
            $table->unsignedInteger('id_bidang')->nullable();
            $table->unsignedInteger('id_dokumen');
            $table->enum('jenis_kerjasama', ['Memorandum of Understanding (MoU)', 'Memorandum of Agreement (MoA)']);
            
            $table->foreign('id_ajuan')->references('id_ajuan')->on('ajuan')->onDelete('cascade');
            $table->foreign('id_pemohon')->references('id_pemohon')->on('pemohon')->onDelete('cascade');
            $table->foreign('id_mitra')->references('id_mitra')->on('mitra')->onDelete('cascade');
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang_kerjasama')->onDelete('cascade');
            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumen')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kerjasama');
    }
};