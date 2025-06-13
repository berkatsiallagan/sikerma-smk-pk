<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->unsignedInteger('id_mitra')->autoIncrement();
            $table->string('nama_mitra', 255);
            $table->enum('lingkup', ['Nasional', 'Internasional']);
            $table->string('website', 100)->nullable();
            $table->string('email', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('mitra');
    }
};