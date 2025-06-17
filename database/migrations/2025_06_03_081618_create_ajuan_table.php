// database/migrations/2025_06_17_000001_create_ajuan_table.php

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
            $table->unsignedInteger('id_admin')->nullable();
            $table->timestamps();
            
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ajuan');
    }
};