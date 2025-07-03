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
            $table->id('id_ajuan');
            $table->date('tanggal_ajuan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_admin')->nullable(); // Changed to unsignedBigInteger
            $table->timestamps();
            
            $table->foreign('id_admin')
                  ->references('id_admin')
                  ->on('admin')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ajuan');
    }
};