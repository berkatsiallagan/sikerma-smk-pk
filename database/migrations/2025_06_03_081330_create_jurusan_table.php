// database/migrations/2025_06_17_000004_create_jurusan_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id('id_jurusan');
            $table->string('nama_jurusan', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurusan');
    }
};