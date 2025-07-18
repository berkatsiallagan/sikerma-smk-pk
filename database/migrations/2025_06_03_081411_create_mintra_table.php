// database/migrations/2025_06_17_000005_create_mitra_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id('id_mitra');
            $table->string('nama_mitra', 255);
            $table->enum('lingkup', ['Nasional', 'Internasional'])->nullable();
            $table->string('website', 100);
            $table->string('email', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('mitra');
    }
};