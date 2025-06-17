// database/migrations/2025_06_17_000003_create_dokumen_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id('id_dokumen');
            $table->text('catatan');
            $table->string('dokumen', 255)->nullable();
            $table->enum('status', ['aktif', 'tidak aktif', 'kadaluarsa', ''])->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
};