// database/migrations/2025_06_17_000006_create_pemohon_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemohon', function (Blueprint $table) {
            $table->id('id_pemohon');
            $table->string('no_permohonan', 15)->unique();
            $table->string('nama_pemohon', 30);
            $table->string('nomor_telp', 20);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemohon');
    }
};