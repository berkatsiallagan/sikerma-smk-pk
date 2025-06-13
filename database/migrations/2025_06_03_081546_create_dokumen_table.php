<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->unsignedInteger('id_dokumen')->autoIncrement();
            $table->text('catatan')->nullable();
            $table->string('dokumen', 255);
            $table->enum('status', ['aktif', 'tidak aktif', 'kadaluarsa', '']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
};
