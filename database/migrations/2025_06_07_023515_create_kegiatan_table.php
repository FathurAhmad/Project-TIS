<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('title');                // Nama kegiatan
            $table->datetime('start');              // Tanggal & waktu mulai
            $table->datetime('end')->nullable();    // Tanggal & waktu selesai (opsional)
            $table->text('description')->nullable();// Deskripsi kegiatan
            $table->string('type')->default('work');// Jenis kegiatan (work, meeting, etc)
            $table->timestamps();                   // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
