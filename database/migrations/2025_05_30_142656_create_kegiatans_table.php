<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('kegiatan', function (Blueprint $table) {
        $table->string('title')->nullable();
        $table->datetime('start')->nullable();
        $table->datetime('end')->nullable();
        $table->text('description')->nullable();
        $table->string('type')->default('personal');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
