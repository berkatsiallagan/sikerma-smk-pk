// database/migrations/2025_06_17_000009_create_pemohon_jurusan_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
Schema::create('pemohon_jurusan', function (Blueprint $table) {
    $table->unsignedBigInteger('id_jurusan');
    $table->unsignedBigInteger('id_pemohon');
    
    $table->primary(['id_jurusan', 'id_pemohon']);
    $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
    $table->foreign('id_pemohon')->references('id_pemohon')->on('pemohon')->onDelete('cascade');
});
    }

    public function down()
    {
        Schema::dropIfExists('pemohon_jurusan');
    }
};