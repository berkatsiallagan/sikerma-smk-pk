// database/migrations/2025_06_17_000002_create_bidang_kerjasama_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bidang_kerjasama', function (Blueprint $table) {
            $table->id('id_bidang');
            $table->string('nama_bidang', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('bidang_kerjasama');
    }
};