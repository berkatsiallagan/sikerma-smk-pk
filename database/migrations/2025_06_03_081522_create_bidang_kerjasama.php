<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bidang_kerjasama', function (Blueprint $table) {
            $table->unsignedInteger('id_bidang')->autoIncrement();
            $table->string('nama_bidang', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('bidang_kerjasama');
    }
};
