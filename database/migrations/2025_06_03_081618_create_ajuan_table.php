<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ajuan', function (Blueprint $table) {
            $table->unsignedInteger('id_ajuan')->autoIncrement();
            $table->date('tanggal_ajuan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('id_admin')->nullable();
            
            $table->foreign('id_admin')->references('id_admin')->on('admin');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ajuan');
    }
};