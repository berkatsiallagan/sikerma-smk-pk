// database/migrations/2025_06_17_000000_create_admin_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->unsignedInteger('id_admin')->autoIncrement();
            $table->string('email', 255)->unique();
            $table->string('kata_sandi', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
};